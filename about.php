<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About - MatchMinds</title>
    <link href="res/mystyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>

    <nav class="navbar">
        <a href="./index.php">Home</a>     
        <a href="./about.php">About</a>
        <?php if (isset($_SESSION['uid'])): ?>    
            <a href="./profile.php"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Profile'); ?></a>
            <a href="../models/logout_user.php">Logout</a>
        <?php else: ?>
            <a href="./login.php">Login</a>
            <a href="./registration.php">Register</a>
        <?php endif; ?>
    </nav>

    <section class="hero">
        <h1>MatchMinds</h1>
        <p>Discover the philosophy behind the platform.</p>
    </section>

    <main>
        <p><strong>No Likes</strong> was born from a simple idea: that creativity shouldn’t be reduced to numbers, hearts, or clout. We built this platform to break free from the performative pressures of traditional social media.</p>
        <p>Here, we believe that photography and art should be appreciated for what they are—not for how many people like them. We encourage genuine self-expression, raw emotion, and storytelling through visuals.</p>
        <p>Whether you're an experienced artist or just exploring your visual voice, No Likes gives you the space to share without compromise. We’re building a community that values art over algorithm.</p>
        <p>Join us in redefining what it means to create online.</p>
    </main>

</body>
</html>
