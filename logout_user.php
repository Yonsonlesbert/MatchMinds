<?php
session_start(); 


if (isset($_SESSION['uid'])) {
    
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    
    header("Location: ../index.php"); 
    exit;
} else {
    
    header("Location: ../index.php");
    exit;
}
?>
