<!--
TODO:
    Create Journalizing UI
    allow multiple debits  ----show and hide div elements
    ensure credits and debits are balanced
    ensure the same account isn't used twice
    send requests to Manager
    Edit existing journal entries, to save and view
    delete journal entries
-->
<?php
    include('config.php');
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
                    <a href="Journalizing.php" class="nav-link active">
                        <i class="nav-icon fas fa-book"></i> 
                        <p>
                            Journalizing
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="Journalizing.php" class="nav-link active">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Create Journal Entry
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="ListFiles.php" class="nav-link">
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
            <a href="#" class="nav-link">
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
echo "
    <p><a href='layout.php'>Return Home</a></p>
    <form method='post' name='counterForm' action='addAccountsEntry.php'>
    <select name='numOfAccountsSelect'>
";
    $counter = 1;
    while ($counter < 16){
        echo "<option value='{$counter}'>" . $counter . "</option>";
        $counter++;
    }
echo "
    <input type=\"submit\" value=\"Go To Accounts\" formaction=\"AddAccountEntry.php\" name=\"submit[]\">
    </form>
";

?>
<p>
    <a href="ListFiles.php">See all files</a>
</p>

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
</body>
</html>

