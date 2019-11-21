<?php include('Journalizing.php') ?>
<?php

    if(isset($_POST['numOfAccountsSelect'])) {
        $counter = $_POST['numOfAccountsSelect'];
    }
    echo"

<form action=\"UploadFile.php\" method=\"post\" name='myForm' enctype=\"multipart/form-data\">
    <input type='hidden' name='counterHolder' value='{$counter}' />
    <div name=\"mainDiv\">
        ";

    $currentNumOfAccounts = 1;
    while ($currentNumOfAccounts < ($counter+1)){
        echo "
            <div class=\"form-element\" id=\"credit1\">
            <label>Account {$currentNumOfAccounts}</label>
            <select name=\"account{$currentNumOfAccounts}\" id=\"account{$currentNumOfAccounts}\">
                <option value=\"\" disabled selected>Select Account</option>
            ";

        $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row = $sql->fetch_assoc()){
            echo "<option value=\"{$row['accountnumber']}: {$row['accountname']} \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
        }
                        //pattern="^$\d{1,3}(,\d{3})*(\.\d+)?$"
        echo "
        </select>
        <input type=\"text\" name=\"amount{$currentNumOfAccounts}\" id=\"currency-field\" value=\"\" data-type=\"currency\" placeholder=\"$0.00\">
        <!--jquery for formatting for number field-->
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
        <select name=\"TranType{$currentNumOfAccounts}\">
            <option value=\"\" disabled selected>Select Type</option>
            <option value=\"Debit\">Debit</option>
            <option value=\"Credit\">Credit</option>
        </select>
        <input type=\"button\" id=\"addAccount{$currentNumOfAccounts}\" value='Add Account' onclick='' class=\"btn btn-primary btn-block\"/>
    </div>
        ";
        $currentNumOfAccounts++;
    }
    echo "
    <input type=\"file\" name=\"uploaded_file\"><br>
    <input type=\"submit\" value=\"Submit\" formaction=\"UploadFile.php\" name=\"submit[]\">
    </div>
</form>
";

?>

<script>
    submitForms = function(){
        document.forms["addAccount1"].submit();
        document.forms["addAccount2"].submit();
        document.forms["addAccount3"].submit();
        document.forms["addAccount4"].submit();
        document.forms["addAccount5"].submit();
        document.forms["addAccount6"].submit();
        document.forms["addAccount7"].submit();
        document.forms["addAccount8"].submit();
        document.forms["addAccount9"].submit();
        document.forms["addAccount10"].submit();
        document.forms["addAccount11"].submit();
        document.forms["addAccount12"].submit();
        document.forms["addAccount13"].submit();
        document.forms["addAccount14"].submit();
        document.forms["addAccount15"].submit();
    }
</script>
