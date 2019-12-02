
<?php include('admin/reports/ratios.php'); ?>
<?php
$cr = getCurrentRatio();
?>
<?php
$qr = getQuickRatio();
?>
<?php
$da = getDebtAssetRatio();
$de = getDebtEquityRatio();
$inc = getNetIncome();
$exp = getTotalExpenses();
$rev = getTotalRevenue();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
              <div class="dropdown-footer"></div>
             
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  
                
                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  
</li>
 </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="layout.php" class="brand-link">
  
      <img src="assets/images/qb.png" alt="Logo" 
      <a href="layout.php" class="brand-image">
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
                        <a href="layout.php" class="nav-link active">
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
                                    <i class="nav-icon fas fa-book-reader"></i>
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
                        <a href="" class="nav-link">
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
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quicker Books</a></li>
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
      
      <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
            <span class=""><input type="number" value="<?php echo $cr ?>" class="dial"></span>
              <div class="info-box-content">
                <span class="info-box-text-bold">Current Ratio</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class=""><input type="number" value="<?php echo $qr ?>" class="dial"></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Quick Ratio</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class=""><input type="number" value="<?php echo $da ?>" class="dial"></span>
                            <div class="info-box-content">
                                Debt to Asset Ratio
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class=""><input type="number" value="<?php echo $de ?>" class="dial"></span>
                            <div class="info-box-content">
                                Debt to Equity Ratio
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>$<?php echo $exp ?></h3>
                                <p>Expenditure</p>
                            </div>
                        </div>

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>$<?php echo $rev ?></h3>
                                <p>Revenue</p>
                            </div>
                        </div>

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>$<?php echo $inc ?></h3>
                                <p>Net Income</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9">

                        <div class ="card">
                            <canvas id="bar-chart" width="500" height="300"></canvas>
                        </div>
                    </div>

          <!--why is this even here?-->
                    <div class="card">


                        <!-- TradingView Widget BEGIN -->
                        <!--<div class="tradingview-widget-container">
                            <div id="tradingview_a3d86"></div>
                            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
                            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                            <script type="text/javascript">
                                new TradingView.widget(
                                    {
                                        "width": 1150,
                                        "height": 610,
                                        "symbol": "NASDAQ:AAPL",
                                        "interval": "D",
                                        "timezone": "America/New_York",
                                        "theme": "Light",
                                        "style": "1",
                                        "locale": "en",
                                        "toolbar_bg": "#f1f3f6",
                                        "enable_publishing": false,
                                        "allow_symbol_change": true,
                                        "calendar": true,
                                        "news": [
                                            "headlines"
                                        ],
                                        "container_id": "tradingview_a3d86"
                                    }
                                );
                            </script>
                        </div>-->
                        <!-- TradingView Widget END -->

                    </div>



                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar ">
            <!-- Control sidebar content goes here -->
            <!-- Calculator -->

            <div class="calc-main">
                <div class="panel panel-default">
                    <div class="panel-heading" id="results-window">
                        <h1 id="result"></h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-3">
                                <button id="button-1" class="btn number" value="1">
                                    <h1>1</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-2" class="btn number" value="2">
                                    <h1>2</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-3" class="btn number" value="3">
                                    <h1>3</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-plus" class="btn operator" value="+">
                                    <h1>+</h1>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-3">
                                <button id="button-4" class="btn number" value="4">
                                    <h1>4</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-5" class="btn number" value="5">
                                    <h1>5</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-6" class="btn number" value="6">
                                    <h1>6</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-minus" class="btn operator" value="-">
                                    <h1>&minus;</h1>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-3">
                                <button id="button-7" class="btn number" value="7">
                                    <h1>7</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-8" class="btn number" value="8">
                                    <h1>8</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-9" class="btn number" value="9">
                                    <h1>9</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-multiply" class="btn operator" value="*">
                                    <h1>&times;</h1>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-3">
                                <button id="button-0" class="btn number" value="0">
                                    <h1>0</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-." class="btn number" value=".">
                                    <h1>.</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-divide" class="btn operator" value="/">
                                    <h1>&divide;</h1>
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <button id="button-power" class="btn operator" value="^">
                                    <h1>^</h1>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-2"></div>
                            <div class=" col-xs-5">
                                <button id="button-clear" class="btn btn-default clear" value="clear">
                                    <h1>clear</h1>
                                </button>
                            </div>
                            <div class="col-xs-5">
                                <button id="button-equal" class="btn equal" value="=">
                                    <h1>=</h1>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

        <!-- ./wrapper -->



        <!-- jQuery -->
        <script src="Templates/Dashboard/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="Templates/Dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="Templates/Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="Templates/Dashboard/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="Templates/Dashboard/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="Templates/Dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="Templates/Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="Templates/Dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="Templates/Dashboard/plugins/moment/moment.min.js"></script>
        <script src="Templates/Dashboard/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="Templates/Dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="Templates/Dashboard/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- Date Picker -->
        <script src="Templates/Dashboard/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
        <!-- overlayScrollbars -->
        <script src="Templates/Dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="Templates/Dashboard/dist/js/adminlte.js"></script>

        <script src="Templates/Dashboard/plugins/jquery/jquery.js"></script>

        <script src="Templates/Dashboard/plugins/Responsive-Math-Calculator-jQuery/assets/javascript/calc.js"></script>
        <script src="Templates/Dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>

        <script>
            $(".dial").knob({
                readOnly: true,
                fgColor: "green",
                bgColor: "#F2f2f2",
                angleOffset: "-125",
                angleArc: "250",
                skin: "tron",
                rotation:  "anticlockwise",
                width: "150",
                thickness: 0.2
            });

            $(document.body).on('click', 'button#change', function(){
                $("input.dial").val('80%');
            })
        </script>


        <script type = "text/javascript">
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: ["Income", "Expenses"],
                    datasets: [
                        {
                            label: "Profit and Loss",
                            backgroundColor: ["#303C6C", "red"],
                            data: ["<?php echo $inc ?>", "<?php echo $exp ?>"]

                        }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Profit and Loss'
                    }
                }
            });

        </script>

        <script src="Templates/Dashboard/plugins/chart.js/Chart.js"></script>


</body>
</html>
