<?php
    include 'config.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitBill'])) {
        echo $_POST['billTitle'];
    }
?>