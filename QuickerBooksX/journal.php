echo"

<form action=\"UploadFile.php\" method=\"post\">
    <div name=\"mainDiv\">
        ";
        $counter = 1;
        $currentNumOfAccounts = 0;
        while ($currentNumOfAccounts < $counter){
        echo "
        <div class=\"form-element\" id=\"credit1\">
            <label>Account {$counter}</label>
            <select name=\"account{$counter}\" id=\"account{$counter}\">
                <option value=\"\" disabled selected>Select Account</option>
                ";

                $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
                while ($row = $sql->fetch_assoc()){
                echo "<option value=\"{$row['accountnumber']}: {$row['accountname']} \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
                }

                echo "
            </select>
            <input type=\"text\" name=\"amount{$counter}\" id=\"currency-field\" pattern=\"^\$\d{1,3}(,\d{3})*(\.\d+)?$\" value=\"\" data-type=\"currency\" placeholder=\"$0.00\">
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
            <select name=\"TranType{$counter}\">
                <option value=\"\" disabled selected>Select Type</option>
                <option value=\"Debit\">Debit</option>
                <option value=\"Credit\">Credit</option>
            </select>
            <input type=\"button\" id=\"addAccount{$counter}\" value='Add Account' onclick='";
            //$numOfAccountsWanted++;
            echo "
            ' class=\"btn btn-primary btn-block\"/>
        </div>
        ";
        $currentNumOfAccounts++;
        }
        echo "
    </div>
</form>
";


?>
<form action="UploadFile.php" id="myForm" name="myForm" method="post" enctype="multipart/form-data">
    <div id="divID" name="divID" class="topDiv">
        <div class="form-element" id="credit1">
            <label>Account 1</label>
            <select name="account1" id="account1">
                <option value="" disabled selected>Select Account</option>
                <?php
                $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value=\"{$row['accountnumber']}: {$row['accountname']} \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
                }
                ?>
            </select>
            <input type="text" name="amount1" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
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
            <select name="TranType1">
                <option value="" disabled selected>Select Type</option>
                <option value="Debit">Debit</option>
                <option value="Credit">Credit</option>
            </select>
        </div>
        <div class="form-element" id="'debit1">
            <label>Account 2</label>
            <select name="account2">
                <option value="" disabled selected>Select Account</option>
                <?php
                $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value=\"{$row['accountnumber']}: {$row['accountname']} \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
                }
                ?>
            </select>
            <input type="text" name="amount2" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
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
            <select name="TranType2">
                <option value="" disabled selected>Select Type</option>
                <option value="Debit">Debit</option>
                <option value="Credit">Credit</option>
            </select>
            <!--<a href="Journalizing.php?addAccount=true">Add Account</a>-->
            <input type="button" id="addAccount" onclick="location.href='Journalizing.php?addAccount=true'" value='Add Account' class="btn btn-primary btn-block"/>
        </div>
    </div>
    <div>
        <input type="file" name="uploaded_file"><br>
        <input type="submit" value="Submit" formaction="UploadFile.php" name="submit[]">
    </div>
</form>
<p>
    <a href="ListFiles.php">See all files</a>
</p>

</body>
</html>

<?php
if (isset($_GET['addAccount'])) {
    addAccount3();
}


function addAccount3()
{
    $html = '
    <div class="form-element" id="\'debit1">
        <label>Account 3</label>
        <select name="account3">
            <option value="" disabled selected>Select Account</option>
            <?php
            $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
            while ($row = $sql->fetch_assoc()){
                echo "<option value=\"{$row[\'accountnumber\']}: {$row[\'accountname\']} \">" . $row[\'accountnumber\'] . ": " . $row[\'accountname\'] . "</option>";
            }
            ?>
        </select>
        <input type="text" name="amount3" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
        <!--jquery for formatting for number field-->
        <script>
            // Jquery Dependency

            $("input[data-type=\'currency\']").on({
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

                // don\'t validate empty input
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
        <select name="TranType3">
            <option value="" disabled selected>Select Type</option>
            <option value="Debit">Debit</option>
            <option value="Credit">Credit</option>
        </select>
        <a href="Journalizing.php?addAccount=true">Add Account</a>
        
    </div>';
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML($html);
//get the element you want to append to
    $descBox = $doc->getElementById('debit1');
//create the element to append to #element1
    $appended = $doc->createElement('div', 'This is a test element.');
//actually append the element
//  $descBox->appendChild($appended);
    echo $doc->saveHTML();
}
?>