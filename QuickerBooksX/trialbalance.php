<?php include "Templates/header.php"; ?>

<!DOCTYPE html>
<html>

<head>

    <ul>
        <li><a href="trialbalance.php" name="trialbalance">Trial Balance</a></li>
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
        .trial-balance {
            width: 90%;
            margin: auto;
            margin-top: 2rem;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .title-heading {
            background-color: lightblue;
            border-radius: 5px;
            color: black;
            margin-bottom: 20px;
            padding: 10px;
        }

        .trial-balance .income-statement-main-heading {
            font-size: 18px;
            margin-top: 1rem;
        }

        .trial-balance .business-name {
            font-size: 26px;
            margin-top: 1rem;
        }

        .trial-balance .as-of-date {
            font-size: 16px;
            margin-top: 1rem;
        }

        .trial-balance .doubleUnderline {
            text-decoration: overline;
            padding-bottom: 1px;
            border-bottom: double 5px;
        }

        .trial-balance .debitCol,
        .trial-balance .creditCol {
            min-width: 10rem;
        }
        tr:nth-child(even) {background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="overflow-container col-md-9 col-sm-8 col-xs-12">
    <div class="trial-balance" style="">
        <div class="text-center title-heading">
            <div class="business-name" align ="center">Addams &amp; Family Inc.</div>
            <div class="income-statement-main-heading" align = "center">Trial Balance</div>
            <div class="as-of-date " align = "center"><?php echo "<p align=center>For the Period Ending " . date("F jS, Y") . "<br></p>"; ?></div>
        </div>
        <div class="tableWrapper">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="accountName">Account</th>
                    <th class="debitCol text-right">Debit</th>
                    <th class="creditCol text-right">Credit</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a aria-current="false" href="/accounts/1/ledger">100</a><span> - Cash</span></td>
                    <td class="debit" align="right">$8,875.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/4/ledger">201</a><span> - Accounts Receivable</span></td>
                    <td class="debit" align="right">$3,450.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/10/ledger">301</a><span> - Raw Materials</span></td>
                    <td class="debit" align="right">$800.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/13/ledger">400</a><span> - Supplies (Specialty Items like Medical, Bicycle, Tailoring, etc.)</span></td>
                    <td class="debit" align="right">$2,000.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/142/ledger">401</a><span> - Prepaid Card</span></td>
                    <td class="debit" align="right">$2,500.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/16/ledger">403</a><span> - Prepaid Insurance</span></td>
                    <td class="debit" align="right">$1,800.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/141/ledger">404</a><span> - Prepaid Rent</span></td>
                    <td class="debit" align="right">$4,500.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/23/ledger">800</a><span> - Office Equipment (Also Store Equipment)</span></td>
                    <td class="debit" align="right">$9,300.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/42/ledger">1002</a><span> - Accounts Payable (Also Vouchers Payable)</span></td>
                    <td class="debit" align="right"></td>
                    <td class="credit" align="right">$1,000.00</td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/60/ledger">1400</a><span> - Unearned Subscription Revenue (Also Unearned Service/Ticket Revenue, Unearned Repair Fees)</span></td>
                    <td class="debit" align="right"></td>
                    <td class="credit" align="right">$3,000.00</td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/66/ledger">1600</a><span> - John Addams, Capital</span></td>
                    <td class="debit" align="right"></td>
                    <td class="credit" align="right">$20,250.00</td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/84/ledger">1703</a><span> - Service Fees</span></td>
                    <td class="debit" align="right"></td>
                    <td class="credit" align="right">$11,425.00</td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/104/ledger">2000</a><span> - Wages Expense (Also Wages and Salaries Expense)</span></td>
                    <td class="debit" align="right">$5,300.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/105/ledger">2001</a><span> - Advertising Expense</span></td>
                    <td class="debit" align="right">$120.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/115/ledger">2104</a><span> - Telephone Expense</span></td>
                    <td class="debit" align="right">$130.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><a aria-current="false" href="/accounts/123/ledger">2112</a><span> - Electricity Expense, Utilities Expense</span></td>
                    <td class="debit" align="right">$200.00</td>
                    <td class="credit" align="right"></td>
                </tr>
                <tr>
                    <td><label>Total</label></td>
                    <td align="right"><label class="doubleUnderline">$38,975.00</label></td>
                    <td align="right"><label class="doubleUnderline">$35,675.00</label></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php //include "Templates/footer.php"; ?>
