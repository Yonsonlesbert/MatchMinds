<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>No Likes</title>
    <link href="res/mystyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
   
    <nav class="navbar">
        <a href="./index.php">Home</a>     
        <a href="./about.php">About</a>
        <?php if (isset($_SESSION['uid'])): ?>    
            <a href="./profile.php"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Profile'); ?></a>
            <a href="./models/logout_user.php">Logout</a>
        <?php else: ?>
            <a href="./login.php">Login</a>
            <a href="./registration.php">Register</a>
        <?php endif; ?>
    </nav>

<form id="loginform" action="models/login_user.php" method="POST"> 
        <?php
    if(isset($_GET['regsuccess'])){
        if($_GET['regsuccess']==1){
            echo "<div class='success_message'>Registration Success</div>";
        }
    }
    ?>
    <label for="uname">Username or Email</label>
    <input type="text" name="uname" id="uname" placeholder="Username or Email" required>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" placeholder="password" required>
    <input type="submit" value="login">
    <a href="./registration.php">Register</a>
           
    
    
</form>

