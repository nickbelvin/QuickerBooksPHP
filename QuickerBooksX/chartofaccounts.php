<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
        <a href="index.php" class="brand-link">

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
                                <a href="chartofaccounts.php" class="nav-link">
                                    <i class="nav-icon fas fa-columns"></i>
                                    <p>
                                        Chart of Accounts
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard"></i>
                                    <p>
                                        Reports
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ViewLogs.php" class="nav-link">
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
                        <h1 class="m-0 text-dark">Chart of Accounts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quicker Books</a></li>
                            <li class="breadcrumb-item active">Chart of Accounts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">


        <div class="modal fade" id="form_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="save_account.php">
                        <div class="modal-header">
                            <h3 class="modal-title">Add Account</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input type="number" name="accountnumber" maxlength="8" class="form-control" required="required" placeholder="--------" />
                                </div>
                                <div class="form-group">
                                    <label>Account Name</label>
                                    <input type="text" name="accountname" class="form-control" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label>Select Normal Side</label>
                                    <select name="normalside" id="normalside" class="form-control" required="required" />
                                    <option value="Left">Left</option>
                                    <option value="Right">Right</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select name="category" id="category" class="form-control" required="required" />
                                    <option value="Assets">Assets</option>
                                    <option value="Liabilities">Liabilities</option>
                                    <option value="Equity">Equity</option>
                                    <option value="Revenues">Revenues</option>
                                    <option value="Expenses">Expenses</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Select Sub-Category</label>
                                    <select name="subcategory" id="subcategory" class="form-control" required="required" />
                                    <option value="Cash Related Accounts">Cash Related Accounts</option>
                                    <option value="Receivables">Receivables</option>
                                    <option value="Inventories">Inventories</option>
                                    <option value="Prepaid Items">Prepaid Items</option>
                                    <option value="Long-Term Investments">Long-Term Investments</option>
                                    <option value="Land">Land</option>
                                    <option value="Buildings">Buildings</option>
                                    <option value="Equipment">Equipment</option>
                                    <option value="Intangibles">Intangibles</option>
                                    <option value="Short-term Payables">Short-term Payables</option>
                                    <option value="Employee Payroll Related Payables">Employee Payroll Related Payables</option>
                                    <option value="Employer Payroll Related Payables">Employer Payroll Related Payables</option>
                                    <option value="Sales Tax">Sales Tax</option>
                                    <option value="Deferred Revenues and Current Portion of Long-Term Debt">Deferred Revenues and Current Portion of Long-Term Debt</option>
                                    <option value="Long-Term Liabilities">Long-Term Liabilities</option>
                                    <option value="Operating Revenues">Operating Revenues</option>
                                    <option value="Other Revenues">Other Revenues</option>
                                    <option value="Cost of Goods Sold">Cost of Goods Sold</option>
                                    <option value="Selling Expenses">Selling Expenses</option>
                                    <option value="General and Administrative Expenses">General and Administrative Expenses</option>
                                    <option value="Other Expenses">Other Expenses</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="debit">Debit</label>
                                    <input type="text" name="debit" id="debit" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00"class="form-control"/>

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
                                </div>
                                <div class="form-group">
                                    <label for="credit">Credit</label>
                                    <input type="text" name="credit" id="credit" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00" class="form-control"/>

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
                                </div>

                                <div class="form-group">
                                    <label>Comment</label>
                                    <input type="text" name="comment" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

<!---------------------------------->

<div id="dataModal" class="modal fade">  
<div class="modal-dialog">  
<div class="modal-content">  
<div class="modal-header">  
<button type="button" class="close" data-dismiss="modal">&times;</button>  
<h4 class="modal-title">Account Details</h4>  
</div>  
<div class="modal-body" id="account_detail">  
</div>  
<div class="modal-footer">  
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>  
</div>  
</div>  
</div>  
<div id="add_data_Modal" class="modal fade">  
<div class="modal-dialog">  
<div class="modal-content">  
<div class="modal-header">  
<h4 class="modal-title">Update Account</h4>  
</div>  
<div class="modal-body"> 



