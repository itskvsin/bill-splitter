<?php 
    include 'storedPastBills.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/pastBills.css">
    <title>Past Bills</title>
</head>
<body>
    <div class="navbar">
        <a href="./index.php"><- Back</a>
    </div>

    <div class="pastBillsContainer">
        <h1>Past Bills</h1>

        <?php if (empty($bill)): ?>
            <h2>No Bill History Yet</h2>
        <?php else: ?>
            <?php foreach($bill as $b): ?>
                <div class="billCard">
                    <h2><?= htmlspecialchars($b['title']) ?></h2>
                    <p><strong>Paid By: </strong><?= htmlspecialchars($b['paid_by']) ?></p>
                    <p><strong>Amount: </strong><?= htmlspecialchars($b['total_amt']) ?></p>
                    <p><strong>Date: </strong><?= date('d M Y , h; i A' , strtotime($b['created_at'])) ?></p>
                    <div class="participantsContainer">
                        <h3>Participants</h3>
                        <?php foreach($b['participants'] as $p): ?>
                            <div class="participantItem">
                                <?= htmlspecialchars($p['name']) ?> <?= htmlspecialchars($p['contact']) ?> <?= htmlspecialchars($p['amt']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>