<?php

$host = 'sql203.infinityfree.com';
$user = 'if0_38746285';
$pass = '9265340766';
$db = 'if0_38746285_billsplitter';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

?>