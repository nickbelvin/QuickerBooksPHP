<?php include('config.php'); ?>
<!DOCTYPE html>
<head>
    <title>Update Status</title>

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



if(isset($_POST['approveButton']))
{
    $TranID = $_POST['hiddenData'];
    $sqlScript = "UPDATE JournalStatus SET TranStatus = 'Approved' WHERE TranID = {$TranID}";

   // $result = $conn->query($sqlScript);

    //$TranIDQuery = mysqli_query($conn, "SELECT TranID FROM journalEntry order by TranID desc limit 1");
    $result=$conn->query($sqlScript);


    if($result){
        $sqlScript2 = "SELECT * from journalEntry WHERE TranID = {$TranID}";
        $result2=$conn->query($sqlScript2);
        while($row=$result2->fetch_assoc()){

            //seperate account number from full account name as shown in journal
            $accounts = $row['account'];
            $temp = preg_replace("/[^0-9]/", "", strval($accounts) );
            $accountnum = intval($temp);

            //get account category and balance from chart of accounts
            $sql2 = "SELECT category, debit, credit, balance FROM chartofaccounts WHERE accountnumber = {$accountnum}";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            $balance = $row2['balance'];

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
                $balanceFormat = number_format($balance, 2);
                $debitFormat = number_format($row['amount'], 2);

                $updateBalanceSql = "UPDATE chartofaccounts SET balance = {$balanceFormat} WHERE accountnumber = {$accountnum}";
                $updateDebitSql = "UPDATE chartofaccounts SET credit = {$debitFormat} WHERE accountnumber = {$accountnum}";
                $result3 = $conn->query($updateBalanceSql);
                $result4 = $conn->query($updateDebitSql);

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
                $balanceFormat = number_format($balance, 2);
                $creditFormat = number_format($row['amount'], 2);

                $updateBalanceSql = "UPDATE chartofaccounts SET balance = {$balanceFormat} WHERE accountnumber = {$accountnum}";
                $updateCreditSql = "UPDATE chartofaccounts SET credit = {$creditFormat} WHERE accountnumber = {$accountnum}";
                $result3 = $conn->query($updateBalanceSql);
            }




        }

        echo "Journal Entry was Successfully Updated! Click <a href='ListFiles2.php'>Here</a> to go back to the journal.";
    }
    else echo "Failed to update journal entry. Contact Support" . "<pre>{$conn->error}</pre>";
    //header("Refresh:0");
}
if(isset($_POST['rejectButton']))
{
    $TranID = $_POST['hiddenData'];
    echo "<form method='post' action='updateReason.php' value=''>
          <input type='text' name='reason' id='reason-field' value='' placeholder='Reason for Rejecting' />
          <input type=\"submit\" name=\"reasonSubmit\" value=\"Reject\" />
          <input type='hidden' name='reasonHiddenText' value='{$TranID}' />
          </form>";

}

?>
        </div>
    </div>
</div>
</body>
</html>
