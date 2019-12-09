<?php include('config.php'); ?>


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
                  <a href="#" class="btn btn-primary btn-flat">Profile</a>
                  </a>
                <a href="#" class="dropdown-item">
                <a href="logout.php" class="btn btn-primary btn-flat">Sign out</a>
                  </a>
</li>
 </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="layout.html" class="brand-link">
  
      <img src="assets/images/qb.png" alt="Logo" 
      <a href="layout.html" class="brand-image">
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
          <li class="nav-item has-treeview menu-open">
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
            <a href="admin/accounts/accountsList.php" class="nav-link active">
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
            <h1 class="m-0 text-dark">Create Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="layout.php">Quicker Books</a></li>
              <li class="breadcrumb-item active">Create Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->





<!--     <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style> -->



    <form method="post" action="createaccount.php">
    	<label for="accountname">Account Name :</label>
    	<input type="text" name="accountname" id="accountname" required="required" placeholder="Please enter a name"/><br /><br />
    	<label for="accountnumber">Account Number :</label>
    	<input type="text" name="accountnumber" id="accountnumber" required="required" placeholder="000000"/><br /><br />
    	<label for="description">Description :</label>
    	<input type="text" name="description" id="description" placeholder="Please enter a description"/><br /><br />
    	<label for="normalside">Normal Side :</label>
        <select name="normalside">
            <?php
            $sql = mysqli_query($conn, "SELECT DISTINCT normalside FROM chartofaccounts order by normalside asc");
            while ($row = $sql->fetch_assoc()){
                echo "<option value=\"{$row['normalside']} \">" . $row['normalside'] . "</option>";
            }
            ?>
        </select>
        <br /><br />
    	<label for="category">Category :</label>
    	<!-- <input type="text" name="category" id="category" required="required" placeholder="Please Enter Category"/><br /><br /> -->
        <select name="category">
            <?php
            $sql = mysqli_query($conn, "SELECT DISTINCT category FROM chartofaccounts order by category asc");
            while ($row = $sql->fetch_assoc()){
                echo "<option value=\"{$row['category']} \">" . $row['category'] . "</option>";
            }
            ?>
        </select>
        <br /><br />
    	    	<label for="subcategory">Sub-Category :</label>
    	<!-- <input type="text" name="subcategory" id="subcategory" required="required" placeholder="Please Enter SubCategory"/><br /><br /> -->
        <select name="subcategory">
            <?php
            $sql = mysqli_query($conn, "SELECT DISTINCT subcategory FROM chartofaccounts order by subcategory asc");
            while ($row = $sql->fetch_assoc()){
                echo "<option value=\"{$row['subcategory']} \">" . $row['subcategory'] . "</option>";
            }
            ?>
        </select>
        <br /><br />
    	<label for="initialbalance">Initial Balance :</label>
    	<!-- <input type="text" name="initialbalance" id="initialbalance" placeholder="0.00"/><br /><br /> -->
    	<input type="text" name="initialbalance" id="initialbalance" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00"><br /><br />
        <!--jquery for formatting for number field-->
        <script>
            // Jquery Dependency

            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this), "blur");
                }
            });


            function formatNumber(n) {
                // format number 1000000 to 1,234,567
                return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }


            function formatCurrency(input, blur) {
                // appends $ to value, validates decimal side
                // and puts cursor back in right position.

                // get input value
                var input_val = input.val();

                // don't validate empty input
                if (input_val === "") { return; }

                // original length
                var original_len = input_val.length;

                // initial caret position
                var caret_pos = input.prop("selectionStart");

                // check for decimal
                if (input_val.indexOf(".") >= 0) {

                    // get position of first decimal
                    // this prevents multiple decimals from
                    // being entered
                    var decimal_pos = input_val.indexOf(".");

                    // split number by decimal point
                    var left_side = input_val.substring(0, decimal_pos);
                    var right_side = input_val.substring(decimal_pos);

                    // add commas to left side of number
                    left_side = formatNumber(left_side);

                    // validate right side
                    right_side = formatNumber(right_side);

                    // On blur make sure 2 numbers after decimal
                    if (blur === "blur") {
                        right_side += "00";
                    }

                    // Limit decimal to only 2 digits
                    right_side = right_side.substring(0, 2);

                    // join number by .
                    input_val = "$" + left_side + "." + right_side;

                } else {
                    // no decimal entered
                    // add commas to number
                    // remove all non-digits
                    input_val = formatNumber(input_val);
                    input_val = "$" + input_val;

                    // final formatting
                    if (blur === "blur") {
                        input_val += ".00";
                    }
                }

                // send updated string to input
                input.val(input_val);

                // put caret back in the right position
                var updated_len = input_val.length;
                caret_pos = updated_len - original_len + caret_pos;
                input[0].setSelectionRange(caret_pos, caret_pos);
            }

        </script>
        
    	<label for="debit">Debit :</label>
    	<!-- <input type="text" name="debit" id="debit" placeholder="0.00"/><br /><br /> -->
    	<input type="text" name="debit" id="debit" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00"><br /><br />

    	        <!--jquery for formatting for number field-->
        <script>
            // Jquery Dependency

            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this), "blur");
                }
            });


            function formatNumber(n) {
                // format number 1000000 to 1,234,567
                return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }


            function formatCurrency(input, blur) {
                // appends $ to value, validates decimal side
                // and puts cursor back in right position.

                // get input value
                var input_val = input.val();

                // don't validate empty input
                if (input_val === "") { return; }

                // original length
                var original_len = input_val.length;

                // initial caret position
                var caret_pos = input.prop("selectionStart");

                // check for decimal
                if (input_val.indexOf(".") >= 0) {

                    // get position of first decimal
                    // this prevents multiple decimals from
                    // being entered
                    var decimal_pos = input_val.indexOf(".");

                    // split number by decimal point
                    var left_side = input_val.substring(0, decimal_pos);
                    var right_side = input_val.substring(decimal_pos);

                    // add commas to left side of number
                    left_side = formatNumber(left_side);

                    // validate right side
                    right_side = formatNumber(right_side);

                    // On blur make sure 2 numbers after decimal
                    if (blur === "blur") {
                        right_side += "00";
                    }

                    // Limit decimal to only 2 digits
                    right_side = right_side.substring(0, 2);

                    // join number by .
                    input_val = "$" + left_side + "." + right_side;

                } else {
                    // no decimal entered
                    // add commas to number
                    // remove all non-digits
                    input_val = formatNumber(input_val);
                    input_val = "$" + input_val;

                    // final formatting
                    if (blur === "blur") {
                        input_val += ".00";
                    }
                }

                // send updated string to input
                input.val(input_val);

                // put caret back in the right position
                var updated_len = input_val.length;
                caret_pos = updated_len - original_len + caret_pos;
                input[0].setSelectionRange(caret_pos, caret_pos);
            }

        </script>
        
    	<label for="credit">Credit :</label>
    	<!-- <input type="text" name="credit" id="credit" placeholder="0.00"/><br /><br /> -->
    	<input type="text" name="credit" id="credit" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00"><br /><br />

    	<!--jquery for formatting for number field-->
        <script>
            // Jquery Dependency

            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this), "blur");
                }
            });


            function formatNumber(n) {
                // format number 1000000 to 1,234,567
                return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }


            function formatCurrency(input, blur) {
                // appends $ to value, validates decimal side
                // and puts cursor back in right position.

                // get input value
                var input_val = input.val();

                // don't validate empty input
                if (input_val === "") { return; }

                // original length
                var original_len = input_val.length;

                // initial caret position
                var caret_pos = input.prop("selectionStart");

                // check for decimal
                if (input_val.indexOf(".") >= 0) {

                    // get position of first decimal
                    // this prevents multiple decimals from
                    // being entered
                    var decimal_pos = input_val.indexOf(".");

                    // split number by decimal point
                    var left_side = input_val.substring(0, decimal_pos);
                    var right_side = input_val.substring(decimal_pos);

                    // add commas to left side of number
                    left_side = formatNumber(left_side);

                    // validate right side
                    right_side = formatNumber(right_side);

                    // On blur make sure 2 numbers after decimal
                    if (blur === "blur") {
                        right_side += "00";
                    }

                    // Limit decimal to only 2 digits
                    right_side = right_side.substring(0, 2);

                    // join number by .
                    input_val = "$" + left_side + "." + right_side;

                } else {
                    // no decimal entered
                    // add commas to number
                    // remove all non-digits
                    input_val = formatNumber(input_val);
                    input_val = "$" + input_val;

                    // final formatting
                    if (blur === "blur") {
                        input_val += ".00";
                    }
                }

                // send updated string to input
                input.val(input_val);

                // put caret back in the right position
                var updated_len = input_val.length;
                caret_pos = updated_len - original_len + caret_pos;
                input[0].setSelectionRange(caret_pos, caret_pos);
            }

        </script>
        
    	<label for="balance">Balance :</label>
    	<!-- <input type="text" name="balance" id="balance" placeholder="0.00"/><br /><br /> -->
    	<input type="text" name="balance" id="balance" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00"><br /><br />

    	<!--jquery for formatting for number field-->
        <script>
            // Jquery Dependency

            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this), "blur");
                }
            });


            function formatNumber(n) {
                // format number 1000000 to 1,234,567
                return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }


            function formatCurrency(input, blur) {
                // appends $ to value, validates decimal side
                // and puts cursor back in right position.

                // get input value
                var input_val = input.val();

                // don't validate empty input
                if (input_val === "") { return; }

                // original length
                var original_len = input_val.length;

                // initial caret position
                var caret_pos = input.prop("selectionStart");

                // check for decimal
                if (input_val.indexOf(".") >= 0) {

                    // get position of first decimal
                    // this prevents multiple decimals from
                    // being entered
                    var decimal_pos = input_val.indexOf(".");

                    // split number by decimal point
                    var left_side = input_val.substring(0, decimal_pos);
                    var right_side = input_val.substring(decimal_pos);

                    // add commas to left side of number
                    left_side = formatNumber(left_side);

                    // validate right side
                    right_side = formatNumber(right_side);

                    // On blur make sure 2 numbers after decimal
                    if (blur === "blur") {
                        right_side += "00";
                    }

                    // Limit decimal to only 2 digits
                    right_side = right_side.substring(0, 2);

                    // join number by .
                    input_val = "$" + left_side + "." + right_side;

                } else {
                    // no decimal entered
                    // add commas to number
                    // remove all non-digits
                    input_val = formatNumber(input_val);
                    input_val = "$" + input_val;

                    // final formatting
                    if (blur === "blur") {
                        input_val += ".00";
                    }
                }

                // send updated string to input
                input.val(input_val);

                // put caret back in the right position
                var updated_len = input_val.length;
                caret_pos = updated_len - original_len + caret_pos;
                input[0].setSelectionRange(caret_pos, caret_pos);
            }

        </script>
        
    	<label for="userid">Added By :</label>
    	<input type="text" name="userid" id="userid" required="required"/><br /><br />
    	<label for="order">Order :</label>
    	<input type="text" name="order" id="order" placeholder="00"/><br /><br />
    	<label for="statement">Statement :</label>
    	<input type="text" name="statement" id="statement"/><br /><br />
    	<label for="comment">Comment :</label>
    	<input type="text" name="comment" id="comment"/><br /><br />
    	
    	<input type="submit" name="submit" value="Submit">
    </form>
    

