<?php include('config.php') ?>
<head>

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
    <?php include('header.php') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include('navigation.php') ?>


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
                        <a href="#" class="nav-link">                                        <!--active added for current page-->
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
                        <a href="ListFiles2.php" class="nav-link active">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                View Journal
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
                    <h1 class="m-0 text-dark">Journal</h1>
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






<?php
if(isset($_POST['editJournalButton']))
{
    $TranID = $_POST['hiddenData'];
    $sql = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, 
                    journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, 
                    JournalStatus.Reason 
             FROM journalEntry 
             left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID 
                                                    AND JournalStatus.TranID = journalEntry.TranID 
             WHERE journalEntry.TranID = {$TranID} 
             order by CredOrDeb DESC";

    //$sqlScript = "UPDATE JournalStatus SET TranStatus = 'Approved' WHERE TranID = {$TranID}";

    $result=$conn->query($sql);
    if($result){
        $accountCount = 1;
        echo "<form method='post' action='updateJournal.php' >";
        while ($row = $result->fetch_assoc()) {
            echo "
                <div name='Account{$accountCount}'>
                    <label>Account {$accountCount}</label>
                    <select name=\"account{$accountCount}\" id=\"account1\">
                        <option value='{$row['Account']}' selected>{$row['Account']}</option>
            ";
                        $sql2 = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
                        while ($row2 = $sql2->fetch_assoc()) {
                            echo "<option value=\"{$row2['accountnumber']}: {$row2['accountname']}\">" . $row2['accountnumber'] . ": " . $row2['accountname'] . "</option>";
                        }
                        //pattern="^$\d{1,3}(,\d{3})*(\.\d+)?$"
            echo "
                    </select>
                    <input type=\"text\" name=\"amount{$accountCount}\" id=\"currency-field\" value=\"\${$row['amount']}\" data-type=\"currency\">
                    <!--put money script here if it wont work anywhere else-->
                    <script>
        // Jquery Dependency

        $(\"input[data-type='currency']\").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), \"blur\");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, \"\").replace(/\B(?=(\d{3})+(?!\d))/g, \",\")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === \"\") { return; }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop(\"selectionStart\");

            // check for decimal
            if (input_val.indexOf(\".\") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(\".\");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === \"blur\") {
                    right_side += \"00\";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = \"$\" + left_side + \".\" + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = \"$\" + input_val;

                // final formatting
                if (blur === \"blur\") {
                    input_val += \".00\";
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
                    <select name=\"TranType{$accountCount}\">
                        <option value=\"{$row['CredOrDeb']}\" selected>{$row['CredOrDeb']}</option>
                        <option value=\"Debit\">Debit</option>
                        <option value=\"Credit\">Credit</option>
                    </select>
                    <input type='hidden' name='account{$accountCount}ID' value='{$row['ID']}' />
                </div>
            ";
                        $accountCount++;
        }
        echo "
                <input type=\"submit\" name=\"cancelButton\" value=\"Cancel\" /> 
                <input type=\"submit\" name=\"submitButton\" value=\"Submit Changes\" /> 
                <input type='hidden' name='AccountCount' value='{$accountCount}' />
            </form>
        ";
    }
    else echo "Journal Entry not found. Contact Support" . "<pre>{$conn->error}</pre>";
    //header("Refresh:0");
}

?>
        </div>
    </div>
</div>
</body>