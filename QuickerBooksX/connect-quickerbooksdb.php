<?php

// connect to the database
$conn = mysqli_connect("localhost", "root", "", "QuickerBooksDB");

// show errors (remove this line if on a live site)
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

?>

