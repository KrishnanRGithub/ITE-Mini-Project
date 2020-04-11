<?php
    $adminUname="root";
    $adminPword="";
    $dbPass="HareKrishna";
    $dbUname=6383551677;
    $host="localhost";
    $database="MINIPROJECT";
    $setupQuery="CREATE DATABASE $database;";
    $setupTableQuery1= "CREATE TABLE `miniproject`.`signup` ( `NAME` CHAR(20) NOT NULL , `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY , `MOBILE` BIGINT(10) NOT NULL , `PASSWORD` CHAR(32) NOT NULL , `EMAIL` CHAR(30) NULL , `DEPARTMENT` CHAR(3) NULL , `GENDER` CHAR(1) NULL ) ENGINE = InnoDB;";
    $setupTableQuery2="CREATE TABLE `miniproject`.`clubs_registered` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY , `MYTDance` INT(1) NOT NULL DEFAULT '0' , `PDA` INT(1) NOT NULL DEFAULT '0' , `Photosociety` INT(1) NOT NULL DEFAULT '0' , `QuizClub` INT(1) NOT NULL DEFAULT '0' , `TamilMandram` INT(1) NOT NULL DEFAULT '0' , `TEDc` INT(1) NOT NULL DEFAULT '0' , `TheBoxOffice` INT(1) NOT NULL DEFAULT '0' , `TheQuill` INT(1) NOT NULL DEFAULT '0' , `TheVariety` INT(1) NOT NULL DEFAULT '0' , `Vibez` INT(1) NOT NULL DEFAULT '0' ) ENGINE = InnoDB;";
    $c1="CREATE TABLE `miniproject`.`MYTDance` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c2="CREATE TABLE `miniproject`.`PDA` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c3="CREATE TABLE `miniproject`.`Photosociety` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c4="CREATE TABLE `miniproject`.`QuizClub` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c5="CREATE TABLE `miniproject`.`TamilMandram` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c6="CREATE TABLE `miniproject`.`TEDc` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c7="CREATE TABLE `miniproject`.`TheBoxOffice` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c8="CREATE TABLE `miniproject`.`TheQuill` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c9="CREATE TABLE `miniproject`.`TheVariety` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    $c10="CREATE TABLE `miniproject`.`Vibez` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY )ENGINE = InnoDB;";
    function sanitizeString($var,$conn)
    {
        $ogvar=$var;
        $var=strip_tags($var);
        $var=stripslashes($var);
        $var=htmlentities($var);
        $var=mysqli_real_escape_string($conn, $var);
        if($var!=$ogvar)
        {
            mysqli_close($conn);
            //echo '<script>alert("Invalid Values");</script>';
            if(isset($_SESSION['REGISTRATION_NUMBER']))
            {
                echo"<script>link.href='logout.php';</script>";
            }
            else{
                echo"<script>link.href='ConnectPage.php';</script>";
            }
        }
        else{
            return($var);
        }
    }
    //    CREATE TABLE `miniproject`.`clubs_registered` ( `REGISTRATION_NUMBER` INT(10) NOT NULL PRIMARY KEY , `MYTDance` INT(1) NOT NULL DEFAULT '0' , `PDA` INT(1) NOT NULL DEFAULT '0' , `Photosociety` INT(1) NOT NULL DEFAULT '0' , `QuizClub` INT(1) NOT NULL DEFAULT '0' , `TamilMandram` INT(1) NOT NULL DEFAULT '0' , `TEDc` INT(1) NOT NULL DEFAULT '0' , `TheBoxOffice` INT(1) NOT NULL DEFAULT '0' , `TheQuill` INT(1) NOT NULL DEFAULT '0' , `TheVariety` INT(1) NOT NULL DEFAULT '0' , `Vibez` INT(1) NOT NULL DEFAULT '0' ) ENGINE = InnoDB;

?>