<?php 
include './config.php';
session_start();

$error = '';

if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id , name , email , password FROM users WHERE email = ? ");
    $stmt->bind_param("s" , $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if(password_verify($password , $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['userEmail'] = $user['email'];
            
            setcookie('user_id' , $user['id'] , time() + 7 * 30 * 60 * 60 , "/");
            setcookie('userEmail' , $user['email'] , time() + 7 * 24 * 60 * 60 , "/");
            setcookie('username' , $user['name'] , time() + 7 * 24 * 60 * 60 , "/");
            
            header("location: index.php");
            exit;
        } else {
            $error = "Invalid Password Try Again!!";
        }
        
    } else {
        $error = "No account Found With This Email !!";
    }
}
?>