</body>
</html>


<?php

    if(isset($_POST["submit"])){
        
    	
    	global $conn;
    	// Check connection
    	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
    	}

    	//get values from form
		$accountname= mysqli_real_escape_string($conn, $_POST["accountname"]);
		$accountnumber= mysqli_real_escape_string($conn, $_POST["accountnumber"]);
		$description= mysqli_real_escape_string($conn, $_POST["description"]);
		$normalside= mysqli_real_escape_string($conn, $_POST["normalside"]);
		$category= mysqli_real_escape_string($conn, $_POST["category"]);
		$subcategory= mysqli_real_escape_string($conn, $_POST["subcategory"]);
		$initialbalance= mysqli_real_escape_string($conn, $_POST["initialbalance"]);
		$debit= mysqli_real_escape_string($conn, $_POST["debit"]);
		$credit= mysqli_real_escape_string($conn, $_POST["credit"]);
		$balance= mysqli_real_escape_string($conn, $_POST["balance"]);
		$dateadded= date("Y-m-d");
		$userid= mysqli_real_escape_string($conn, $_POST["userid"]);
		$order= mysqli_real_escape_string($conn, $_POST["order"]);
		$statement= mysqli_real_escape_string($conn, $_POST["statement"]);
		$comment= mysqli_real_escape_string($conn, $_POST["comment"]);


