<?php
include './storedRegister.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/register.css">
    <title>Register</title>
</head>

<body>
    <div class="navbar">
        <h2>Register</h2>
        <div class="divider"></div>
    </div>
    <form method="post" class="form">
        <input type="text" name="name" id="name" placeholder="Enter the name:" required>
        <input type="email" name="email" id="email" placeholder="Enter the email:" required>
        <input type="text" name="contact" id="contact" placeholder="Enter your contact (phone):" required>
        <input type="password" name="password" id="password" placeholder="Enter the password:" required>
        <button type="submit" name="register">Register</button>
    </form>


    <div class="success">
        <?php if (!empty($success)): ?>
            <p><?= $success ?></p>
        <?php endif ?>
    </div>

    <div class="error">
        <?php if (!empty($error)): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif ?>
    </div>

    <p>Already Have An Account? <a href="./login.php">Click Here</a></p>
</body>

</html>