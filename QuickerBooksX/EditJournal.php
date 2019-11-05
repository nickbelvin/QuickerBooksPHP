<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<?php include('config.php')?>
<?php
$sql = 'SELECT `id`, `name`, `TranID`, `amount`, `AccDebited`, `AccCredited`, `path`, `size`, `data`, `created`, status FROM `file2`';
//$result = $conn->query($sql);
$result = $conn->query($sql);

// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if ($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    } else {
        // Print the top of a table
        echo "
            <div class=\"form-element\">
    <label>Credited Account</label>
    <select name=\"owner\">
        <option value=\"\" disabled selected></option>
        ";
        $sql2 = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row2 = $sql2->fetch_assoc()){
            echo "<option value=\": \">" . $row2['accountnumber'] . ": " . $row2['accountname'] . "</option>";
        }
        echo "
            </select>
    <input type=\"text\" name=\"currency-field\" id=\"currency-field\" pattern=\"^\$\d{1,3}(,\d{3})*(\.\d+)?$\" value=\"\" data-type=\"currency\" placeholder=\"$0.00\">
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
    </div>
        ";
        echo "
        
            <div class=\"form-element\">
    <label>Debited Account</label>
    <select name=\"owner\">
        <option value=\"\" disabled selected>Select Account</option>
        ";
        $sql2 = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row2 = $sql2->fetch_assoc()){
            echo "<option value=\": \">" . $row2['accountnumber'] . ": " . $row2['accountname'] . "</option>";
        }
        echo "
            </select>
    <input type=\"text\" name=\"currency-field\" id=\"currency-field\" pattern=\"^\$\d{1,3}(,\d{3})*(\.\d+)?$\" value=\"\" data-type=\"currency\" placeholder=\"$0.00\">
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
    </div>
        ";

    }
}

?>



<div class="form-element">
    <label>Amount</label>
    <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
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

    <!--<input type="number" name="amount" required />-->
</div>
<div class="form-element">
    <label>Credited Account</label>
    <select name="owner">
        <option value="" disabled selected>Select Account</option>
        <?php
        $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row = $sql->fetch_assoc()){
            echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
        }
        ?>
    </select>
    <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
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
<div class="form-element">
    <label>Debited Account</label>
    <select name="owner">
        <option value="" disabled selected>Select Account</option>
        <?php
        $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row = $sql->fetch_assoc()){
            echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
        }
        ?>
    </select>
    <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
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
    <button onclick="addDebit2OnClick()" name="addDebit1" > + </button>
</div>

<div class="div-hidden" id="secondAccount" >
    <label>Debited Account</label>
    <select name="owner">
        <option value="" disabled selected>Select Account</option>
        <?php
        $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row = $sql->fetch_assoc()){
            echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
        }
        ?>
    </select>
    <input type="text" name="debit2amount" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
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
    <button href="" name="addDebit2" >+</button>
    <script>
        $("addDebit2").click(function(){
            $("thirdAccount").hide(1000);
        });
    </script>
</div>
<div class="div-hidden" id="thirdAccount">
    <label>Debited Account</label>
    <select name="owner">
        <option value="" disabled selected>Select Account</option>
        <?php
        $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row = $sql->fetch_assoc()){
            echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
        }
        ?>
    </select>
    <input type="text" name="debit3amount" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
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
    <button href="" name="addDebit3" > + </button>
</div>
<div class="div-hidden" id="fourthAccount">
    <label>Debited Account</label>
    <select name="owner">
        <option value="" disabled selected>Select Account</option>
        <?php
        $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row = $sql->fetch_assoc()){
            echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
        }
        ?>
    </select>
    <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
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
    <button href="" name="addDebit4" > - </button>
</div>
<div>
    <input type="file" name="new_uploaded_file"><br>
    <input type="submit" value="Update Entry" formaction="UploadFile.php">
</div>
</form>
</body>

