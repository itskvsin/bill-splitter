<?php
include 'config.php';
session_start();

$bills = [];

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM bill WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i" , $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $billId = $row['id'];

        $participants = [];
        $pstmt = $conn->prepare("SELECT * FROM participants WHERE bill_id = ?");
        $pstmt->bind_param("i" , $billId);
        $pstmt->execute();
        $pResult = $pstmt->get_result();

        while ($prow = $pResult->fetch_assoc()) {
            $participants[] = $prow;
        }

        $row['participants'] = $participants;

        $bills[] = $row;
    }

    if (empty($bills)) {
        $bill = [];
    } else {
        $bill = $bills;
    }

} else {
    header("location: ./login.php");
    exit();
}
?>