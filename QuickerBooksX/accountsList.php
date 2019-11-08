<?php include('config.php') ?>
<?php include('includes/logic/common_functions.php') ?>
<?php
  $allAccounts = getAccounts();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ACCOUNTS :: QUICKER BOOKS</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="../../static/css/style.css">

</head>
<body>

<?php include('navbar.php') ?>

  <div class="col-md-10 col-md-offset-2">
    <a href="" class="btn btn-success">
      <span class="glyphicon glyphicon-plus"></span>
      Create new account
    </a>
    <hr>
    <h1 class="text-center">Accounts</h1>
    <br />
 
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
            <th>Date Added</th>
            <th>Modified By</th>
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
              <td><?php echo $value['dateadded']; ?></td>
              <td><?php echo $value['user_id']; ?></td>
              <td><?php echo $value['comment']; ?></td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?><?php echo $value['accountnumber'] ?>" class="btn btn-sm btn-success">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>
              <td class="text-center">
                <a href="<?php echo BASE_URL ?><?php echo $value['accountnumber'] ?>" class="btn btn-sm btn-danger">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

  </div>
</body>
</html>