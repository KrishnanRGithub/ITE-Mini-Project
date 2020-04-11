<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link  href="Stylesheet.css" rel="stylesheet">
    <style>
        #blurscreen{
                    background-color: rgba(0,0,0,0.4);
                    position: fixed;
                    top:0px;
                    left: 0px;
                    width:100%;
                    height: 100%;
                }
        table{
            background-color:rgba(0,0,0,0.85);
            color:white;
            width:75vw;
            margin-left:11vw;
            margin-top:5vh; 
            border-collapse:collapse;
           
            
        }
        tr,td,th{
            color:white;
            padding:10px;
            border:white 10px solid;
            border-collapse:collapse;
            text-align:center;        
            font-size:1.2em;
            
        }
        a{
            text-decoration:none;
            color:white;
        }
        #feed{
            position:relative;
            background-color:white;
            width:50vw;
            height:50vh;
            top:50%;
            left:50%;
            padding:60px;
            overflow-y: scroll;
            margin-bottom:5vh;
            transform: translate(-50%,-50%);
        }
    </style>
</head>
<body>
    <div id="Navbar">
            <?php require("Navbar.php"); ?>      
    </div> 
    <?php
        if(!isset($_SESSION["ADMIN"]))
        {
            echo"<script>window.location.href='ConnectPage.php';alert('Not Allowed');</script>";
        }
        $dir    = 'Feedbacks';
        $fileList = scandir($dir);
        $fileCount = count($fileList);
        echo"<table>";
        for($i=2;$i<$fileCount;$i++)
        {
    
            echo"<tr>
                        <td><a href='?q=$fileList[$i]'>$fileList[$i]</a></td>
                 </tr>";
        }
        echo"</table>";
        $queries=array();
        parse_str($_SERVER['QUERY_STRING'],$queries);
        if(isset($queries['q']))
        {
            $fname=$queries['q'];
            $dir='Feedbacks\\'.$fname;
            //
            $file=fopen($dir,"r");
            $content=fread($file,filesize($dir));
            echo<<<_FEED
                <div id="blurscreen">
                    <div id="feed">
                                   
                                       $content               
                    </div>            
                </div>
            _FEED;
            fclose($file);

        }
    ?>
</body>
<script>
            var blurscreen = document.getElementById("blurscreen");
            window.onclick = function () {
                console.log(blurscreen)
                if (event.target == blurscreen) {
                   blurscreen.style.visibility="hidden";
                    // window.location.href = "Feedback.php";
                }
            }       
    </script>
</html>