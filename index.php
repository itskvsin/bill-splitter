<?php 
session_start();
include './config.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['userEmail'])) {
    if (isset($_COOKIE['username']) && isset($_COOKIE['userEmail'])) {
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['userEmail'] = $_COOKIE['userEmail'];
    } else {
        header('location: login.php');
        exit();
    }
}

// Always show from SESSION
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Splitter | Kevin</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <div class="navbar">
        <div class="history">
            <ul>
                <?php if(isset($_SESSION['username'])) : ?>
                    <li>Welcome <?= htmlspecialchars($_SESSION['username']) ?>, </li>
                <?php endif; ?>
                <a href="./pastBills.php" class="pastBills"><li>Past Bills</li></a>
            </ul>
        </div>
    </div>

    <div class="toggle-container">
        <label class="switch">
            <input type="checkbox" id="themeToggle">
            <span class="slider round"></span>
        </label>
    </div>

    <form method="post" action="submitBill.php" class="form"> <!-- Action set to submitBill.php -->
        <div class="billTitle">
            <input type="text" name="billTitle" id="billTitle" placeholder="Bill Title: " required>
        </div>

        <div class="paidByWhom">
            <p>Paid By Whom:</p>
            <input type="text" name="personPaid" id="personPaid" placeholder="Enter Name Of Person:" required>
        </div>

        <input type="number" name="amount" id="amount" placeholder="Enter Your Amount:" required>

        <div class="splitPersons"> 
            <div class="personNum">
            <input type="number" name="personNum" id="personNum" placeholder="Enter number of persons">
            <button type="button" id="generatePersons">Enter</button>
            </div>

            <div class="persons"></div>
        </div>

        <button type="button" class="equalSplit" id="equalSplitButton">Split Equally</button>
        
        <input type="submit" value="Submit Bill" name="submitBill">
    </form>

    <script src="./JS/toggle.js"></script>
    <script src="./JS/extraPersons.js"></script>
    <script src="./JS/equalSplit.js"></script>
</body>
</html>
