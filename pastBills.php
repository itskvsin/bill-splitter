<?php
include 'storedPastBills.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/pastBills.css">
    <title>Past Bills</title>
</head>

<body>
    <div class="navbar">
        <h1>Past Bills</h1>
        <a href="./index.php"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>

    <div class="pastBillsContainer">

        <?php if (empty($bill)): ?>
            <h2>No Bill History Yet</h2>
        <?php else: ?>
            <?php foreach ($bill as $b): ?>
                <div class="billCard">
                    <div class="personContainer">
                        <div class="billTitle">
                            <h2><?= htmlspecialchars($b['title']) ?></h2>
                        </div>
                        <p><strong>Paid By: </strong><?= htmlspecialchars($b['paid_by']) ?></p>
                        <p><strong>Amount: </strong><?= htmlspecialchars($b['total_amt']) ?></p>
                        <p><strong>Date: </strong><?= date('d M Y , h:i A', strtotime($b['created_at'])) ?></p>
                    </div>
                    <div class="participantsContainer">
                        <h3 class="participantHeading">Participants</h3>
                        <div class="divider"></div>
                        <div class="participants">
                        <?php foreach ($b['participants'] as $p): ?>
                            <div class="participantItem">
                                <div>Name: <?= htmlspecialchars($p['name']) ?></div>
                                <div>Contact: <?= htmlspecialchars($p['contact']) ?></div>
                                <div>Amount: <?= htmlspecialchars($p['amt']) ?></div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>