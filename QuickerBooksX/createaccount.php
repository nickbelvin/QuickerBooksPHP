<?php include('config.php'); ?>
<style>
<?php include 'main.css'; ?>

</style>

<!DOCTYPE html>
<head>
    <title>Add an Account</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<h2>Create an Account</h2>
    <a href="chartofaccounts.php">Back to Chart of Accounts</a><br /><br />

    <form method="post" action="chartofaccounts.php">
    	<label for="accountname">Account Name :</label>
    	<input type="text" name="accountname" id="accountname" required="required" placeholder="Please enter a name"/><br /><br />
    	<label for="accountnumber">Account Number :</label>
    	<input type="text" name="accountnumber" id="accountnumber" required="required" placeholder="00000000"/><br /><br />
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
    	<label for="aorder">Order :</label>
    	<input type="text" name="aorder" id="aorder" placeholder="00"/><br /><br />
    	<label for="statement">Statement :</label>
    	<input type="text" name="statement" id="statement"/><br /><br />
    	<label for="comment">Term :</label>
    	<input type="text" name="term" id="term"/><br /><br />
    	<label for="comment">Comment :</label>
    	<input type="text" name="comment" id="comment"/><br /><br />
    	
    	<input type="submit" name="submit" value="Submit">
    </form>
    

</body>
</html>


<?php

    if(isset($_POST["submit"])){
        
    	// $conn = mysqli_connect("localhost", "root", "", "quickerbooksdb");
    	$servername = "localhost";
    	$username = "root";
    	$password = "";
    	$dbname = "quickerbooksdb";
    	// Create connection
    	$conn = mysqli_connect($servername, $username, $password, $dbname);
    	
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
		$order= mysqli_real_escape_string($conn, $_POST["aorder"]);
		$statement= mysqli_real_escape_string($conn, $_POST["statement"]);
		$comment= mysqli_real_escape_string($conn, $_POST["comment"]);
		$Term= mysqli_real_escape_string($conn, $_POST["Term"]);


/* 		echo trim($initialbalance,"$");
		echo trim($debit,"$");
		echo trim($credit,"$");
		echo trim($balance,"$"); */
		
		//insert data into mysql
		
		$sql = "INSERT INTO chartofaccounts (accountname, accountnumber, description, normalside, category, subcategory, initialbalance, debit, credit, balance, dateadded, userid, aorder, statement, comment, Term) 
		VALUES ('$accountname', '$accountnumber', '$description', '$normalside', '$category', '$subcategory', '$initialbalance', '$debit', '$credit', '$balance', '$dateadded', '$userid', '$order', '$statement', '$comment', '$Term')";


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

    <?php include "templates/footer.php"; ?>