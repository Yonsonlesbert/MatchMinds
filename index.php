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
        <a href="about.php">About</a>
        <?php if (isset($_SESSION['uid'])): ?>    
            <a href="./profile.php"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Profile'); ?></a>
            <a href="./models/logout_user.php">Logout</a>
        <?php else: ?>
            <a href="./login.php">Login</a>
            <a href="./registration.php">Register</a>
        <?php endif; ?>
    </nav>

    <section class="hero">
        <h1>Welcome to MatchMinds</h1>
        <p>"Dating made fun, finding ‘The One’ made smarter."</p>
    </section>

    <main>
        <p>MatchMind is an intelligent dating app that connects people not just by looks or swipes, but by deep compatibility — using personality traits, interests, communication styles, and shared life goals.</p>
        <p>MatchMind is a gamified dating app that makes finding love feel like a game — not just a swipe-fest. It’s playful, interactive, and competitive (in a good way), but with deep psychological profiling and behavior-based match recommendations behind the scenes.

</p>
    </main>

</body>
</html>
