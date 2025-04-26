<?php
include './config.php';

$success = '';
$error = '';

if (isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    $hashedPassword = password_hash($password , PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users(name , email , password) VALUES (?,?,?)");
    $stmt->bind_param("sss" , $name , $email , $hashedPassword);
    if ($stmt->execute()) {
        $success = "Registration Successfull Now you can login <a href='./login.php'>Click Here </a>";
    } else {
        $error = "Registration Failed Try Again";
    }
} 
?>