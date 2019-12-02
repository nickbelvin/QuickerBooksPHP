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
                  <a href="<?php echo BASE_URL . 'logout.php' ?>" class="btn btn-default btn-flat">Sign out</a>
                  </a>
          </li>

                                


 </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo BASE_URL . 'layout.php' ?>" class="brand-link">
  
      <img src="../../assets/images/qb.png" alt="Logo" 
      <a href="<?php echo BASE_URL . 'layout.php' ?>" class="brand-image">
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