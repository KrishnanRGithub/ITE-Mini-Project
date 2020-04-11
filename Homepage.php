<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link  href="Stylesheet.css" rel="stylesheet">
</head>
<body>
    <div id="Navbar">
            <?php require("Navbar.php"); ?>
            
    </div> 
    <?php
        $file=fopen("MarqueeContent.html","r+");
        $cont=fread($file,filesize("MarqueeContent.html"));
        echo "
            <div id='Marquee' >
                <marquee>$cont</marquee>
            </div>
            
         ";
         fclose($file);
    ?>
    
    <div class="container">
            <div class="containerUpperRow">
                <a href="?q=TheBoxOffice&f=1"><img src="Resources\TheBoxOffice\Logo.png" ></a>
                <a href="?q=TheQuill&f=1"><img src="Resources\TheQuill\Logo.png" "></a>
                <a href="?q=MYTDance&f=1"><img src="Resources\MYTDance\Logo.png" ></a>
                <a href="?q=PDA&f=1"><img src="Resources\PDA\Logo.png" ></a>
                <a href="?q=Photosociety&f=1"><img src="Resources\Photosociety\Logo.png" ></a>
            </div>
            <div class="containerLowerRow" >                
                <a href="?q=TEDc&f=1"><img src="Resources\TEDc\Logo.png" ></a>
                <a href="?q=TheVariety&f=1"><img src="Resources\TheVariety\Logo.png" ></a>
                <a href="?q=Vibez&f=1"><img src="Resources\Vibez\Logo.png" ></a>
                <a href="?q=TamilMandram&f=1"><img src="Resources\TamilMandram\Logo.png"></a>
                <a href="?q=QuizClub&f=1"><img src="Resources\QuizClub\Logo.png"></a>
            </div>
    </div>

            <?php 
                $queries=array();
                $flag=0;
                parse_str($_SERVER['QUERY_STRING'],$queries);
                if(isset($queries['q']))
                    $descAdd=$queries['q'];
                if(isset($queries['f']))
                    $flag=$queries['f'];                
                if($flag==1)
                {
                    $temp=$descAdd;
                    $descAdd="Resources/".$descAdd."/Desc.txt";
                    $imgAdd="Resources/".$temp."/Logo.png";
                   // echo"<script>alert($descAdd)</script>";
                    
                    $file=fopen($descAdd,"r");
                    $desc=fread($file,filesize($descAdd));
                    echo<<<_DESC
                    <div id="blurscreen">   
                        <div class="popup" id="popup">
                             <img src="$imgAdd" alt="logo" id="imgDesc">
                                <div>
                                    <div class="Desc">
                                        $desc
                                    </div>
                                    <form method="GET" action="clubRegister.php">
                                        <input type="submit" value="Apply" class="RegButton">
                                        <input type="hidden" name="Club" id="Club" value="$temp">
                                    </form>
                                    
                                </div>
                        </div>      
                    </div>
                    _DESC;
                    fclose($file);

                }
                //$descAdd="Resources/$descAdd/desc.txt";
               
                //$descAdd=$_COOKIE["descAdd"];
                //echo"<script>alert($descAdd)</script>";
                //echo $descAdd;
                
                //setcookie("descAdd", "", time() - 3600);
               
            ?>
        
    <script src="HomepageJS.js"></script>
</body>
</html>


<?php   /*


    <div class="container">
            <div class="containerUpperRow">
                <a href="?q=TheBoxOffice&f=1"><img src="Resources\TheBoxOffice\Logo.jpg" ></a>
                <a href="?q=TheQuill&f=1"><img src="Resources\TheQuill\Logo.png" "></a>
                <a href="?q=MYTDance&f=1"><img src="Resources\MYTDance\Logo.png" ></a>
                <a href="?q=PDA&f=1"><img src="Resources\PDA\Logo.jpg" ></a>
                <a href="?q=Photosociety&f=1"><img src="Resources\Photosociety\Logo.jpg" ></a>
            </div>
            <div class="containerLowerRow" >                
                <a href="?q=TEDc&f=1"><img src="Resources\TEDc\Logo.png" ></a>
                <a href="?q=TheVariety&f=1"><img src="Resources\TheVariety\Logo.jpg" ></a>
                <a href="?q=Vibez&f=1"><img src="Resources\Vibez\Logo.jpg" ></a>
                <a href="?q=TamilMandram&f=1"><img src="Resources\TamilMandram\Logo.jpg"></a>
                <a href="?q=QuizClub&f=1"><img src="Resources\QuizClub\Logo.png"></a>
            </div>
    </div>





     <div class="container">
            <div class="containerUpperRow">
                <img src="Resources\TheBoxOffice\Logo.jpg" onclick="ExpandDesc()">
               <img src="Resources\TheQuill\Logo.png" onclick="ExpandDesc()">
                <img src="Resources\MYTDance\Logo.png" onclick="ExpandDesc()">
               <img src="Resources\PDA\Logo.jpg" onclick="ExpandDesc()">
                <img src="Resources\Photosociety\Logo.jpg" onclick="ExpandDesc()">
            </div>
            <div class="containerLowerRow" onclick="ExpandDesc()">                
                <img src="Resources\TEDc\Logo.png" onclick="ExpandDesc()">
                <img src="Resources\TheVariety\Logo.jpg" onclick="ExpandDesc()">
                <img src="Resources\Vibez\Logo.jpg" onclick="ExpandDesc()">
                <img src="Resources\TamilMandram\Logo.jpg" onclick="ExpandDesc()">
             <img src="Resources\QuizClub\Logo.png" onclick="ExpandDesc()">
     </div>
    */

?>