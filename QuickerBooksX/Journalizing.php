<!--

TODO:
    Create Journalizing UI
    allow multiple debits  ----show and hide div elements
    ensure credits and debits are balanced
    ensure the same account isn't used twice
    send requests to Manager
    Edit existing journal entries, to save and view
    delete journal entries

-->
<?php
    include('config.php');
    //include('Journalize.js');
    //session_start();

?>

<?php
/*
if (isset($_POST['login'])) {

    $amount = $_POST(amount); //Amount for transaction
    $AccDebited = $_POST(AccDebited); //Debited Account
    $AccCredited = $_POST(AccCredited); //Credited Account
    $DocPath = $_POST(DocPath); //Attached document file path
}
*/
?>
<?php
/*
 * create new divs instead of trying to clone and append
 *
 * database handling multiple debits or credits by comma seperating in an acounts column instead of using many different entries
 *
 */
?>

<!DOCTYPE html>
<head>
    <title>MySQL file upload example</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--css for formatting journal entry form-->
<!--
    <style>
        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }


        body {
            background: #f5f5f5;
            color: #333;
            font-family: arial, helvetica, sans-serif;
            font-size: 32px;
        }

        h1 {
            font-size: 32px;
            text-align: center;
        }

        p {
            font-size: 20px;
            line-height: 1.5;
            margin: 40px auto 0;
            max-width: 640px;
        }

        pre {
            background: #eee;
            border: 1px solid #ccc;
            font-size: 16px;
            padding: 20px;
        }

        form {
            margin: 40px auto 0;
        }

        label {
            display: block;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input {
            border: 2px solid #333;
            border-radius: 5px;
            color: #333;
            font-size: 32px;
            margin: 0 0 20px;
            padding: .5rem 1rem;
            width: 25%;

        }
        select {
            border: 2px solid #333;
            border-radius: 5px;
            color: #333;
            font-size: 32px;
            margin: 0 0 20px;
            padding: .5rem 1rem;
            width: 25%;

        }

        button {
            background: #fff;
            border: 2px solid #333;
            border-radius: 5px;
            color: #333;
            font-size: 16px;
            font-weight: bold;
            padding: 1rem;
        }

        button:hover {
            background: #333;
            border: 2px solid #333;
            color: #fff;
        }

        .main {
            background: #fff;
            border: 5px solid #ccc;
            border-radius: 10px;
            margin: 40px auto;
            padding: 40px;
            width: 80%;
            max-width: 700px;
        }
        /*
        div.div-hidden{
            display: none;
        }
         */
    </style>
-->

</head>
<body>
<form action="UploadFile.php" id="myForm" name="myForm" method="post" enctype="multipart/form-data">
    <div id="divID" name="divID">
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
        <button type="button" id="addAccount" class="btn btn-primary btn-block">Add Account</button>

        <script>
        //script to add new accounts for journalEntry : not working
            function addAccount() {
                //var thing = $('#debitedOne').clone();
                //$('.thing').append(DivID);
                //1NxtNY-kk1MplpWL
                //tanner jones
                document.write("");

            }

        </script>
        <script>
            addNewTransaction(event) {
                var isDebit = (event.target.value === "true");

                var newTransaction = {
                    key: this.keygen(),
                    accountID: "",
                    amount: "0"
                };

                if (isDebit) {
                    //is debit; have to insert after the last debit
                    newTransaction.is_debit = true;

                    let spliceLocation;
                    for (let i = 0; i < this.state.transactions.length; i++) {
                        if (this.state.transactions[i].is_debit === false) {
                            spliceLocation = i;
                            break;
                        }
                    }

                    this.state.transactions.splice(spliceLocation, 0, newTransaction);
                } else {
                    //is credit; can just push to the end of the list
                    newTransaction.is_debit = false;
                    this.state.transactions.push(newTransaction);
                }

                this.setState({
                    transactions: this.state.transactions
                });
            }
        </script>

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





<?php include('Templates/footer.php'); ?>
<!--
<head>
    <link rel="stylesheet" href="journalizing.css">
</head>
<form method="post" action="UploadFile.php" name="JournalEntry-form" enctype="multipart/form-data">
    <div class="form-element">
        <label>Amount</label>
        <input type="number" name="amount" required />
    </div>
    <div class="form-element">
        <label>Debited Account</label>
        <input type="text" name="AccDebited" required />
    </div>
    <div class="form-element">
        <label>Credited Account</label>
        <input type="text" name="AccCredited" required />
    </div>
    <div>
    <label for='uploaded_file'>Select A File To Upload:</label>

    <input type="file" name="file">
    </div>
    <button type="submit" name="submit" value="submit">Submit</button>
</form>
-->
<!--
<form action="#file" method='post' enctype="multipart/form-data">
    Description of File: <input type="text" name="description_entered"/><br><br>
    <input type="file" name="file"/><br><br>

    <input type="submit" name="submit" value="Upload"/>

</form>
-->