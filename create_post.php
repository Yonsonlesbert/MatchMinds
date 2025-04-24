<?php
session_start();
include_once "dbconnection.php";


if (!isset($_SESSION['uid'])) {
    header("location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = htmlspecialchars($_POST['content']);
    $user_id = $_SESSION['uid'];

    $con = create_connection();
    
    if ($con->connect_error) {
        die("Connection Failed");
    }

    $sql = "INSERT INTO posts (user_id, content) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("is", $user_id, $content);
    
    if ($stmt->execute()) {
        header("location: ../view_post.php?success=1");
    } else {
        header("location: ../create_post.php?error=1");
    }
}
echo "Something went wrong";