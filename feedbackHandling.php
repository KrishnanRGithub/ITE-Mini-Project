<?php
    session_start();
    if(!isset($_SESSION['REGISTRATION_NUMBER']))
    {   
            echo"<script>window.location.href='ConnectPage.php';alert('Login Required');</script>";
    }
    $nowDate = date("d-M-Y");
    $fileName=$_SESSION['NAME']."-".$_SESSION['REGISTRATION_NUMBER'].".html";
    $fileDir="Feedbacks\\".$fileName;
    $feed=$_POST['feedbackBox'];
    $feed=strip_tags($feed);
    $feed=htmlentities($feed);
    $newContent="$nowDate <br><br><br><pre>".$feed."</pre><br><br><br>";
    if(file_exists("$fileDir"))
    {
        $file=fopen("$fileDir","r+");
        $oldContent=fread($file,filesize("$fileDir"));
        fseek($file,0); //there is only one pointer for both read and write
        fwrite($file,$newContent.$oldContent);
        fclose($file);
    }
   else{
       $file=fopen("$fileDir","w+");
       fwrite($file,$newContent);
       fclose($file);
   }
    

    echo"<script>window.location.href='ContactUs.php';alert('Feedback Submitted');</script>";
?>