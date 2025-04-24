<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MatchMinds</title>
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

<form id="loginform" action="models/register_user.php" method="POST"> 
    <div class="header">REGISTRATION</div>
    <?php
    if(isset($_GET['uname_error'])){
        if($_GET['uname_error']==1){
            echo "<div class='error_message'>Invalid username</div>";
        }
    }
    ?>
    <label for="uname">Username</label>
    <input type="text" name="uname" id="uname" placeholder="Username" required>
    
    <?php
    if(isset($_GET['email_error'])){
        if($_GET['email_error']==1){
            echo "<div class='error_message'>Invalid email</div>";
        }
    }
    ?>
    
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="email" required>
    <label for="fname">Firstname</label>
    <input type="text" name="fname" id="fname" placeholder="First name" required>
    <label for="lname">Lastname</label>
    <input type="text" name="lname" id="lname" placeholder="Last name" required>
    <div>
    <label for="gender">Gender</label>
    <select name="gender" id="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>    
    <label for="birthday">Birthday</label>
    <input type="date" name="bdate" id="bdate" required>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" placeholder="password" required>
    <label for="conpass">Confirm Password</label>
    <input type="password" name="conpass" id="conpass" placeholder="confirm password" required>
    <div id="eula-div">
        <input type="checkbox" name="eulabox" id="eulabox" value="eulabox">
        <a href>terms and conditions</a>
        
        
        
    <input type="submit" value="Register">
    
           
    
    
</form>

