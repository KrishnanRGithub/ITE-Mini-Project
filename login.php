<?php
    require_once'credentials.php';
    session_start();
    $conn = mysqli_connect("$host","$adminUname","$adminPword","$database");
    if(!$conn)
    {  
        
        $conn=mysqli_connect("$host","$adminUname","$adminPword");
        mysqli_query($conn,$setupQuery);
        $conn = mysqli_connect($host, $adminUname, $adminPword,"$database");
        mysqli_query($conn,$setupTableQuery1);
        mysqli_query($conn,$setupTableQuery2);
        mysqli_query($conn,$c1);
        mysqli_query($conn,$c2);
        mysqli_query($conn,$c3);
        mysqli_query($conn,$c4);
        mysqli_query($conn,$c5);
        mysqli_query($conn,$c6);
        mysqli_query($conn,$c7);
        mysqli_query($conn,$c8);
        mysqli_query($conn,$c9);
        mysqli_query($conn,$c10);
        mysqli_close($conn);
        echo"<script>window.location.href='login.php';</script>";
       // die("The SQL is not setup and had to be setup. Sorry for the Inconviniance. Try Again.");
            
    }
    $dbPass=hash('ripemd128','Hare'."$dbPass".'Krishna');
    $flRegNo=sanitizeString($_POST["lRegNo"],$conn);
    $flPWord=sanitizeString($_POST["lPWord"],$conn);
    $flPWord=hash('ripemd128','Hare'."$flPWord".'Krishna');
    $query="SELECT * FROM SIGNUP WHERE REGISTRATION_NUMBER = $flRegNo;";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    if(isset($row['PASSWORD']))
    {
        if($flPWord==$row['PASSWORD'])
        {
            $_SESSION['REGISTRATION_NUMBER']=$flRegNo;
            $_SESSION['NAME']=$row['NAME'];
            $_SESSION['MOBILE']=$row['MOBILE'];
            $_SESSION['EMAIL']=$row['EMAIL'];
            $_SESSION['DEPARTMENT']=$row['DEPARTMENT'];
            $_SESSION['GENDER']=$row['GENDER'];
            //echo $_SESSION['REGISTRATION_NUMBER'];
            echo"<script>window.location.href='Homepage.php';</script>";

        }
    }
    else if($flPWord==$dbPass && $flRegNo==$dbUname)
    {
        $_SESSION["ADMIN"]=$dbPass;
        $_SESSION['REGISTRATION_NUMBER']=$dbPass;       
        echo"<script>window.location.href='Registrations.php';</script>";

    }
    else{
        echo"<script>window.location.href='ConnectPage.php';alert('Incorrect Credentials');</script>";
    }
    mysqli_free_result($result);  
    mysqli_close($conn);
?>