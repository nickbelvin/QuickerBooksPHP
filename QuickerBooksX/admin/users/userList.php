<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php') ?>
<?php
  $allUsers = getUsers();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>USERS :: QUICKER BOOKS</title>
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
                    <li class="nav-item">
                        <a href="../../layout.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu">
                        <a href="../../admin/users/userList.php" class="nav-link active">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../../admin/users/userList.php" class="nav-link active">
                                    <i class="fas fa-user-edit nav-icon"></i>
                                    <p>View Users</p>
                                </a>
                            </li>
                            <?php if(intval($_SESSION['user']['role_id']) == 1): ?>
                            <li class="nav-item">
                                <a href="../../admin/users/userForm.php" class="nav-link">
                                    <i class="fas fa-user-edit nav-icon"></i>
                                    <p>Add Users</p>
                                </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </li>

                    <?php if(intval($_SESSION['user']['role_id']) == 2 || intval($_SESSION['user']['role_id']) == 3): ?>
                    <li class="nav-item has-treeview menu-open">
                        <a href="../../Journalizing.php" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Journalizing
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../../Journalizing.php" class="nav-link">
                                    <i class="nav-icon fas fa-book-open"></i>
                                    <p>
                                        Create Journal Entry
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../ListFiles2.php" class="nav-link">
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
                        <a href="../../admin/accounts/accountsList.php" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Accounts
                            </p>
                        </a>
                    </li>

                    <?php if(intval($_SESSION['user']['role_id']) == 2 || intval($_SESSION['user']['role_id']) == 3): ?>
                    <li class="nav-item has-treeview menu-open">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Reports
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./../admin/reports/balancesheet.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Balance Sheet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../admin/reports/retearnings.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Retained Earnings</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../../admin/reports/incomestatement.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Income Statement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../admin/reports/trialbalance.php" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Trial Balance</p>
                                </a>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a href="../../ViewLogs.php" class="nav-link">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>
                                Event Logs
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../admin/mailbox/email.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Quicker Books</a></li>
              <li class="breadcrumb-item active">View Users</li>
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
      <div class="col-md-12 col-md-offset-3">

    <a href="userForm.php" class="btn btn-success">
     <i class="fas fa-plus"></i>
      Create new user
    </a>
    <br> <br>
    <?php if (isset($users)): ?>
      <table align="left" class="table table-bordered">
        <thead>
          <tr>
            <th></th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Role</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Password Expiration</th>
            <?php if(intval($_SESSION['user']['role_id']) == 1): ?>
            <th colspan="2" class="text-center">Action</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allUsers as $key => $value): ?>
            <tr>
              <td><?php echo $key + 1; ?></td>
              <td><?php echo $value['id']; ?></td>
              <td><?php echo $value['username'] ?></td>
              <td><?php echo $value['role']; ?></td>
              <td><?php echo $value['fname']; ?></td>
              <td><?php echo $value['lname']; ?></td>
              <td><?php echo $value['dob']; ?></td>
              <td><?php echo $value['email']; ?></td>
              <td><?php echo $value['phone']; ?></td>
              <td><?php echo $value['password_expiry']; ?></td>
              <td class="text-center">
              <?php if(intval($_SESSION['user']['role_id']) == 1): ?>
                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?edit_user=<?php echo $value['id'] ?>" 
                class="btn btn-sm btn-success">
                <i class="fas fa-pencil-alt"></i>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?delete_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">
                <i class="fas fa-trash-alt"></i>
                </a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <h2 class="text-center">No users in database</h2>
    <?php endif; ?>
  </div>
</div>



<?php include('../../footer.php') ?>

</body>
</html>
