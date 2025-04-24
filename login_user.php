<?php
session_start();
require_once 'dbconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    try {
        
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            
            if ($password === $user['password']) {
                
                $_SESSION['uid'] = $user['uid'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['fname'] = $user['firstname'];
                $_SESSION['lname'] = $user['lastname'];
                
                
                header("Location: ../loginpage/dashboard.php");
                exit;
            } else {
                
                header("Location: ../login.php?error=wrongpassword");
                exit;
            }
        } else {
            
            header("Location: ../login.php?error=nouser");
            exit;
        }
    } catch (PDOException $e) {
        echo "Login error: " . $e->getMessage();
    }
} else {
   
    header("Location: ../login.php");
    exit;
}
?>
