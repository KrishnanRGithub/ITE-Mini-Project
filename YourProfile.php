<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link  href="Stylesheet.css" rel="stylesheet">
</head>
<body>
    <div id="Navbar">
            <?php require("Navbar.php"); ?>   
    </div>
    <?php
        $rNo=$_SESSION['REGISTRATION_NUMBER'];
        $Name=$_SESSION['NAME'];
        $Mobile=$_SESSION['MOBILE'];
        $email=$_SESSION['EMAIL'];
        $Dept=$_SESSION['DEPARTMENT'];
        $Gender=$_SESSION['GENDER'];
        if(isset($Gender))
        {
            if($Gender=="M")
                $Gender="Male";
            else
                $Gender="Female";
        }
        if(isset($Dept))
        {
            switch($Dept)
            {
                case "CT" :$Dept="Computer Technology";
                           break;
                case "IT" :$Dept="Information Technology";
                           break;
                case "ECE" :$Dept="Electronics and  Communication Engineering";
                           break;
                case "EIE" :$Dept="Electronics and  Instrumentation Engineering";
                            break;
                case "PT" :$Dept="Production Technology";
                            break; 
                case "AE" :$Dept="Automobile Engineering";
                            break; 
                case "ME" :$Dept="Mechanical Engineering";
                            break;        
                case "RPT" :$Dept="Rubber and Plastic Technology";
                            break; 
            }
        }
        echo<<<_DETAILS
                <br><br><br><br>
                <input type="text" value="$Name"readonly class="profileDisplay">
                <br><br>
                <input type="text" value="$rNo"readonly class="profileDisplay">
                <br><br>
                <input type="text" value="$Mobile"readonly class="profileDisplay">
                <br><br>

            _DETAILS;
        if(!(isset($email) and isset($Dept) and isset($Gender)))
        {
                echo<<<_DETAILS
                   <script>alert("The Profile is Incomplete")</script>
                    <form method="POST" action="ProfileValid.php">
                    
                    <select id="Gender" name="Gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <br><br>
                    <select id="Dept" name="Dept" >
                        <option value="CT">Computer Technology</option>
                        <option value="IT">Information Technology</option>
                        <option value="ECE">Electronics and  Communication Engineering</option>
                        <option value="EIE">Electronics and Instrumentation Engineering</option>
                        <option value="PT">Production Technology</option>
                        <option value="AE">Automobile Engineering</option>
                        <option value="ME">Mechanical Engineering</option>
                        <option value="RPT">Rubber and Plastic Technology</option>
                    </select>
                    <br><br>
                    <input type="email" name="Email" id="Email"placeholder="Email" required>
                    <br><br>
                    <input type="submit" class="profileDisplay">
                    </form> 
                    
                _DETAILS;
        }                
        else{
            echo<<<_DETAILS
                <input type="text" value="$email"readonly class="profileDisplay">
                <br><br>
                <input type="text" value="$Dept"readonly class="profileDisplay">
                <br><br>
                <input type="text" value="$Gender"readonly class="profileDisplay">
                <br><br>

            _DETAILS;
        }
          /* <div class="ClubJoined">
                    <div class="containerUpperRow">
                        <img src="Resources\TheBoxOffice\Logo.jpg" style="filter: grayscale(100%);">
                        <img src="Resources\MYTDance\Logo.png" >
                        <img src="Resources\PDA\Logo.jpg" >
                        <img src="Resources\TheQuill\Logo.png"  >
                        <img src="Resources\Photosociety\Logo.jpg" >
                    </div>
                    <div class="containerLowerRow" >                
                        <img src="Resources\TEDc\Logo.png" >
                        <img src="Resources\TheVariety\Logo.jpg">
                        <img src="Resources\Vibez\Logo.jpg">
                        <img src="Resources\TamilMandram\Logo.jpg">
                        <img src="Resources\QuizClub\Logo.png">
                    </div>
                </div>
        */
    ?>    
</body>
</html>