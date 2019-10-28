<?php include "Templates/header.php"; ?>

<!DOCTYPE html>
<html>
<head>

<title>Chart of Accounts</title>
    <h1>Chart of Accounts</h1>

    <style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>



</head>
<body>

<form action="SearchCOA.php" method="GET">
<input type="text" name="query" />
<input type="submit" value="Search"
</form>

<ul>
    <a href="createaccount.php"><strong>Create an Account</strong></a>
</ul>
<table>

<tr>
<th>Account Number</a></th>
<th>Account Name</a></th>
<th>Description</th>
<th>Category</th>
<th>Sub-Category</th>
<th>Comment</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT accountnumber, accountname, description, category, subcategory, comment from chartofaccounts";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["accountnumber"]. "</td><td>" . $row["accountname"] . "</td><td>" . 
$row["description"]. "</td><td>" . $row["category"] .  "</td><td>" . $row["subcategory"] . "</td><td>" . $row["comment"] ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();



?>
</table>

<ul>
    <a href="index.php"><strong>Return Home</strong></a>
</ul>
</body>
</html>
<?php include "Templates/footer.php"; ?>