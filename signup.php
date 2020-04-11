<?php
    require_once'credentials.php';
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
        //die("The SQL is not setup and had to be setup. Sorry for the Inconviniance. Try Again.");
        echo"<script>window.location.href='signup.php';</script>";
            
    }
    function errorSignup($str)
    {
        echo<<<_MESSAGE
        <script>
            alert("$str");
            window.location.href="ConnectPage.php";
        </script>
        _MESSAGE;
        
    }
    $fName=sanitizeString($_POST["Name"],$conn);
    $fsRegNo=sanitizeString($_POST["sRegNo"],$conn);
    $fsPWord=sanitizeString($_POST["sPWord"],$conn);
    $frSPWord=sanitizeString($_POST["rSPWord"],$conn);
    $fmobileNo=sanitizeString($_POST["mobileNo"],$conn);
    $regexRegNo='/^20[0-9]*$/m';
    $regexMob='/^[6-9][0-9]*$/m';
    $flag=0;
    if(!(preg_match($regexMob, $fmobileNo) and strlen($fmobileNo)==10))
    {
        errorSignup("Invalid Mobile Number");
        $flag=1;
    }
    if(!(preg_match($regexRegNo, $fsRegNo) and strlen($fsRegNo)==10))
    {
        errorSignup("Invalid Registration Number");
        $flag=1;
        
    }
    if($fsPWord!=$frSPWord)
    {
        errorSignup("Passwords doesnt match");
        $flag=1;
    }
    if(strlen($fsPWord)<10 or strlen($fsPword)>20)
    {
        errorSignup("Length of password should be between 10 to 20");
        $flag=1;

    }
    //FORM VALIDATION IS REQUIRED BEFORE
    //INSERT INTO CLUBS_REGISTERED VALUES($fsRegNo);
    if($flag==0)
    {
            $fsPWord = hash('ripemd128', 'Hare'."$fsPWord".'Krishna'); //salting and hash is used to store the password in sql
            $query1="INSERT  INTO SIGNUP VALUES('$fName',$fsRegNo,$fmobileNo,'$fsPWord',NULL,NULL,NULL);";
            $query2="INSERT INTO CLUBS_REGISTERED VALUES($fsRegNo,0,0,0,0,0,0,0,0,0,0);";
            if(mysqli_query($conn,$query1)){
                mysqli_query($conn,$query2); 
                echo "<script>window.location.href='ConnectPage.php';alert('Registered Successfully');</script>";
                
            }
            else{
                errorSignup("Already Registered");
                //echo "Failed to connect to MySQL:" . mysqli_error($conn);
            }
    }
    mysqli_close($conn);
?>