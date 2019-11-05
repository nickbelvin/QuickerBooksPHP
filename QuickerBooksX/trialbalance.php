<?php include "Templates/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
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
<ul>
<li><a href="trialbalance.php" name="trialbalanceLink">Trial Balance</a></li>
<li><a href="incomestatement.php" name="incomestatementLink">Income Statement</a></li>
<li><a href="balancesheet.php" name="balancesheetLink">Balance Sheet</a></li>
<li><a href="retainedearnings.php" name="retainedearningsLink">Retained Earnings</a></li>
<li><a href="index.php" name="home">Return Home</a></li>

</ul>
<table>
<title>Trial Balance</title>
<div style="padding:20px;margin-top:30px;height:100px;">

    <h1 align="center">Trial Balance</h1>
    <?php
    echo "<p align=center>As of " . date("Y/m/d") . "<br></p>";
    ?>


    <style>
</table>        
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

<table align="center" frame="box">

<tr>
<th>Account ID</a></th>
<th>Account Name</a></th>
<th>Debit</th>
<th>Credit</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT accountnumber,accountname, debit, credit from chartofaccounts";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["accountnumber"]. "</td><td>" . $row["accountname"]. "</td><td>" . $row["debit"] . "</td><td>" .
$row["credit"]. "</td><td>";
}
//echo "</table>";
} else { echo "0 results"; }
$conn->close();



?>
</table>


</body>
</html>
<?php include "Templates/footer.php"; ?>