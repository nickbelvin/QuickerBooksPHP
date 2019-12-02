<?php include "Templates/header.php"; ?>

<!DOCTYPE html>
<html>
<head>

<title>Accounts</title>
    <h1>Accounts</h1>

    <style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 18px;
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

<p><a href="index.php">Home</a> 
| <a href="createaccount.php">Create an Account</a> 
| <a href="chartofaccounts.php">Chart of Accounts</a> 
| <a href="logout.php">Logout</a></p>

<form action="SearchCOA.php" method="GET">
<input type="text" name="query" />
<input type="submit" value="Search"
</form>

<ul>
    <a href="createaccount.php"><strong>Create an Account</strong></a>
</ul>
<table id="table">

<tr>
	<th onclick="sortTable(0)">Account Number</th>
	<th onclick="sortTable(1)">Account Name</th>
	<th>Category</th>
	<th>Term</th>
	<th>Balance</th>
	<th>Created By</th>
	<th>Date Created</th>
	<th>Comments</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("table");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>


<?php

//$conn = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
$conn = mysqli_connect("remotemysql.com", "tKROkoSDOO", "yGpAbKvSmu", "tKROkoSDOO");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT accountnumber, accountname, category, term, balance, userid, dateadded, comment from chartofaccounts";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
/* while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["accountnumber"]. "</td><td>" . $row["accountname"] . "</td><td>" . 
$row["description"]. "</td><td>" . $row["category"] .  "</td><td>" . $row["subcategory"] . "</td><td>" . $row["comment"] . "</td></tr>";
 */
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="left"><?php echo $row["accountnumber"]; ?></td>
<td align="left"><?php echo $row["accountname"]; ?></td>
<td align="left"><?php echo $row["category"]; ?></td>
<td align="left"><?php echo $row["term"]; ?></td>
<td align="left"><?php echo $row["balance"]; ?></td>
<td align="left"><?php echo $row["userid"]; ?></td>
<td align="left"><?php echo $row["dateadded"]; ?></td>
<td align="left"><?php echo $row["comment"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php
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