<form method="post" id="insert_form">  
<div class="form-group">
<label>Account Number</label>
<input type="number" name="accountnumber" maxlength="8" class="form-control" required="required" value="<?php echo $row['accountnumber'];?>"/>
</div>
<div class="form-group">
<label>Account Name</label>
<input type="text" name="accountname" class="form-control" required="required" placeholder="Account Name" 
required value="<?php echo $row['accountname'];?>"  />
</div>
<div class="form-group">
<label>Description</label>
<input type="text" name="description" class="form-control"/>
</div>

                            <div class="form-group">
                                <label>Select Normal Side</label>
                                <select name="normalside" id="normalside" class="form-control" required="required" />
                                <option value="Left">Left</option>
                                <option value="Right">Right</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Select Category</label>
                                <select name="category" id="category" class="form-control" required="required" />
                                <option value="Assets">Assets</option>
                                <option value="Liabilities">Liabilities</option>
                                <option value="Equity">Equity</option>
                                <option value="Revenues">Revenues</option>
                                <option value="Expenses">Expenses</option>
                                </select>
                            </div>

<div class="form-group">
<label>Select Sub-Category</label>  
<select name="subcategory" id="subcategory" class="form-control" required="required" />  
<option value="Cash Related Accounts">Cash Related Accounts</option>  
<option value="Receivables">Receivables</option>  
<option value="Inventories">Inventories</option>  
<option value="Prepaid Items">Prepaid Items</option>  
<option value="Long-Term Investments">Long-Term Investments</option>  
<option value="Land">Land</option>  
<option value="Buildings">Buildings</option>  
<option value="Equipment">Equipment</option>  
<option value="Intangibles">Intangibles</option>  
<option value="Short-term Payables">Short-term Payables</option> 
<option value="Employee Payroll Related Payables">Employee Payroll Related Payables</option>  
<option value="Employer Payroll Related Payables">Employer Payroll Related Payables</option>  
<option value="Sales Tax">Sales Tax</option>  
<option value="Deferred Revenues and Current Portion of Long-Term Debt">Deferred Revenues and Current Portion of Long-Term Debt</option>  
<option value="Long-Term Liabilities">Long-Term Liabilities</option>  
<option value="Operating Revenues">Operating Revenues</option>  
<option value="Other Revenues">Other Revenues</option>  
<option value="Cost of Goods Sold">Cost of Goods Sold</option>  
<option value="Selling Expenses">Selling Expenses</option>  
<option value="General and Administrative Expenses">General and Administrative Expenses</option>  
<option value="Other Expenses">Other Expenses</option>  
</select>  
</div>
<div class="form-group">
<label>Comment</label>
<input type="text" name="comment" class="form-control"/>
</div>  
<input type="submit" name="update" id="update" value="Update" class="btn btn-success" />  
</form>  


<form name="form" method="post" action=""> 

<p><label for="accountname">Account Number :</label>
<input name="id" type="hidden" value="<?php echo $row['accountnumber'];?>" />
<input type="text" name="accountnumber" placeholder="Account Number" 
required value="<?php echo $row['accountnumber'];?>" /></p>

<p><label for="accountname">Account Name :</label>
<input name="id" type="hidden" value="<?php echo $row['accountname'];?>" />
<input type="text" name="accountname" placeholder="Account Name" 
required value="<?php echo $row['accountname'];?>" /></p>

<p><label for="accountname">Description :</label>
<input name="id" type="hidden" value="<?php echo $row['description'];?>" />
<input type="text" name="description" placeholder="Enter a Description" 
value="<?php echo $row['description'];?>" /></p>

<p><label for="accountname">Normal Side :</label>
<input name="id" type="hidden" value="<?php echo $row['normalside'];?>" />
<input type="text" name="normalside" placeholder="Normal Side" 
required value="<?php echo $row['normalside'];?>" /></p>

