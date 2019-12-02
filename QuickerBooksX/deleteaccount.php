<?php
// connect to the database
include('connect-quickerbooksdb.php');

// check if the 'accountnumber' variable is set in URL, and check that it is valid
if (isset($_GET['accountnumber']) && is_numeric($_GET['accountnumber']))

{
// get accountnumber value
$accountnumber = $_GET['accountnumber'];

// delete the entry
$result = mysqli_query($conn, "DELETE FROM chartofaccounts WHERE accountnumber=$accountnumber") or die(mysqli_error());

// redirect back to the view page
header("Location: chartofaccounts.php");
}else
// if id isn't set, or isn't valid, redirect back to view page
{
header("Location: chartofaccounts.php");
}
?>