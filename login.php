<?php 
include './storedLogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/register.css">
    <title>Login</title>
</head>
<body>
    <div class="navbar">
        <h2>Login</h2>
        <div class="divider"></div>
    </div>

    <form method="post" class="form">
        <input type="email" name="email" id="email" placeholder="Enter your Email: ">
        <input type="password" name="password" id="password" placeholder="Enter your Password: ">
        <button type="submit" name="register">Login</button>
    </form>
    
    <div class="error">
        <?php if(!empty($error)): ?>
            <?= $error ?>
        <?php endif ?>
    </div>

    <div class="register">
        <p>Dont Have An Account? <a href="./register.php">Click Here!</a> </p>
    </div>
</body>
</html>