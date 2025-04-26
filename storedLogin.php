<?php 
session_start();

include './config.php';

$error = '';

if (isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id , name , email FROM users WHERE email = ? ");
    $stmt->bind_param("s" , $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if(password_verify($password , $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['userEmail'] = $user['email'];
        } else {
            $error = "Invalid Password Try Again!!";
        }
        
        setcookie('userEmail' , $user['email'] , time() + 7 * 24 * 60 * 60 , "/");
        setcookie('username' , $user['name'] , time() + 7 * 24 * 60 * 60 , "/");
        
        header("location: index.php");
        exit;
    } else {
        $error = "No account Found With This Email !!";
    }
}
?>