<p><label for="accountname">Category :</label>
<input name="id" type="hidden" value="<?php echo $row['category'];?>" />
<input type="text" name="category" placeholder="Category" 
required value="<?php echo $row['category'];?>" /></p>

<p><label for="accountname">Sub-Category :</label>
<input name="id" type="hidden" value="<?php echo $row['subcategory'];?>" />
<input type="text" name="subcategory" placeholder="Sub-Category" 
required value="<?php echo $row['subcategory'];?>" /></p>

<p><label for="accountname">Comment :</label>
<input name="id" type="hidden" value="<?php echo $row['comment'];?>" />
<input type="text" name="comment" placeholder="Enter a Comment" 
value="<?php echo $row['comment'];?>" /></p>

<p><input name="update" type="submit" value="Update" /></p>
</form>


</div>  
<div class="modal-footer">  
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>  
</div>  
</div>  
</div>  
<script>  
$(document).ready(function(){  
		$('#add').click(function(){  
				$('#insert').val("Insert");  
				$('#insert_form')[0].reset();  
		});  
		$(document).on('click', '.edit_data', function(){  
				var accountnumber = $(this).attr("id");  
				$.ajax({  
						url:"fetch.php",  
						method:"POST",  
						data:{accountnumber:accountnumber},  
						dataType:"json",  
						success:function(data){  
							$('#accountname').val(data.accountname);  
							$('#accountnumber').val(data.accountnumber);  
							$('#description').val(data.description);  
							$('#normalside').val(data.normalside);  
							$('#category').val(data.category);  
							$('#subcategory').val(data.subcategory);  
							$('#insert').val("Update");  
							$('#add_data_Modal').modal('show');  
						}  
				});  
		});  
		$('#insert_form').on("submit", function(event){  
				event.preventDefault();  
				if($('#accountname').val() == "")  
				{  
					alert("Account Name is required");  
				}  
				else if($('#accountnumber').val() == '')  
				{  
					alert("Account Number is required");  
				}  
				else if($('#category').val() == '')  
				{  
					alert("Category is required");  
				}  
				else if($('#subcategory').val() == '')  
				{  
					alert("Sub-Category is required");  
				}  
				else  
				{  
					$.ajax({  
							url:"insert.php",  
							method:"POST",  
							data:$('#insert_form').serialize(),  
							beforeSend:function(){  
								$('#insert').val("Inserting");  
							},  
							success:function(data){  
								$('#insert_form')[0].reset();  
								$('#add_data_Modal').modal('hide');  
								$('#account_table').html(data);  
							}  
					});  
				}  
		});   
});  
</script>




        <!DOCTYPE html>
        <html>
        <head>
            <style>
                #table {
                    border-collapse: collapse;
                    width: 100%;
                }

                #table td, #table th {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                #table tr:nth-child(even){background-color: #f2f2f2;}

                #table tr:hover {background-color: #ddd;}

                #table th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: left;
                    background-color: #8C68CC;
                    color: white;
                }
            </style>
            <script>
                function searchTable() {
                    // Declare variables
                    var input, filter, table, tr, td, td2, i, j, txtValue, found;
                    input = document.getElementById("query");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("table");
                    tr = table.getElementsByTagName("tr");


                    // Loop through all table rows, and hide those who don't match the search query
                    for (i = 1; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td");
                        for (j = 0; j < td.length; j++){
                            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                            }
                        }
                        if (found) {
                            tr[i].style.display = "";
                            found = false;
                        } else /*if (!tr[i].id.match('TableHeader')*/{
                            tr[i].style.display = "none";
                        }

                    }

                }
            </script>
        </head>

        <body>

<ul>
    <a href="createaccount.php" class="btn btn-success">
     <i class="fas fa-plus"></i>
      Create new account
    </a>
    <br> <br>
