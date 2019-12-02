<?php include('EditJournal.php') ?>
<head>
    <script>
        function myFunction()
        {
            alert("I am an alert box!"); // this is the message in ""
        }
    </script>
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
if(isset($_POST['cancelButton'])){
    echo "<script>myFunction()</script>";
    //header('Location: ' . BASE_URL . 'ListFiles.php');
}

if(isset($_POST['submitButton'])){
    $updatedAccountCount = 1;
    $AccountCount = $_POST['AccountCount'];

    while ($updatedAccountCount < $AccountCount) {
        $accountIDGet = $_POST['account' . $updatedAccountCount . 'ID'];
        $Account = $_POST['account' . $updatedAccountCount];
        $TranType = $_POST['TranType'. $updatedAccountCount];
        $amount = $_POST['amount' . $updatedAccountCount];
        $amount = ltrim($amount, '$');
        $temp = str_replace(',', '', $amount);
        if (is_numeric($temp)) {
            $amount = $temp;
        }

        $oldsql = "SELECT (Account, amount) FROM journalEntry WHERE TranID = {$accountIDGet}";
        $oldResult = $oldsql->fetch_assoc();
        $oldAccount = $oldResult['Account'];
        $oldAmount = $oldResult['amount'];

        $updateSql = "UPDATE journalEntry SET Account = '{$Account}', CredOrDeb = '{$TranType}', amount = {$amount} WHERE ID = {$accountIDGet}";
        //$updateSql2 = "UPDATE JournalStatus SET Status = 'Pending' WHERE TranID = {$TranID}";

        $result = $conn->query($updateSql);

        $transql = "SELECT TranID from journalEntry WHERE ID = {$accountIDGet}";
        $row=$transql->fetch_assoc();
        $TranID = $row['TranID'];
        $updateTranIdsql = "UPDATE JournalStatus SET TranStatus = 'Pending' WHERE TranID = {$TranID}";
        $result2 = $conn->query($updateTranIdsql);

        $oldsql = "SELECT (Account, amount) FROM journalEntry WHERE TranID = {$accountIDGet}";

        $user = $_SESSION['user']['username'];
        $logQuery = "INSERT INTO journalevents (`category`, `logType`, `logMessage`) VALUES ('Journal', 'UpdateJournal', 'User \"{$user}\" has updated the journal entry with Transaction ID: {$TranID}. NEW: Account - \"{$accountIDGet}\", Amount - \"{$amount}\"   OLD: Account - \"{$oldAccount}\", Amount - \"{$oldAmount}\"')";
        $logResult = $conn->query($logQuery);

        $updatedAccountCount++;
    }
    $transql = "SELECT TranID from journalEntry WHERE ID = {$accountIDGet}";
    $row=$transql->fetch_assoc();
    $TranID = $row['TranID'];

    if ($result) {
        echo '<p>Journal Successfully updated! Click <a href="ListFiles2.php">here</a> to go back</p>';

    }
    else echo "An error occurred. Please try again later or contact support." . "<pre>{$conn->error}</pre>";
}
?>
        </div>
    </div>
</div>
</body>
