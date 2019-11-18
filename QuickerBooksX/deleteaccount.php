<?php
require('connect-quickerbooksdb.php');
$id=$_GET['id'];
$query = "DELETE FROM chartofaccounts WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>