<form action="SearchCOA.php" method="GET">
<input type="text" name="query" />
<input type="submit" value="Search"
</form>
</ul>
<table id="table">

<tr>
<th onclick="sortTable(0)">	Account Number</th>
<th onclick="sortTable(1)">Account Name</th>
<th>Description</th>
<th onclick="sortTable(3)">Category</th>
<th onclick="sortTable(4)">Sub-Category</th>
<th>Balance</th>
<th>Comment</th>
<th>Status</th>
</tr>

            <script>
                function sortTable(n) {
                    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                    table = document.getElementById("table");
                    switching = true;
                    // Set the sorting direction to ascending:
                    dir = "asc";
                    /* Make a loop that will continue until
                    no switching has been done: */
                    while (switching) {
                        // Start by saying: no switching is done:
                        switching = false;
                        rows = table.rows;
                        /* Loop through all table rows (except the
                        first, which contains table headers): */
                        for (i = 1; i < (rows.length - 1); i++) {
                            // Start by saying there should be no switching:
                            shouldSwitch = false;
                            /* Get the two elements you want to compare,
                            one from current row and one from the next: */
                            x = rows[i].getElementsByTagName("TD")[n];
                            y = rows[i + 1].getElementsByTagName("TD")[n];
                            /* Check if the two rows should switch place,
                            based on the direction, asc or desc: */
                            if (dir == "asc") {
                                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                    // If so, mark as a switch and break the loop:
                                    shouldSwitch = true;
                                    break;
                                }
                            } else if (dir == "desc") {
                                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                    // If so, mark as a switch and break the loop:
                                    shouldSwitch = true;
                                    break;
                                }
                            }
                        }
                        if (shouldSwitch) {
                            /* If a switch has been marked, make the switch
                            and mark that a switch has been done: */
                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                            switching = true;
                            // Each time a switch is done, increase this count by 1:
                            switchcount ++;
                        } else {
                            /* If no switching has been done AND the direction is "asc",
                            set the direction to "desc" and run the while loop again. */
                            if (switchcount == 0 && dir == "asc") {
                                dir = "desc";
                                switching = true;
                            }
                        }
                    }
                }
            </script>


            <?php

            //$conn = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
            $conn = mysqli_connect("remotemysql.com", "tKROkoSDOO", "yGpAbKvSmu", "tKROkoSDOO");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

$sql = "SELECT accountnumber, accountname, description, category, subcategory, balance, comment from chartofaccounts";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	/* while($row = $result->fetch_assoc()) {
	echo "<tr><td>" . $row["accountnumber"]. "</td><td>" . $row["accountname"] . "</td><td>" . 
	$row["description"]. "</td><td>" . $row["category"] .  "</td><td>" . $row["subcategory"] . "</td><td>" . $row["comment"] . "</td></tr>";
	*/
	while($row = mysqli_fetch_assoc($result)) { ?>
		<tr><td align="center">
			<a href="edit.php?accountnumber=<?php echo $row["accountnumber"]; ?>"><?php echo $row["accountnumber"]; ?></a></td>		
		<td align="left">
		<a href="ledger.php"><?php echo $row["accountname"]; ?></a></td>
		<td align="left"><?php echo $row["description"]; ?></td>
		<td align="left"><?php echo $row["category"]; ?></td>
		<td align="left"><?php echo $row["subcategory"]; ?></td>
		<td align="left"><?php echo "$".number_format($row["balance"], 2); ?></td>
		<td align="left"><?php echo $row["comment"]; ?></td>
		<td align="center">
		<a href="deleteaccount.php?accountnumber=<?php echo $row["accountnumber"]; ?>">Deactivate</a>
		</td>
		</tr>
		<?php
	}
	echo "</table>";
} else { echo "0 results"; }
$conn->close();



            ?>
        </table>

        <ul>
            <a href="index.php"><strong>Return Home</strong></a>
        </ul>
        </body>
        </html>
        <?php include "Templates/footer.php"; ?>