/* 		echo trim($initialbalance,"$");
		echo trim($debit,"$");
		echo trim($credit,"$");
		echo trim($balance,"$"); */
		
		//insert data into mysql
		
		$sql = "INSERT INTO chartofaccounts (accountname, accountnumber, description, normalside, category, subcategory, initialbalance, debit, credit, balance, dateadded, userid, order, statement, comment) 
		VALUES ('$accountname', '$accountnumber', '$description', '$normalside', '$category', '$subcategory', '$initialbalance', '$debit', '$credit', '$balance', '$dateadded', '$userid', '$order', '$statement', '$comment')";


		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}$conn->close();
		
		/* $sql = "INSERT INTO chartofaccounts(accountname, accountnumber, description, normalside, category, subcategory, initialbalance, debit, credit, balance, dateadded, userid, order, statement, comment) 
		VALUES ('$accountname', '$accountnumber', '$description', '$normalside', '$category', '$subcategory', '$initialbalance', '$debit', '$credit', '$balance', '$dateadded', '$userid', '$order', '$statement', '$comment',  NOW(), 'Pending')";
		/* 
		mysqli_query($conn,$sql)or die(mysql_error());
		 	echo "New account created successfully";
		* /
			$result = $conn->query($sql);
			if ($result) {
			echo "New account created successfully!";
		} else { echo 'Error! Failed to insert the account'
                . "<pre>{$conn->error}</pre>"; }
		$conn->close(); */
	}
?>

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

