<?php include("config.php") ?>
<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Custome styles -->
  <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
<?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
    <h1>Home page</h1>
<a href="Journalizing.php" name="journalizingLink">Journalizing</a><br/><br/>
<a href="chartofaccounts.php" name="ChartOfAccountsLink">Chart of Accounts</a><br/><br/>
<a href="login.php" name="loginLink">Login</a><br/><br/>
<a href="ViewUsers.php" name="viewUsers">View Users Table</a><br/><br/>
<a href="signup.php" name="createUsers">Create User</a><br/><br/>
   