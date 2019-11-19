

<?php include('../../config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php'); ?>

<?php
  $allAccounts = getAccounts();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACCOUNTS :: QUICKER BOOKS</title>
    <!----------------------------------------------ADDING NAVIGATION------------------------------------------------>

    <?php include('../../header.php') ?>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include('../../navigation.php') ?>


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
            <a href="#" class="nav-link active">                                        <!--active added for current page-->
              <i class="nav-icon fas fa-columns"></i>
              <p>
               Accounts
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
            <h1 class="m-0 text-dark">Accounts</h1>
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
<!---------------------------------------------------------------------------------------------->
      <div4 class="row">
      <div class="col-md-12 col-md-offset-3">

    <a href="userForm.php" class="btn btn-success">
     <i class="fas fa-plus"></i>
      Create new account
    </a>
    <br> <br>
 
      <table class="table table-bordered">
        <thead>
          <tr>
            <th></th>
            <th>Account No</th>
            <th>Account Name</th>
            <th>Category</th>
            <th>Sub-category</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Balance</th>
            <th>Statement</th>
            <th>Comment</th>
            <th colspan="2" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allAccounts as $key => $value): ?>
            <tr>
              <td><?php echo $key + 1; ?></td>
              <td><?php echo $value['accountnumber']; ?></td>
              <td><?php echo $value['accountname'] ?></td>
              <td><?php echo $value['category']; ?></td>
              <td><?php echo $value['subcategory']; ?></td>
              <td><?php echo $value['debit']; ?></td>
              <td><?php echo $value['credit']; ?></td>
              <td><?php echo $value['balance']; ?></td>
              <td><?php echo $value['statement']; ?></td>
           
              <td><?php echo $value['comment']; ?></td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?><?php echo $value['accountnumber'] ?>" class="btn btn-sm btn-success">
                <i class="fas fa-pencil-alt"></i>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?><?php echo $value['accountnumber'] ?>" class="btn btn-sm btn-danger">
                <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

  </div>


  <?php include('../../footer.php') ?>

</body>
</html>