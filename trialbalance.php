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
            width: 70%;
            margin: auto;
            margin-top: 0rem;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .title-heading {
            background-color: #BA55D3;
            border-radius: 5px;
            color: whitesmoke;
            margin-bottom: 20px;
            padding: 0px;
        }

        .income-statement .income-statement-main-heading {
            font-size: 18px;
            margin-top: 0rem;

        }

        .income-statement .business-name {
            font-size: 26px;
            margin-top: 0rem;
        }

        .income-statement .as-of-date {
            font-size: 16px;
            margin-top: 0rem;
        }

        .income-statement-heading {
            margin-top: 0px;
            margin-left: 50px;
            font-size: 20px;
            color: #BA55D3;
            text-decoration: underline;
            text-align:left;
           

        }
        .doubleUnderline {
            text-decoration: overline;
            padding-bottom: 1px;
            border-bottom: double 5px;
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
            text-decoration: doubleunderline;
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
                <div class="income-statement-main-heading" align = "center">Trial Balance</div>
                <div class="as-of-date " align = "center"><?php echo "<p align=center>For the Period Ending " . date("F jS, Y") . "<br></p>"; ?></div>
            </div>

            <div class="tableWrapper">
                <table class="table income-statement-table">
                    <thead>
                        <tr>
                            <th class="accountnumberCol">Acount Number</th>
                            <th class="accountNameCol" align = "center">Account Name</th>
                            <th class="debitCol">Debit</th>
                            <th class="creditCol"> Debit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
            <div class="tableWrapper">
                <table class="income-statement-table">
                 <?php

$conn = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT accountnumber, accountname, debit, credit from chartofaccounts";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $totaldebit = 0.00;
    $totalcredit = 0.00;
    $dollarsign = 0;
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <tbody>
            <tr>
                <td align="left">
                    <a href="edit.php?accountnumber=<?php echo $row["accountnumber"]; ?>"><?php echo $row["accountnumber"]; ?></a></td>
                <td align="left"><?php echo $row["accountname"]; ?></td>
                <td align="right"><?php if ($row["debit"] != 0.00) {
                                                echo "$" . number_format($row["debit"],2);
                                            } ?></td>
                <td align="right"><?php if ($row["credit"] != 0.00) {
                                                echo "$" . number_format($row["credit"],2);
                                            } ?></td>
            </tr>

    <?php
            $totaldebit = $row["debit"] + $totaldebit;
            $totalcredit = $row["credit"] + $totalcredit;
        }
    } else {
        echo "0 results";
    }
    $conn->close();



    ?>
       <tr>
                            <td> Total</td>
                            <td></td>
                            <td class = "doubleUnderline" align="right"><?php print "$" . number_format ($totaldebit, 2) ?> </td>
                            <td class = "doubleUnderline" align="right"><?php print "$" . number_format ($totalcredit,2) ?> </td>
                        </tr>
        </tbody>
                </table>
            </div>

   
        </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
<?php include "Templates/footer.php"; ?>