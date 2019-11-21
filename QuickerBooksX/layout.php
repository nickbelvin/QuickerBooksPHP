<?php
  session_start();
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
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-envelope"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
            <!-- Message Start -->
            
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Inbox
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Mail</a>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
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
      <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="fas fa-calculator"></i>
 </a>
 <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
 <span class="dropdown-header">Calculator</span> 
                                </li>

      <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="datetimepicker"  data-target="#datetimepicker1">
      <i class="fas fa-calendar" id="datetimepicker1" data-target-input="nearest"></i>
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
            <a href="layout.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
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

          <li class="nav-item">
            <a href="admin/accounts/accountsList.php" class="nav-link">
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
                    <a href="ListFiles.php" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            View Journal
                        </p>
                    </a>
                </li>


          <li class="nav-item">
            <a href="trialbalance.php" class="nav-link">
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
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">

                <p class="card-text">
                  Ratios go here.
                 </p>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Help</h5>
      <p>Sidebar content</p>
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
<!-- overlayScrollbars -->
<script src="Templates/Dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="Templates/Dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="Templates/Dashboard/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Templates/Dashboard/dist/js/demo.js"></script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>

</body>
</html>
