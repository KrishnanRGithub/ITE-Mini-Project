<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link  href="Stylesheet.css" rel="stylesheet">
</head>
<body>
    <div id="Navbar">
            <?php require("Navbar.php"); ?>        
    </div> 
    <div id="Feedback">
        <form method="post" action="feedbackHandling.php">
            <textarea rows="10" cols="80"  id="feedbackBox" name="feedbackBox" required></textarea>
            <input type="submit" value="Submit Feedback" id="feedSubmit"  >
        </form> 
    </div>
    <img src="Pen.png" style="position:absolute;top:10%;right:10%; height:70vh;transform:rotateX(-30deg);">
</body>
</html>
