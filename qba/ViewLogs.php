<?php
include('config.php');
?>
<head>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <title>QUICKER BOOKS</title>
    <!-- Tell the browser to be responsive to screen width -->
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
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-purple navbar-dark ">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>

        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="far fa-question-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">Help Topics</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-columns text-red mr-2"></i>Accounts Overview
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-clipboard-list text-warning mr-2"></i>Reports Overview
                    </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa-calculator"></i>
                </a>

            </li>

            <li class="nav-item dropdown" >
                <a class="nav-link" data-provide="datepicker">
                    <i class="fas fa-calendar"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">Calendar</span>
            </li>

            <!-- User Account Menu -->
            <li class="user-menu">
                <!-- Menu Toggle Button -->
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!-- The user image in the navbar-->
                    <img src="http://via.placeholder.com/150x150" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"> </p></span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- The user image in the menu -->
                    <span class="dropdown-header">
                <img src="http://via.placeholder.com/150x150" class="img-circle" alt="User Image">
                <p>

                  <small></small>
                </p>
</span>

                    <!-- Menu Footer-->
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </a>
                    <a href="#" class="dropdown-item">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-purple elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">

            <img src="assets/images/qb.png" alt="Logo"
                 class="brand-image">
            <span class="brand-text font-weight-light">QUICKER BOOKS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="http://via.placeholder.com/150x150" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['user']['username'] ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="layout.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu">
                        <a href="admin/users/userList.php" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/users/userList.php" class="nav-link">
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
                        </ul>
                    </li>

                    <?php if(intval($_SESSION['user']['role_id']) == 2 || intval($_SESSION['user']['role_id']) == 3): ?>
                    <li class="nav-item has-treeview menu">
                        <a href="Journalizing.php" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Journalizing
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="Journalizing.php" class="nav-link">
                                    <i class="nav-icon fas fa-book-open"></i>
                                    <p>
                                        Create Journal Entry
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ListFiles2.php" class="nav-link">
                                    <i class="nav-icon fas fa-book-open"></i>
                                    <p>
                                        View Journal
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a href="admin/accounts/accountsList.php" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Accounts
                            </p>
                        </a>
                    </li>

                    <?php if(intval($_SESSION['user']['role_id']) == 2 || intval($_SESSION['user']['role_id']) == 3): ?>
                    <li class="nav-item has-treeview menu">
                        <a href="admin/reports/balancesheet.php" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Reports
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/reports/balancesheet.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Balance Sheet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/reports/retearnings.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Retained Earnings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/reports/incomestatement.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Income Statement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/reports/trialbalance.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Trial Balance</p>
                                </a>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a href="ViewLogs.php" class="nav-link active">
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
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="layout.php">Quicker Books</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
$sql = "SELECT * FROM journalevents";
$result = $conn->query($sql);
        echo "
        <input type=\"text\" id=\"myInput\" onkeyup=\"searchTable()\" placeholder=\"Search Logs\">
        <table id=myTable class='sortable'>
            <thead>
                <th><b>ID</b></th>
                <th><b>Date</b></th>
                <th><b>Category</b></th>
                <th><b>Log Type</b></th>
                <th><b>Message</b></th>
            </thead>
            <tbody>
        ";
while($row=$result->fetch_assoc()){
    echo "
    <tr>
        <td>{$row['logID']}</td>
        <td>{$row['date']}</td>
        <td>{$row['category']}</td>
        <td>{$row['logType']}</td>
        <td>{$row['logMessage']}</td>
    </tr>
    ";
}
echo "
    </tbody>
    </table>
";
?>
</body>