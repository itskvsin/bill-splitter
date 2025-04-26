<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/register.css">
    <title>Register</title>
</head>
<body>
    <div class="navbar">
        <h2>Register</h2>
    </div>
    <form method="post" class="form">
        <input type="text" name="name" id="name" placeholder="Enter the name:">
        <input type="email" name="email" id="email" placeholder="Enter the email: ">
        <input type="password" name="password" id="password" placeholder="Enter the password: ">
        <button type="submit">Register</button>
    </form>

    <p>Already Have An Account? <a href="./login.php">Click Here</a></p>
</body>
</html>

<?php 
if (isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
}
?>