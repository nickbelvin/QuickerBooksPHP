<?php include('config.php')?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Templates/Dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="Templates/Dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="Templates/Dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="Templates/Dashboard/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Templates/Dashboard/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="Templates/Dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="Templates/Dashboard/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="Templates/Dashboard/plugins/summernote/summernote-bs4.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="Templates/Dashboard/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="Templates/Dashboard/plugins/chart.js/Chart.css">
    <link rel="stylesheet" href="Templates/Dashboard/plugins/Responsive-Math-Calculator-jQuery/assets/css/style.css">

    <script>
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") { return; }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "$" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "$" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

    </script>
    <style>

        tr {
            padding: 10px;
            border: 1px solid black;

        }
        td{
            border-right: 1px solid black;
            border-left: 1px solid black;

        }
        th {
            text-align: center;
        }
        tr:nth-child(even) {background-color: #BFBAA1;}

    </style>
    <style>
        #myInput {
            /*background-image: url('/css/searchicon.png'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 20%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid black; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
            margin-left: 25px;
        }

        #myTable {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid black; /* Add a grey border */
            font-size: 18px; /* Increase font-size */
        }



        #myTable tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid black;
        }
        </style>
    <!--<style>
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
    </style>-->

    <style>
        .referenceButton {
  background: none!important;
  border: none;
  padding: 0!important;
  /*optional*/
  font-family: arial, sans-serif;
  /*input has OS specific font-family*/
  color: #069;
  text-decoration: underline;
  cursor: pointer;
}
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include('navigation.php') ?>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
                <a href="<?php echo BASE_URL . 'layout.php' ?>"class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <a href="<?php echo BASE_URL . 'admin/users/userList.php' ?>" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL . 'admin/users/userList.php' ?>" class="nav-link">
                            <i class="fas fa-user-edit nav-icon"></i>
                            <p>View Users</p>
                        </a>
                    </li>

                    <?php if(intval($_SESSION['user']['role_id']) == 1): ?>
                    <li class="nav-item">
                        <a href="admin/users/userForm.php" class="nav-link">
                            <i class="fas fa-user-edit nav-icon"></i>
                            <p>Add Users</p>
                        </a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">                                        <!--active added for current page-->
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Accounts
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="chartofaccounts.php" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Chart of Accounts
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Journalizing.php" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Journalizing
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ListFiles2.php" class="nav-link active">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                View Journal
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL . 'admin/accounts/accountsList.php' ?>" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Reports
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>
                                Event Logs
                            </p>
                        </a>
                    </li>
                </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Journal</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Quicker Books</a></li>
                        <li class="breadcrumb-item active">Ledger</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->





    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">






<?php
//$accounts = "";

if(isset($_POST['ledgercount'])) {
    $ledgercount = $_POST['ledgercount'];
}

if(isset($_POST['LedgerAccount'])) {
    $accounts = $_POST['LedgerAccount'];
}
else {
    $accounts = $_GET['accounts'];
}
//print($accounts);
$date = date("F jS, Y");
$sql = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, JournalStatus.TranStatus 
        from journalEntry left join (JournalStatus) on JournalStatus.TranID = journalEntry.TranID where (journalEntry.Account like '%{$accounts}%' AND JournalStatus.TranStatus = 'Approved') ";
$balance = 0;

$result = $conn->query($sql);
//print($accounts);
// Check if it was successfull
if($result) {

    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no entries for this account</p>';
    }
    else {

        // Print the top of a table
        echo "
                <div class=\"text-center title-heading\">
                    <div class=\"business-name\" align = \"center\">{$accounts}</div>
                    <div class=\"main-heading\" align = \"center\">Ledger</div>
                    <div class=\"as-of-date\" align = \"center\"><p align=center>For the Period Ending: {$date} <br></p></div>
                </div>
                <table width=\"100%\" id=\"myTable\">
                <tr>
                    <td><b>Date</b></td>
                    <td><b>Reference</b></td>
                    <td><b>Memo</b></td>
                    <td><b>Debits</b></td>
                    <td><b>Credits</b></td>
                    <td><b>Balance</b></td>
                </tr>";

        // Print each file
        $temp = preg_replace("/[^0-9]/", "", strval($accounts) );
        $accountnum = intval($temp);

        while($row = $result->fetch_assoc()) {

                $sql2 = "SELECT category FROM chartofaccounts WHERE accountnumber = {$accountnum}";
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();

                if ($row['CredOrDeb'] == "Debit"){

                    if($row2['category'] == ("Assets" || "Expenses")){

                        if($row['CredOrDeb'] == "Debit"){
                            $balance += doubleval($row['amount']);
                        }
                        else {
                            $balance -= doubleval($row['amount']);
                        }
                    }
                    else {
                        if($row['CredOrDeb'] == "Credit"){
                            $balance += doubleval($row['amount']);
                        }
                        else {
                            $balance -= doubleval($row['amount']);
                        }
                    }
                    $amount = number_format($row['amount'], 2);
                    $balanceFormat = number_format($balance, 2);
                echo "
                    <tr>
                        <td>{$row['TranDate']}</td>
                        <td><form method='post' action='ViewSingleJournalEntry.php' name='singleJournalForm'><input type='submit' class='referenceNumber' value='{$row['TranID']}' /><input type='hidden' name='singleJournalTranID' value='{$row['TranID']}' /></form></td>
                        <td></td>
                        <td>{$amount}</td>
                        <td></td>
                        <td>{$balanceFormat}</td>
                    </tr>
                    ";
                }
                if ($row['CredOrDeb'] == "Credit"){
                    if($row2['category'] == "Liabilities" || "Revenues" || "Equity"){
                        if($row['CredOrDeb'] == "Debit"){
                            $balance += doubleval($row['amount']);
                        }
                        else {
                            $balance -= doubleval($row['amount']);
                        }
                    }
                    else {
                        if($row['CredOrDeb'] == "Credit"){
                            $balance += doubleval($row['amount']);
                        }
                        else {
                            $balance -= doubleval($row['amount']);
                        }
                    }
                    $amount = number_format($row['amount'], 2);
                    $balanceFormat = number_format($balance, 2);
                    echo "
                        <tr>
                            <td>{$row['TranDate']}</td>
                            <td><form method='post' action='ViewSingleJournalEntry.php' name='singleJournalForm'><input type='submit' value='{$row['TranID']}' /><input type='hidden' name='singleJournalTranID' value='{$row['TranID']}' /></form></td>
                            <td></td>
                            <td></td>
                            <td>{$amount}</td>
                            <td>{$balanceFormat}</td>
                        </tr>
                        ";
                }
        }

        // Close table
        echo '</table>';
    }
    echo '<p>Click <a href="ListFiles2.php">here</a> to go back</p>';

    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$conn->error}</pre>";
}

?>
        </div>
        </div>
    </div>
</body>
