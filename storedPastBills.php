<?php 
    include 'config.php';

    $bills = [];

    $result = $conn->query("SELECT * FROM bill ORDER BY created_at DESC");

    while($row = $result->fetch_assoc()){
        $billId = $row['id'];
        $participants = [];

        $stmt = $conn->prepare("SELECT * FROM participants WHERE bill_id = ?");
        $stmt->bind_param('i' , $billId);
        $stmt->execute();
        $participantsResult = $stmt->get_result();

        while($p = $participantsResult->fetch_assoc()){
            $participants[] = $p;
        }

        $bills[] = [
            'title' => $row['title'],
            'paid_by' => $row['paid_by'],
            'amount' => $row['total_amt'],
            'created_at' => $row['created_at'],
            'participants' => $participants
        ];
    }
?>