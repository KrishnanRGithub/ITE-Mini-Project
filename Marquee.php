<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link  href="Stylesheet.css" rel="stylesheet">
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
        $file=fopen("MarqueeContent.html","r");
        $content=fread($file,filesize("MarqueeContent.html"));
        fclose($file);
        echo<<<_DISPLAY
        <form method="POST" >
            <table>
                <tr>
                    <td><textarea style="width:60vw;height:30vh;margin-top:10vh;margin-left:0;" name="newContent">$content</textarea></td>
                    <td><input type="submit" style="border-radius: 30px;
                    padding:30px;
                    background-color:black;
                    color:white;
                    font-size: 1.4em;
                    font-weight:800;
                    margin-top:10vh;
                    text-decoration:none;
                    box-shadow: grey 5px 5px 10px;
                    border: black 3px solid;" value="Change Marquee"></td>
                </tr>
            </table>
        </form>
        _DISPLAY;
        if(isset($_POST["newContent"]))
        {
            $file=fopen("MarqueeContent.html","w");
            fwrite($file,$_POST['newContent']);
            fclose($file);
            echo"<script>window.location.href='Marquee.php';alert('Marquee Content Changed');</script>";
        }
    ?>
</body>
</html>