<?php
    include('config.php');
?>
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

    <?php include('header.php') ?>

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
                        <a href="ViewLogs.php" class="nav-link">
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
                        <li class="breadcrumb-item active">Accounts</li>
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
            $TranID = intval($_POST['singleJournalTranID']);

            $sql = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$TranID} order by TranID DESC, CredOrDeb DESC";



            //$result = $conn->query($sql);
            $result2 = $conn->query($sql);
            //$result2 = $conn->query($sql2);
            //$result3 = $conn->query($sql3);

            // Check if it was successfull
            if($result2 /*&& $result2 && $result3*/) {
                // Make sure there are some files in there
                if($result2->num_rows == 0) {
                    echo '<p>There are no files in the database</p>';
                }
                else {

                    echo "  <!--<input type=\"text\" id=\"myInput\" onkeyup=\"searchTable()\" placeholder=\"Search Journal\">-->
                <table width='100%' class='sortable' id='myTable'>
                <thead>
                <tr>
                    <th align=\"center\" id='TableHeader'><b>Date</b></th>
                    <th align=\"center\" id='TableHeader'><b>Accounts</b></th>
                    <th align=\"center\" id='TableHeader'><b>Reference</b></th>
                    <th align=\"center\" id='TableHeader'><b>Debits</b></th>
                    <th align=\"center\" id='TableHeader'><b>Credits</b></th>
                    <th align=\"center\" id='TableHeader'><!--Status--><select value=\"All Statuses\" onchange=\"updateStatusView()\" name=\"selectStatusView\" id='selectStatusView'><option value=\"\" disabled selected><b>Status</b></option><option value=\"Approved\">All Approved</option><option value=\"Pending\">All Pending</option><option value=\"Rejected\">All Rejected</option></select></th>
                    <th align='center' id='TableHeader'><b>Memo</b></th>
                    <th id='TableHeader'><b>&nbsp;</b></th>
                    <th id='TableHeader'><b>&nbsp;</b></th>
                </tr>
                </thead>
                <tbody>
";
                    $count = 1;
                    $counter = 1;

                        $sql2 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$TranID} order by journalEntry.CredOrDeb DESC";
                        $result = $conn->query($sql2) or die($conn->error);

                        //while($row = $result->fetch_assoc()) {
                        $row = $result->fetch_assoc();


                        echo "
                    <tr>
                        <td align='center'>{$row['TranDate']}</td>
                        <td>
                        ";
                        //$accCounter = 0;
                        //$accAmount = $result->num_rows;
                        $sql3 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$TranID} order by journalEntry.CredOrDeb DESC";
                        $result3 = $conn->query($sql3) or die($conn->error);

                        while($row2 = $result3->fetch_assoc()) {

                            if ($row2['CredOrDeb'] == "Debit") {
                                echo "  
                            <form method='post' action='ledger.php' name='ledgerform' id='ledgerform{$counter}'><input type='hidden' name ='LedgerAccount' value='{$row2['Account']}'/><input type='hidden' name ='ledgercount' value='{$counter}'/><a onclick=\"document . getElementById('ledgerform{$counter}') . submit();\">{$row2['Account']}</a></form><br>
                                    ";
                            } else {
                                echo "
                                
                            <form method='post' action='ledger.php' name='ledgerform' id='ledgerform{$counter}'><input type='hidden' name ='LedgerAccount' value='{$row2['Account']}'/><input type='hidden' name ='ledgercount' value='{$counter}'/><a onclick=\"document . getElementById('ledgerform{$counter}') . submit();\" class=\"tab\" style=\"padding-left: 45px;\">{$row2['Account']}</a></form><br>     
                                    ";
                            }
                            //$accCounter++;
                            $counter++;
                        }

                        echo "
                        </td>
                        <td align='center'>{$row['TranID']}</td>
                        <td align='right'>
                        ";


                        //                     <form><input type='hidden' value=''/><input type='hidden' value=''/><a>{$amount}</a></form><br>


                        /*  $amountCounter = 0;
                          $amountAmount = $result->num_rows;
                      while ($amountCounter < $amountAmount) {*/
                        $sql4 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$TranID} order by journalEntry.CredOrDeb DESC";
                        $result4 = $conn->query($sql2) or die($conn->error);
                        while($row3 = $result4->fetch_assoc()){
                            $amount = number_format($row3['amount'], 2);
                            if ($row3['CredOrDeb'] == "Debit") {
                                //echo "{$amount}<br>";
                                echo "{$amount}<br><br><br>";
                            } else {
                                echo "<br><br><br>";
                            }
                            //$amountCounter++;
                        }

                        echo "
                        </td>
                        <td align='right'>
                        ";

                        //$amountCounter2 = 0;

                        //while ($amountCounter2 < $amountAmount) {
                        $sql5 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$TranID} order by journalEntry.CredOrDeb DESC";
                        $result5 = $conn->query($sql2) or die($conn->error);
                        while($row4 = $result5->fetch_assoc()){
                            $amount = number_format($row4['amount'], 2);
                            if ($row4['CredOrDeb'] == "Credit") {
                                echo "{$amount}<br><br><br>";
                            } else {
                                echo "<br><br><br>";
                            }
                            //$amountCounter2++;
                        }



                        echo "
                    </td>
                    <td align='center'>
                    ";
                        if ($row['TranStatus'] == "Pending" /*&& Role = Manager*/) {
                            $parameter = $row['TranID'];
                            //action='updateStatus.php'
                            if(intval($_SESSION['user']['role_id']) == 2) {
                                echo "<div name='StatusDiv' id='StatusDiv'>Pending: <form method='post' action='updateStatus.php' name='UpdateStatus' id='UpdateStatus'>
                                   <input type=\"submit\" name=\"approveButton\" value=\"Approve\" /> 
                                   <!--<a href=\"updateStatus.php?TranID={$row['TranID']}\" value='{$row['TranID']}'>Approve</a>-->
                                   <input type=\"submit\" name=\"rejectButton\" value=\"Reject\" />
                                  
                                   <input type=\"hidden\" name=\"hiddenData\" value=\"{$row['TranID']}\" /> 
                                   </form>
                                   ";
                            }
                            else {
                                echo "Pending";
                            }

                        } else echo "{$row['TranStatus']}: {$row['Reason']}";
                        echo "
                    </td>
                    ";
                    if($row['memo'] != NULL){
                        echo "<td>{$row['memo']}</td>";
                    }
                    else {
                        echo "<td></td>";
                    }
                    echo "
                    <td align='center'>
                    ";
                        if((intval($_SESSION['user']['role_id']) == 2) || (intval($_SESSION['user']['role_id']) == 3)) {
                            echo "
                        <form method='post' action='EditJournal.php'>
                        <input type=\"submit\" name=\"editJournalButton\" value=\"Edit\" />
                        <input type=\"hidden\" name=\"hiddenData\" value=\"{$row['TranID']}\" /> 
                        </form>
                        ";
                        }
                        echo "
                    </td>
                    <td align='center'><a href='get_file.php?id={$row['TranID']}'>Download Attachment</a></td>
                    </tr>
                ";
                        //}



                    echo "</tbody></table>";
                }





//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

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
