<?php   
    session_start();
    if(!isset($_SESSION["REGISTRATION_NUMBER"])){
        
        echo '<script>alert("Login Required")</script>';
       echo '<script>window.location.href="ConnectPage.php"</script>';
       
    }
    else{
        session_destroy();
        echo '<script>window.location.href="ConnectPage.php"</script>';   
    }
?>