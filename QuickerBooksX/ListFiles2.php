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

    <!--adding table formatting thing-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
<script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>

<script>
        //adding table formatting things
        $(document).ready( function () {
            
            $('#myTable').dataTable();
            
            
        });
    </script>


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style type="text/css">
        <!--
        .tab { margin-left: 40px; }
        -->
    </style>
    <style>
        {box-sizing: border-box;}

        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
    </style>

    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="tablesorter.mod.js"></script>
    <!--<style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>-->
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

        a{
            color: blue;
        }
        
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
            border-collapse: collapse; 
            width: 100%; 
            border: 1px solid black; 
            font-size: 18px; 
        }



        #myTable tr {
            
            border-bottom: 1px solid black;
        }


    </style>
    <script>
        //table searching function
        function searchTable() {
            // Declare variables
            var input, filter, table, tr, td, td2, i, j, txtValue, found;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");


            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td");
                    for (j = 0; j < td.length; j++){
                        if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                        }
                    }
                    if (found) {
                        tr[i].style.display = "";
                        found = false;
                    } else /*if (!tr[i].id.match('TableHeader')*/{
                            tr[i].style.display = "none";
                    }

            }

        }


        function updateStatusView() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("selectStatusView");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");


                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[5];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }

        }

            

    </script>
    
    <?php include('header.php') ?>

</head>

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
                    <li class="nav-item">
                        <a href="admin/mailbox/email.php" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Email
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
echo "<p><a href='layout.php'>Return Home</a></p>";


// Query for a list of all existing files
//$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
//$sql = 'SELECT `id`, `name`, `TranID`, `amount`, `AccDebited`, `AccCredited`, `path`, `size`, `data`, `created`, status FROM `file2`';
//$sql = 'SELECT `TranID`, `Account`, `CredOrDeb`, `TranDate`, `amount` from journalEntry left join attachment on journalEntry.TranID = attachment.TranID left join JournalStatus on journalEntry.TranID = JournalStatus.TranID';
//$sql2 = 'SELECT `TranID`, `mime`, `size`, `data` from attachment';
//$sql3 = 'SELECT `TranID`, `TranStatus`, `Reason` from JournalStatus';
$sql = 'SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID order by TranID DESC, CredOrDeb DESC';


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
//class='sortable' for table
        echo "  
    
                <input type=\"text\" id=\"myInput\" onkeyup=\"searchTable()\" placeholder=\"Search Journal\">
                <table width='100%' id='myTable'>
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

        $TranIDQuery = mysqli_query($conn, "SELECT TranID FROM journalEntry order by TranID desc limit 1");
        $row8=$TranIDQuery->fetch_assoc();
        $TranMax = $row8['TranID'] + 1;

        while ($count < $TranMax){


            $sql2 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$count} order by journalEntry.CredOrDeb DESC";
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
                $sql3 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$count} order by journalEntry.CredOrDeb DESC";
                $result3 = $conn->query($sql3) or die($conn->error);
                
                while($row2 = $result3->fetch_assoc()) {

                    if ($row2['CredOrDeb'] == "Debit") {
                        echo "  
                            <form method='post' action='ledger.php' name='ledgerform' id='ledgerform{$counter}'><input type='hidden' name ='LedgerAccount' value='{$row2['Account']}'/><input type='hidden' name ='ledgercount' value='{$counter}'/><a onclick=\"document . getElementById('ledgerform{$counter}') . submit();\" style=\"color:blue\">{$row2['Account']}</a></form><br>
                                    ";
                    } else {
                        echo "
                            <form method='post' action='ledger.php' name='ledgerform' id='ledgerform{$counter}'><input type='hidden' name ='LedgerAccount' value='{$row2['Account']}'/><input type='hidden' name ='ledgercount' value='{$counter}'/><a onclick=\"document . getElementById('ledgerform{$counter}') . submit();\" class=\"tab\" style=\"color:blue\">{$row2['Account']}</a></form><br>     
                                    ";
                    }
                    //$accCounter++;
                    $counter++;
                }

                echo "
                        </td>
                        <td align='center'>
                        ";
                        $counted = 1;
                        $sql6 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$count} order by journalEntry.CredOrDeb DESC";
                        $result6 = $conn->query($sql6) or die($conn->error);
                        
                        while($row6 = $result6->fetch_assoc()) {
                            $temp = preg_replace("/[^0-9]/", "", strval($row6['Account']) );
                            $accountnum = intval($temp);
                            echo "<form method='post' action='ledger.php?accounts={$row6['Account']}'><input type='hidden' value='{$accountnum}'/><a onclick=\"document . getElementById('ledgerform{$counted}') . submit();\" style=\"color:blue\">{$accountnum}</a></form><br>
                            ";
                            //print($row6['Account']);
                            $counted ++;
                        }
                        //{$row['TranID']}

                        echo "
                        </td>
                        <td align='right'>
                        ";


                       //                     <form><input type='hidden' value=''/><input type='hidden' value=''/><a>{$amount}</a></form><br>


                  /*  $amountCounter = 0;
                    $amountAmount = $result->num_rows;
                while ($amountCounter < $amountAmount) {*/
                $sql4 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$count} order by journalEntry.CredOrDeb DESC";
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
                $sql5 = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason, JournalStatus.memo from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID WHERE journalEntry.TranID = {$count} order by journalEntry.CredOrDeb DESC";
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
                if(((intval($_SESSION['user']['role_id']) == 2) || (intval($_SESSION['user']['role_id']) == 3)) && ($row['TranStatus'] != 'Pending')) {
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
                $count++;

            }
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

// Close the mysql connection
//$conn->close();
?>

        </div>
    </div>
</div>
</body>

