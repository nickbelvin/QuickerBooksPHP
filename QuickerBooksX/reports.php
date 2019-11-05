<?php include("config.php") ?>
<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
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
  <meta charset="utf-8">
  <title>Reports</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
<?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
<div style="padding:20px;margin-top:30px;height:100px;">
    <h2 align="center">Reports</h2>