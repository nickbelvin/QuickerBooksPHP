<?php
include('connect-quickerbooksdb.php');
 
$accountnumber=$_REQUEST['accountnumber'];
$query = "SELECT * from chartofaccounts where accountnumber='".$accountnumber."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<style>
    body {margin:0;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
}
</style>
<head>
<meta charset="utf-8">
<title>Update Account</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="createaccount.php">Add an Account</a> 
| <a href="chartofaccounts.php">Chart of Accounts</a></p>
<h1>Update Account</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
		$accountnumber=$_POST['accountnumber'];
		$accountname=$_POST['accountname'];
		$description=$_POST['description'];
		$normalside=$_POST['normalside'];
		$category=$_POST['category'];
		$subcategory=$_POST['subcategory'];
		$initialbalance=$_POST['initialbalance'];
		$debit=$_POST['debit'];
		$credit=$_POST['credit'];
		$balance=$_POST['balance'];
		$dateadded=$_POST['dateadded'];
		$userid=$_POST['userid'];
		$order=$_POST['aorder'];
		$statement=$_POST['statement'];
		$comment=$_POST['comment'];
		$Term=$_POST['Term'];

		
		$update="update chartofaccounts(accountname, accountnumber, description, normalside, 
			category, subcategory, initialbalance, debit, credit, balance, dateadded, userid, aorder, statement, comment, Term)
			VALUES('$accountname', '$accountnumber', '$description', '$normalside', '$category', '$subcategory', '$initialbalance',
			'$debit', '$credit', '$balance', '$dateadded', '$userid', '$order', '$statement', '$comment', $Term'),
			where accountnumber='".$accountnumber."'";
		mysqli_query($conn, $update) or die(mysqli_error());
		$status = "Account Updated Successfully. </br></br>
		<a href='view.php'>View Updated Account</a>";
		echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
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
required value="<?php echo $row['description'];?>" /></p>

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
required value="<?php echo $row['comment'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>