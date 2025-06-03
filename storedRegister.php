<?php
include 'config.php'; // Your DB connection

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $contact = trim($_POST['contact']);  // add this if you added contact field

    if (empty($name) || empty($email) || empty($password) || empty($contact)) {
        $error = "Please fill all fields.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare insert
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, contact) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $contact);

        if ($stmt->execute()) {
            $success = "Registration successful.";
        } else {
            $error = "Error: " . $conn->error;
        }
        $stmt->close();
    }
}
?>
