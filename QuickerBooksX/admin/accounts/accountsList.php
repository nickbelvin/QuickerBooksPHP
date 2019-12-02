

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
              </ul>
          </li>

          <?php if(intval($_SESSION['user']['role_id']) == 2 || intval($_SESSION['user']['role_id']) == 3): ?>
          <li class="nav-item has-treeview menu">
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
            <a href="admin/accounts/accountsList.php" class="nav-link active">
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
                <a href="../../admin/reports/balancesheet.php" class="nav-link">
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
            <a href="ViewLogs.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Accounts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../layout.php">Quicker Books</a></li>
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

      <div class="row">
      <div class="col-md-12 col-md-offset-3">

    <a href="../../createaccount.php" class="btn btn-success">
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
              <td><?php echo "$".$value['debit']; ?></td>
              <td><?php echo "$".$value['credit']; ?></td>
              <td><?php echo "$".$value['balance']; ?></td>
              <td><?php echo $value['statement']; ?></td>
           
              <td><?php echo $value['comment']; ?></td>
              <td class="text-center">
  
              <a href="../../edit.php?id=<?php echo $value['accountnumber'];?>" class="btn btn-sm btn-success">
                <i class="fas fa-pencil-alt"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

  </div>


  <?php include('../../Templates/footer.php') ?>

</body>
</html>