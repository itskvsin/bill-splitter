<?php
include 'config.php';

$bills = [];

$result = $conn->query("SELECT * FROM bill ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    $billId = $row['id'];
    $participants = [];

    $stmt = $conn->prepare("SELECT * FROM participants WHERE bill_id = ?");
    $stmt->bind_param("i", $billId);
    $stmt->execute();
    $pResult = $stmt->get_result();


    if ($pResult && $pResult->num_rows > 0) {
        while ($p = $pResult->fetch_assoc()) {
            $participants[] = $p;
        }
    }

    $row['participants'] = $participants;
    $bill[] = $row;

}
?>