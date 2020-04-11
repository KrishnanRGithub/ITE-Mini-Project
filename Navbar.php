<?php   
    
    session_start();
    if(!isset($_SESSION['REGISTRATION_NUMBER']))
    {   
            echo"<script>window.location.href='ConnectPage.php';alert('Login Required');</script>";
    }
    else if(!isset($_SESSION["ADMIN"]))
    {
        echo<<<_NAV
        <a href="Homepage.php" class="Link">Home</a>
        <a href="YourProfile.php" class="Link">Profile</a> 
        <a href="ContactUs.php" class="Link">Contact Us</a>
        <a href="logout.php"><img src="Resources/Icons/logout.png"></a>
        <a href="ContactUs.php" id="foot" >A Redtag Product ©</a>
       _NAV;
    }
    else{
        
        echo<<<_NAV
        <a href="Registrations.php" class="Link">Registrations</a>
        <a href="Feedback.php" class="Link">Feedback</a>
        <a href="Marquee.php" class="Link">Marquee</a>
       _NAV;
        echo'<a href="logout.php"><img src="Resources/Icons/logout.png"></a><br><br><br>';
    }
    //Homepage could be removed for admin users
    /*if()  The condition checks if the logged user havs admin privellages
    { 
        echo "<a href='Admin.php'>Admin</a>";  Ensure that this site can't  be accessed just ny modifying the link
    }*/
    //Add a part to log out from the account  <a href="Dashboard.php" class="Link">Dashboard</a>
?>
