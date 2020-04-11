<?php
    require_once'credentials.php';
    session_start();
    if(!isset($_SESSION['REGISTRATION_NUMBER']))
    {   
            echo"<script>window.location.href='ConnectPage.php';alert('Login Required');</script>";
    }
    $conn = mysqli_connect("$host","$adminUname","$adminPword","$database");
    $club=$_GET['Club'];
    $rNo=$_SESSION['REGISTRATION_NUMBER'];
    $dept=$_SESSION['DEPARTMENT'];
    $gen=$_SESSION['GENDER'];
    $mail=$_SESSION['EMAIL'];
    if(!isset($mail) or !isset($dept) or !isset($gen))
    {
        echo"<script>window.location.href='YourProfile.php';alert('Complete Your Profile First');</script>";
    }
    $query="INSERT INTO $club VALUES($rNo)";
    $query2="UPDATE CLUBS_REGISTERED SET $club = 1 WHERE REGISTRATION_NUMBER = $rNo;";
    if(mysqli_query($conn,$query))
    {
        mysqli_query($conn,$query2);
        echo"<script>window.location.href='Homepage.php';alert('Successfully Registered');</script>";
    }
    else{
        echo"<script>alert('Already Registered');window.location.href='Homepage.php';</script>";

    }
    mysqli_close($conn);

?>