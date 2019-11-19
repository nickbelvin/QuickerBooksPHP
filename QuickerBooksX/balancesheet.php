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
    <<style>
        body {margin:0;}

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
        .balance-sheet {
            width: 90%;
            margin: auto;
            margin-top: 2rem;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .title-heading {
            background-color: lightBlue;
            border-radius: 5px;
            color: white;
            margin-bottom: 20px;
            padding: 10px;
            font: 15px arial, sans-serif;

        }

        .balance-sheet .main-heading {
            font-size: 18px;
            margin-top: 1rem;
            color: black;
            font: 15px arial, sans-serif;

        }

        .data-heading {
            margin-top: 0px;
            margin-left: 50px;
            font-size: 20px;
            color: blue;
            text-decoration: underline;
        }

        .data-subheading {
            padding-left: 30px;
        }

        .data-total {
            text-decoration: underline overline;
            font-weight: 600;
        }

        .data-row {
            padding-left: 45px;
        }

        .balance-sheet .business-name {
            font-size: 26px;
            margin-top: 1rem;
            color: black;
        }

        .balance-sheet .as-of-date {
            font-size: 16px;
            margin-top: 1rem;
            color: black;
        }

        .balance-sheet-table {
            width: 90%;
        }
        tr:nth-child(even) {background-color: #f2f2f2;
        }
    </style>
</head>

<body>
<div style="padding:20px;margin-top:30px;height:100;"></div>
<div class="overflow-container col-md-9 col-sm-8 col-xs-12">
    <div class="balance-sheet" style="">
        <div class="text-center title-heading">
            <div class="business-name" align = "center">Addams &amp; Family Inc.</div>
            <div class="main-heading" align = "center">Balance Sheet</div>
            <div class="as-of-date " align = "center"><?php echo "<p align=center>For the Period Ending " . date("F jS, Y") . "<br></p>"; ?></div>
        </div>
        <div class="tableWrapper">
            <table class="table balance-sheet-table">
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
        <div class="data-heading">Assets</div>
        <div class="tableWrapper">
            <table class="balance-sheet-table">
                <tbody>
                <tr>
                    <td class="data-subheading accountNameCol"><label>Non-current Assets</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="creditCol" align="right">$9,300.00</td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Office Equipment (Also Store Equipment)</td>
                    <td class="debitCol" align="right">$9,300.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-subheading accountNameCol"><label>Current Assets</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="creditCol" align="right">$23,925.00</td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Cash</td>
                    <td class="debitCol" align="right">$8,875.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Accounts Receivable</td>
                    <td class="debitCol" align="right">$3,450.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Raw Materials</td>
                    <td class="debitCol" align="right">$800.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Supplies (Specialty Items like Medical, Bicycle, Tailoring, etc.)</td>
                    <td class="debitCol" align="right">$2,000.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Prepaid Card</td>
                    <td class="debitCol" align="right">$2,500.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Prepaid Insurance</td>
                    <td class="debitCol" align="right">$1,800.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Prepaid Rent</td>
                    <td class="debitCol" align="right">$4,500.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-subheading accountNameCol"><label>Total Assets</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="data-total creditCol" align="right">$33,225.00</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="data-heading">Equity &amp; Liabilities</div>
        <div class="tableWrapper">
            <table class="balance-sheet-table">
                <tbody>
                <tr>
                    <td class="data-subheading accountNameCol"><label>Owners Equity</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="creditCol" align="right">$25,925.00</td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">John Addams, Capital</td>
                    <td class="debitCol" align="right">$20,250.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Income Estimation</td>
                    <td class="debitCol" align="right">$5,675.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td class="data-subheading accountNameCol"><label>Current Liabilities</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="creditCol" align="right">$4,000.00</td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Accounts Payable (Also Vouchers Payable)</td>
                    <td class="debitCol" align="right">$1,000.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-row accountNameCol">Unearned Subscription Revenue (Also Unearned Service/Ticket Revenue, Unearned Repair Fees)</td>
                    <td class="debitCol" align="right">$3,000.00</td>
                    <td class="creditCol" align="right"></td>
                </tr>
                <tr>
                    <td class="data-subheading accountNameCol"><label>Total Equity & Liabilities</label></td>
                    <td class="debitCol" align="right"></td>
                    <td class="data-total creditCol" align="right">$29,925.00</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$conn = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT balance from chartofaccounts";
$sql = "SELECT * from chartofaccounts WHERE category = 'Assets'";
$sql = "SELECT * from chartofaccounts WHERE category = 'Equity'";
$sql = "SELECT * from chartofaccounts WHERE category = 'Liability'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["category"]. "</rd><td>" . $row["accountname"].  "</td><td>";
    }
//echo "</table>";
}

// $sql = "SELECT * from chartofaccounts WHERE category = 'Equity'";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
// // output data of each row
// while($row = $result->fetch_assoc()) {
// echo "<tr><td>" . $row["category"]. "</rd><td>" . $row["accountname"]. "</td><td>";
// }
// //echo "</table>";
// } else { echo "0 results"; }

// $sql = "SELECT * from chartofaccounts WHERE category = 'Liability'";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
// // output data of each row
// while($row = $result->fetch_assoc()) {
// echo "<tr><td>" . $row["category"]. "</rd><td>" . $row["accountname"]. "</td><td>";
// }
// //echo "</table>";
// } else { echo "0 results"; }
$conn->close();



?>

</body>
</html>
<?php //include "Templates/footer.php"; ?>
