<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php') ?>
<?php
  $allUsers = getUsers();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>USERS :: QUICKER BOOKS</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="../../static/css/style.css">

</head>
<body>

<?php include('../../navbar.php') ?>


  <div class="col-md-10 col-md-offset-2">
    <a href="userForm.php" class="btn btn-success">
      <span class="glyphicon glyphicon-plus"></span>
      Create new user
    </a>
    <hr>
    <h1 class="text-center">Users</h1>
    <br />
    <?php if (isset($users)): ?>
      <table class="table table-bordered">
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
            <th colspan="2" class="text-center">Action</th>
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
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?edit_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-success">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?delete_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <h2 class="text-center">No users in database</h2>
    <?php endif; ?>
  </div>
</body>
</html>