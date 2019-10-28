<?php include "Templates/header.php"; ?><h2>Create an Account</h2>

    <form method="post">
    	<label for="accountname">Account Name</label>
    	<input type="text" name="accountname" id="accountname">
    	<label for="accountnumber">Account Number</label>
    	<input type="text" name="accountnumber" id="accountnumber">
    	<label for="description">Description</label>
    	<input type="text" name="description" id="description">
    	<label for="normalside">Normal Side</label>
    	<input type="text" name="normalside" id="normalside">
    	<label for="category">Category</label>
    	<input type="text" name="category" id="category">
    	<label for="subcategory">Sub-Category</label>
    	<input type="text" name="subcategory" id="subcategory">
    	<label for="initialbalance">Initial Balance</label>
    	<input type="text" name="initialbalance" id="initialbalance">
    	<label for="debit">Debit</label>
    	<input type="text" name="debit" id="debit">
    	<label for="credit">Credit</label>
    	<input type="text" name="credit" id="credit">
    	<label for="balance">Balance</label>
    	<input type="text" name="balance" id="balance">
    	<label for="dateadded">Date Added</label>
    	<input type="text" name="dateadded" id="dateadded">
    	<label for="userid">Added By</label>
    	<input type="text" name="userid" id="userid">
    	<label for="order">Order</label>
    	<input type="text" name="order" id="order">
    	<label for="statement">Statement</label>
    	<input type="text" name="statement" id="statement">
    	<label for="comment">Comment</label>
    	<input type="text" name="comment" id="comment">
    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="chartofaccounts.php">Back to Chart of Accounts</a>

    <?php include "Templates/footer.php"; ?>