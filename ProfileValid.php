<?php
    require_once'credentials.php';
    session_start();
    if(!isset($_SESSION['REGISTRATION_NUMBER']))
    {   
            echo"<script>window.location.href='ConnectPage.php';alert('Login Required');</script>";
    }
    $regexEmail='/.*\.com$/';
    $rNo=$_SESSION['REGISTRATION_NUMBER'];
    $gen=$_POST['Gender'];
    $mail=$_POST['Email'];
    $dept=$_POST['Dept'];
    $_SESSION['DEPARTMENT']=$dept;
    $_SESSION['GENDER']=$gen;
    $_SESSION['EMAIL']=$mail;
    if(!(preg_match($regexEmail,$mail) and strlen($mail)<25))
    {
        echo<<<_MESSAGE
        <script>
            alert("Email is either invalid or very long");
            window.location.href="YourProfile.php";
        </script>
        _MESSAGE;
    }
    $conn = mysqli_connect("$host","$adminUname","$adminPword","$database");
    $query="UPDATE SIGNUP SET EMAIL='$mail',GENDER='$gen',DEPARTMENT='$dept' WHERE REGISTRATION_NUMBER=$rNo";
    mysqli_query($conn,$query);
    mysqli_close($conn);
    echo<<<_REDIRECT
        <script>
            window.location.href="YourProfile.php";
        </script>
        _REDIRECT;
    
?>