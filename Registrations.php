<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
                *{
                    font-family:  'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                    
                }
                body{
                    overflow-y: sroll;
                    overflow-x:hidden;
                    margin: 20px;
                    height: 90vh;
                }
                div#Navbar>a>img{
                    height:50px;
                    float:right;
                }
                div#Navbar>a.Link{
                    text-decoration: none;
                    font-size: larger;
                    font-weight: 800;
                    background-color: black;
                    font-size: 30px;
                    padding:0px 30px 10px; 
                    vertical-align: auto;
                    text-align: center;
                    color:white;
                    
                }
                div#Navbar>a.Link:hover{
                    color:black;
                    background-color: transparent;
                    transition: 0.2s ease-in-out;
                    
                }
                select{
                    border: 1px black solid;
                    outline:none;
                    font-size:1.2em;
                    font-weight:800;
                    margin-right:30px;  
                }
                input[type="submit"]{
                    border:none;
                    background-color:black;
                    color:white;
                    font-size:1.2em;
                    font-weight:800;
                    height:5vh;
                    width:10vw;

                }
                form{
                    margin:20px;
                }
                table{
                    width:80vw;
                    margin-left:8vw;
                    border-collapse: collapse;
                }
                th,td,tr{
                    width:16vw;
                    height:2vh;
                    padding:5px;
                    text-align:center;
                    font-size:1.2em;
                    border:2px solid black;
                    border-collapse: collapse;
                    
                }

                th{
                    background-color:rgba(0,0,0,0.8);
                    color:white;
                    font-weight:800;

                }
                td{
    
                    font-weight:600;
                }
    </style>
    
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
        echo<<<_QUERY
                    <form method="POST" action="Registrations.php">
                    <select id="Club" name="Club" style="width:15vw;height:5vh;" >
                        <option value="MYTDance">MYT Dance</option>
                        <option value="PDA">PDA</option>
                        <option value="Photosociety">Photosociety</option>
                        <option value="QuizClub">Quiz Club of MIT</option>
                        <option value="TamilMandram">Tamil Mandram</option>
                        <option value="TEDc">TED Club of MIT</option>
                        <option value="TheBoxOffice">The Box Office</option>
                        <option value="TheQuill">The Quill</option>
                        <option value="TheVariety">The Variety</option>
                        <option value="Vibez">Vibez</option>
                    </select>
                    <select id="Dept" name="Dept" style="width:25vw;height:5vh;">
                        <option value="ALL">All</option>
                        <option value="CT">Computer Technology</option>
                        <option value="IT">Information Technology</option>
                        <option value="ECE">Electronics and  Communication Engineering</option>
                        <option value="EIE">Electronics and Instrumentation Engineering</option>
                        <option value="PT">Production Technology</option>
                        <option value="AE">Automobile Engineering</option>
                        <option value="ME">Mechanical Engineering</option>
                        <option value="RPT">Rubber and Plastic Technology</option>
                    </select>
                    <input type="submit" value="Search">
                    <input type="hidden" value="show" name="show">
                    </form> 
            _QUERY;
            if(isset($_POST['show']))
            {
                require_once'credentials.php';
                $conn = mysqli_connect("$host","$adminUname","$adminPword","$database");
                $Club=sanitizeString($_POST['Club'],$conn);
                $Dept=sanitizeString($_POST['Dept'],$conn);
                if($Dept=="ALL")
                {
                    $query="SELECT * FROM SIGNUP S, $Club C WHERE S.REGISTRATION_NUMBER=C.REGISTRATION_NUMBER";
                }
                else{
                    $query="SELECT * FROM SIGNUP S,  $Club C WHERE S.REGISTRATION_NUMBER=C.REGISTRATION_NUMBER and S.DEPARTMENT='$Dept'";
                    //echo"<script>alert($query)</script>";    
                }
                $result=mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0){
                    echo<<<_HEAD
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Registration Number</th>
                                <th>Department</th>
                                <th>Mobile</th>
                                <th>Email</th>
                            </tr>
                    _HEAD;
                    while($row=mysqli_fetch_array($result)){
                        $name=$row["NAME"];
                        $rNo=$row["REGISTRATION_NUMBER"];
                        $Dept=$row["DEPARTMENT"];
                        $Mobile=$row["MOBILE"];
                        $Email=$row["EMAIL"];
                        echo <<<_ROW
                                    <tr>
                                        <td>$name</td>
                                        <td>$rNo</td>
                                        <td>$Dept</td>
                                        <td>$Mobile</td>
                                        <td>$Email</td>
                                 </tr>
                                _ROW;
                    }
                    echo"</table>";

                }
                else{
                    echo"<script>alert('No Records Found')</script>";
                }
                $row=mysqli_fetch_array($result);                
                mysqli_free_result($result);  
                mysqli_close($conn);
            }
            
    ?>
</body>
</html>