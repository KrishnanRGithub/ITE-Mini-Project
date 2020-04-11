<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Signup</title>
    <link  href="Stylesheet.css" rel="stylesheet">
</head>
<body class="SignBg">
    <?
        session_start();
        if(isset($_SESSION["REGISTRATION_NUMBER"])){
            session_destroy();        
        }
    ?>

    <div class="Login" id="Login">
        <span class="genText">LOGIN</span><br><br><br>
        <form autocomplete="off" method="post" action="login.php" >
            <input type="text" name="lRegNo" placeholder="Registration Number" required autocomplete="off" ><br>
            <input type="password" name="lPWord" id="lPWord" placeholder="Password" required autocomplete="off">
            <img src="Eye.png" style="height:25px;" onmouseout="document.getElementById('lPWord').type='password'" onmouseover="document.getElementById('lPWord').type='text'"><br>
            <input type="submit" value="Login">
        </form>
        <p style="color:white;margin:0px;text-align:center;" onclick="document.getElementById('Login').style.display='none';document.getElementById('SignUp').style.display='block';"
             onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">New here ? Create Account</p>
    </div>

    <!--    readonly onfocus="this.removeAttribute('readonly');"  -->

    <div class="SignUp" id="SignUp">
        <span class="genText">SIGN UP</span><br><br>
        <form autocomplete="off" method="post" action="signup.php"> 
            <input type="text" name="Name" placeholder="Name" required autocomplete="off"  ><br>
            <input type="text" name="sRegNo" placeholder="Registration Number" required autocomplete="off"  ><br>
            <input type="password" name="sPWord" id="sPWord" placeholder="Password" required autocomplete="off"  >
            <img src="Eye.png" style="height:25px;" onmouseout="document.getElementById('sPWord').type='password'" onmouseover="document.getElementById('sPWord').type='text'"><br>
            <input type="password" name="rSPWord" id="rSPWord" placeholder="Re-Password" required autocomplete="off" >
            <img src="Eye.png" style="height:25px;" onmouseout="document.getElementById('rSPWord').type='password'" onmouseover="document.getElementById('rSPWord').type='text'"><br>
            <input type="tel" name="mobileNo" placeholder="Mobile Number" required autocomplete="off"><br>
            <input type="submit" value="Create Account" style="margin-top:10px;">
        </form>
        <p style="color:white;margin:0px;text-align:center;" onclick="document.getElementById('SignUp').style.display='none';document.getElementById('Login').style.display='block';"
        onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">Already a Member ?</p>
    </div>
</body>
</html>