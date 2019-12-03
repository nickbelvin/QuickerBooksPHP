<?php
	require_once 'connect-quickerbooksdb.php';
	
	if(ISSET($_POST['save'])){
		$accountnumber = $_POST['accountnumber'];
		$accountname = $_POST['accountname'];
		$description = $_POST['description'];
		$normalside = $_POST['normalside'];
		$category = $_POST['category'];
		$subcategory = $_POST['subcategory'];
		$debit = $_POST['debit'];
		$credit = $_POST['credit'];
		$comment = $_POST['comment'];

		mysqli_query($conn, "INSERT INTO chartofaccounts2(accountnumber, accountname, description, normalside, category, subcategory, debit, credit, comment) 
		 VALUES('$accountnumber', '$accountname', '$description', '$normalside', '$category', '$subcategory', '$debit', '$credit' '$comment')") or die(mysqli_error());

		header("location: chartofaccounts.php");
	}
?>