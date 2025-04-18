<?php
    include 'config.php';
    $submitted = false;
    $billtitle = $personpaid = $amount = 0;
    $participants = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitBill'])) {
        $submitted = true;
        $billtitle = $_POST['billTitle'];
        $personpaid = $_POST['personPaid'];
        $amount = $_POST['amount'];
        $num = $_POST['personNum'];

        // echo $_POST['personContact1'];
        // echo $_POST['personContact2'];
        // echo $_POST['personAmount2'];
        // echo $_POST['personAmount2'];
        for ($i=1; $i <= $num; $i++) { 
            $contact = $_POST['personContact'.($i)];
            $amt = $_POST['personAmount'.($i)];
            $participants[] = ['contact' => $contact , 'amount' => $amt];
        }
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/submitBill.css">
    <!-- <style>
                .summary {
                    color: #000;
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 12px;
            background-color: #f9f9f9;
        }
        .summary h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .summary .info, .summary .person {
            margin-bottom: 10px;
        }
        .summary .person {
            padding: 10px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 8px;
        }
    </style> -->
    <title>Bill Submitted</title>
</head>
<body>
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