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
    </div>

    <form method="post" class="form">
        <div class="paidByWhom">
            <p>Paid By Whom:</p>
            <input type="text" name="personPaid" id="personPaid" placeholder="Enter Name Of Person:">
        </div>

        <input type="number" name="amount" id="amount" placeholder="Enter Your Amount:">

        <div class="splitPersons">
            <div class="personNum">
                <input type="number" name="personNum" id="personNum" placeholder="Enter number of persons">
                <input type="submit" value="Enter">
            </div>

            <div class="persons"></div>
        </div>

        <button type="button" class="equalSplit" id="equalSplitButton">Split Equally</button>
        
        <input type="submit" value="Enter">
    </form>

    <script src="./JS/toggle.js"></script>
    <script src="./JS/extraPersons.js"></script>
    <script src="./JS/equalSplit.js"></script>
</body>

</html>