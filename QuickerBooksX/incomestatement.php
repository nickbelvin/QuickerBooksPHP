<?php include "Templates/header.php"; ?>

<!DOCTYPE html>
<html>

<head>

    <ul>
        <li><a href="trialbalance.php" name="trialbalanceLink">Trial Balance</a></li>
        <li><a href="incomestatement.php" name="incomestatementLink">Income Statement</a></li>
        <li><a href="balancesheet.php" name="balancesheetLink">Balance Sheet</a></li>
        <li><a href="retainedearnings.php" name="retainedearningsLink">Retained Earnings</a></li>
        <li><a href="index.php" name="home">Return Home</a></li>

    </ul>
    <style>
        body {
            margin: 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #4CAF50;
        }

        .income-statement {
            width: 90%;
            margin: auto;
            margin-top: 2rem;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .title-heading {
            background-color: lightblue;
            border-radius: 5px;
            color: white;
            margin-bottom: 20px;
            padding: 10px;
        }

        .income-statement .income-statement-main-heading {
            font-size: 18px;
            margin-top: 1rem;
            color: black;

        }

        .income-statement .business-name {
            font-size: 26px;
            margin-top: 1rem;
            color: black;
        }

        .income-statement .as-of-date {
            font-size: 16px;
            margin-top: 1rem;
            color: black;
        }

        .income-statement-heading {
            margin-top: 0px;
            margin-left: 50px;
            font-size: 20px;
            color: blue;
            text-decoration: underline;
            text-align:left;


        }

        .accountNameCol {
            width: 80%;
        }

        .debitCol,
        .creditCol {
            min-width: 10rem;
        }

        .subtotal {
            text-decoration: overline underline;
        }

        .total {
            text-decoration: overline;
            padding-bottom: 1px;
            border-bottom: double 5px;
        }

        .income-statement-table {
            width: 90%;
        }

        .income-statement th,
        td {
            padding: 8px;
        }
        }
        tr:nth-child(even) {background-color: #f2f2f2;
        }
    </style>
</head>

<body>
<div style="padding:20px;margin-top:30px;height:100;"></div>
<div class="overflow-container col-md-9 col-sm-8 col-xs-12">
    <div class="income-statement" style="">
        <div class="text-center title-heading">
            <div class="business-name" align = "center">Addams & Family Inc.</div>
            <div class="income-statement-main-heading" align = "center">Income Statement</div>
            <div class="as-of-date " align = "center"><?php echo "<p align=center>For the Period Ending " . date("F jS, Y") . "<br></p>"; ?></div>
        </div>
        <div class="tableWrapper">
            <table class="table income-statement-table">
                <thead>
                <tr>
                    <th class="accountNameCol"></th>
                    <th class="debitCol"></th>
                    <th class="creditCol">Total Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr></tr>
                </tbody>
            </table>
        </div>
        <div class="income-statement-heading" align = "">Revenue</div>
        <div class="tableWrapper">
            <table class="income-statement-table">
                <tbody>
                <tr>
                    <td class="accountNameCol">Service Fees</td>
                    <td class="debitCol" align="right">$11,425.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="accountNameCol"><label>Revenue Total</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="creditCol" align="right"><label class="subtotal">$11,425.00</label></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="income-statement-heading">Expenses</div>
        <div class="tableWrapper">
            <table class="income-statement-table">
                <thead></thead>
                <tbody>
                <tr>
                    <td class="accountNameCol">Wages Expense (Also Wages and Salaries Expense)</td>
                    <td class="debitCol" align="right">5,300.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="accountNameCol">Advertising Expense</td>
                    <td class="debitCol" align="right">120.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="accountNameCol">Telephone Expense</td>
                    <td class="debitCol" align="right">130.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="accountNameCol">Electricity Expense, Utilities Expense</td>
                    <td class="debitCol" align="right">200.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="accountNameCol"><label>Expenses Total</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="creditCol" align="right"><label class="subtotal">$(5,750.00)</label></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="income-statement-heading">Net Income</div>
        <div class="tableWrapper">
            <table class="income-statement-table">
                <tbody>
                <tr>
                    <td class="accountNameCol"><label>Net Income Total</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="creditCol" align="right"><label class="total">$5,675.00</label></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <tr>
<th>Account Name</a></th>
<th>Amount</th>
</tr> -->

<!-- <?php
$conn = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT balance, debit, credit from chartofaccounts";
$sql = "SELECT * from chartofaccounts WHERE category = 'Assets'";
$sql = "SELECT * from chartofaccounts WHERE category = 'Equity'";
$sql = "SELECT * from chartofaccounts WHERE category = 'Liabilities'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["category"] . "</rd><td>" . $row["accountname"] .  "</td><td>";
    }
    //echo "</table>";
} else {
    echo "0 results";
}

$conn->close();



?> -->


<!-- <style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style> -->




</body>

</html>
<?php //include "Templates/footer.php"; ?>
