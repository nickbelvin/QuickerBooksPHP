
<?php include('../../config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php'); ?>
<?php $roles = getAllRoles(); ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CREATE USER :: QUICKER BOOKS</title>
    <?php include('../../header.php') ?>

   
    <!-- Custome styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style type="text/css">
    .wthree-field button.btn {
    background: #fc636b;
    border: none;
    color: #fff;
    padding: 11px 15px;
    text-transform: uppercase;
	  font-family: 'Mukta', sans-serif;
    font-size: 16px;
	width:100%;
	margin-top:10px;
    letter-spacing: 2px;
    cursor: pointer;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
	border-radius: 35px;
	-webkit-border-radius: 35px;
	-moz-border-radius: 35px;
	-ms-border-radius: 35px;
	-o-border-radius: 35px;
}
.hide {     /* this will hide div with class div_class_name */
    display:none;
  }

  .error{
    color: #FFBABA;
    font-size: .9em; 
  }

  /* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
</style>
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
            <a href="admin/users/userList.php" class="nav-link active">
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
                <a href="admin/users/userForm.php" class="nav-link active">
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
            <a href="#" class="nav-link">
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
              <li class="breadcrumb-item"><a href="../../layout.php">Quicker Books</a></li>
              <li class="breadcrumb-item active">Add Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">



    <div class="container-fluid" >
      <div class="row">
        <div class="col-md-12 col-md-offset-4">
          <a href="userList.php" class="btn btn-primary" style="margin-bottom: 5px;">
          <i class="fas fa-angle-left"></i>
            View Users
          </a>
          <br>

          <form class="form" action="userForm.php" method="post" enctype="multipart/form-data">
            <?php if ($isEditing === true ): ?>
              <h2 class="text-center">Update User</h2>
            <?php else: ?>
              <h2 class="text-center">Create User</h2>
            <?php endif; ?>
            <hr>
            <!-- if editting user, we need that user's id -->
            <?php if ($isEditing === true): ?>
              <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <?php endif; ?>
            <?php if ($isEditing === true ): ?>
            <div class="form-group">
              <label class="control-label">Username</label>
              <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
            </div>
            <?php endif; ?>
            <div class="form-group">
              <label class="control-label">First Name</label>
              <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label class="control-label">Last Name</label>
              <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label class="control-label">Date of Birth</label>
              <input type="text" name="dob" value="<?php echo $dob; ?>" class="form-control"
               onfocus="(this.type='date')" >
            </div>
            <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : '' ?>">
              <label class="control-label">Email Address</label>
              <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
              <?php if (isset($errors['email'])): ?>
                <span class="errors"><i class="fa fa-times-circle"></i><?php echo $errors['email'] ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control">
            </div>
            <?php if ($isEditing === true ): ?>
              <div class="form-group <?php echo isset($errors['passwordOld']) ? 'has-error' : '' ?>">
                <label class="control-label">Old Password</label>
                <input type="password" name="passwordOld" class="form-control">
                <?php if (isset($errors['passwordOld'])): ?>
                <span class="errors"><i class="fa fa-times-circle"></i><?php echo $errors['passwordOld'] ?></span>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
              <label class="control-label">Password</label>
              <input type="password" name="password" class="form-control">
              <?php if (isset($errors['password'])): ?>
              <span class="errors"><i class="fa fa-times-circle"></i><?php echo $errors['password'] ?></span>
              <?php endif; ?>
            </div>
        
            <div class="form-group">
            <label class="control-label">Status</label>
              <select class="form-control" id="status" name="status">
              <option value="" ></option>
              <option value="Active" <?php if($status=="Active") echo 'selected="selected"'; ?> >Active</option>
              <option value="Inactive" <?php if($status=="Inactive") echo 'selected="selected"'; ?> >Inactive</option>
              <option value="Suspended" <?php if($status=="Suspended") echo 'selected="selected"'; ?> >Suspended</option>
                 </select>
            </div>

            <div id = "suspend" style="display:none">
            <div class="form-group">
              <label class="control-label">Start Date</label>
              <input type="text" id="sdate" name="sdate" value="<?php echo $sdate; ?>" class="form-control"
               onfocus="(this.type='date')" >
            </div>
            <div class="form-group">
              <label class="control-label">End Date</label>
              <input type="text" name="edate" value="<?php echo $sdate; ?>" class="form-control"
               onfocus="(this.type='date')" >
            </div>
      </div>

            <div class="form-group <?php echo isset($errors['role_id']) ? 'has-error' : '' ?>">
              <label class="control-label">User Role</label>
              <select class="form-control" name="role_id">
                <option value="" ></option>
                <?php foreach ($roles as $role): ?>
                  <?php if ($role['id'] === $role_id): ?>
                    <option value="<?php echo $role['id'] ?>" selected><?php echo $role['name'] ?></option>
                  <?php else: ?>
                    <option value="<?php echo $role['id'] ?>"><?php echo $role['name'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
              <?php if (isset($errors['role_id'])): ?>
              <span class="errors"><i class="fa fa-times-circle"></i><?php echo $errors['role_id'] ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group" style="text-align: center;">
              <?php if (!empty($profile_picture)): ?>
                <img src="<?php echo BASE_URL . '/assets/images/' . $profile_picture; ?>" id="profile_img" style="height: 100px; border-radius: 50%" alt="">
              <?php else: ?>
                <img src="http://via.placeholder.com/150x150" id="profile_img" style="height: 100px; border-radius: 50%" alt="">
                <input type="file" name="profile_picture" id="profile_input" value="" style="display: none;">
                <?php endif; ?>
            </div>
            <div class="form-group">
            <div class="wthree-field">
              <?php if ($isEditing === true): ?>
                <button type="submit" name="update_user" class="btn">Update user</button>
              <?php else: ?>
                <button type="submit" name="save_user" class="btn">Save user</button>
              <?php endif; ?>
              
            </div>
          </form>
        </div>
      </div>
    </div>

  
                
<script type="text/javascript" src="assets/js/display_profile_image.js"></script>
<?php include('../../footer.php') ?>

<script>
  $('#status').on('change','select', function(){
    $('#suspend').hide();
    var changeVal = $('#status').val();
    if(changeVal == "Suspended"){
    $('#suspend').show();
    }
    });
  </script>

  </body>
</html>