<?php
    include 'config.php';
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    
    $submitted = false;
    $billtitle = $personpaid = $amount = 0;
    $participants = [];
    $userId = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitBill'])) {
        $submitted = true;
        $billtitle = isset($_POST['billTitle']) ? trim($_POST['billTitle']) : '' ;
        $personpaid = $_POST['personPaid'] ? trim($_POST['personPaid']) : '' ;
        $amount = $_POST['amount'] ? floatval($_POST['amount']) : 0 ;
        $num = $_POST['personNum'] ? intval($_POST['personNum']) : 0;

        for ($i=1; $i <= $num; $i++) { 
            $name = isset($_POST['personName'.($i)]) ? trim($_POST['personName'.($i)]) : '';
            $contact = $_POST['personContact'.($i)] ? trim($_POST['personContact'.($i)]) : '';
            $amt = $_POST['personAmount'.($i)] ? trim($_POST['personAmount'.($i)]) : 0;
            $participants[] = ['name' => $name , 'contact' => $contact , 'amount' => $amt];
        }

        $stmt = $conn->prepare("INSERT INTO bill(user_id , title , paid_by , total_amt) VALUES (? ,?,?,?)");
        $stmt->bind_param('issi' , $userId , $billtitle , $personpaid , $amount);
        $stmt->execute();
        $billId = $stmt->insert_id;
        $stmt->close();

        $stmtP = $conn->prepare("INSERT INTO participants(bill_id , name , contact , amt) VALUES (?,?,?,?) ");
        foreach ($participants as $p) {
            $stmtP->bind_param('issd' , $billId , $p['name'] , $p['contact'] , $p['amount']);
            $stmtP->execute();
        }
        $stmtP->close();
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/submitBill.css">
    <title>Bill Submitted</title>
</head>
<body>
    <div class="navbar">
        <a href="./index.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
<div class="summary">
<?php if ($submitted): ?>
        <div class="personDetail">
        <h2>Bill Submitted Succesfully</h2>
        <div class="divider"></div>
        <div class="info"><strong>Title : </strong><?= htmlspecialchars($billtitle) ?></div>
        <div class="info"><strong>Paid By : </strong><?= htmlspecialchars($personpaid) ?></div>
        <div class="info"><strong>Amount : </strong><?= htmlspecialchars($amount) ?></div>
        </div>

        <h3>Participants</h3>
        <div class="divider"></div>
        <div class="participantsContainer">
        <?php foreach ($participants as $p): ?>
            <div class="person">
                <strong>Name : </strong><?= htmlspecialchars($p['name']) ?><br>
                <strong>Contact : </strong><?= htmlspecialchars($p['contact']) ?><br>
                <strong>Amount : </strong> ₹<?= htmlspecialchars($p['amount']) ?>
            </div>
        <?php endforeach; ?>
        </div>
        
    <?php else: ?>
        <h2>No data Submitted</h2>
    <?php endif; ?>
</div>
</body>
</html>