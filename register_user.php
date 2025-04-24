<?php
session_start();
require_once 'dbconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['bdate'];
    $password = $_POST['pass'];
    $confirmPassword = $_POST['conpass'];
    $eulaAccepted = isset($_POST['eulabox']); 
    
    
    $errorMessages = [];

    
    if (empty($username) || !preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username)) {
        $errorMessages['uname_error'] = "Invalid username. It should only contain alphanumeric characters and underscores.";
    }

    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages['email_error'] = "Invalid email address.";
    }

    
    if (empty($password) || $password !== $confirmPassword) {
        $errorMessages['password_error'] = "Passwords do not match.";
    }

    
    if (!$eulaAccepted) {
        $errorMessages['eula_error'] = "You must accept the terms and conditions.";
    }

    
    if (!empty($errorMessages)) {
        
        $errorParams = http_build_query($errorMessages);
        header("Location: ../registration.php?$errorParams");
        exit;
    }

    try {
        
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            
            if ($user['username'] === $username) {
                header("Location: ../registration.php?uname_error=1");
            } else if ($user['email'] === $email) {
                header("Location: ../registration.php?email_error=1");
            }
            exit;
        } else {
            
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            
            $stmt = $conn->prepare("INSERT INTO user (username, email, firstname, lastname, gender, birthday, password) 
                                    VALUES (:username, :email, :firstname, :lastname, :gender, :birthday, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':birthday', $birthday);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            
            header("Location: ../login.php?register=success");
            exit;
        }
    } catch (PDOException $e) {
        
        echo "Error: " . $e->getMessage();
    }
} else {
    
    header("Location: ../registration.php");
    exit;
}
?>
