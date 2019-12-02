<?php
session_start(); // start session
/*
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'QuickerBooksDB');
*/
//online mysql database info. user:tKROkoSDOO , password: yGpAbKvSmu  ,  host: remotemysql.com  ,  database: tKROkoSDOO

    define('USER', 'tKROkoSDOO');
    define('PASSWORD', 'yGpAbKvSmu');
    define('HOST', 'remotemysql.com');
    define('DATABASE', 'tKROkoSDOO');


// connect to database
//$conn = new mysqli("localhost", "root", "", "QuickerBooksDB");
$conn = new mysqli("remotemysql.com", "tKROkoSDOO", "yGpAbKvSmu", "tKROkoSDOO");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 // define global constants
 define ('ROOT_PATH', realpath(dirname(__FILE__))); // path to the root folder
 define ('INCLUDE_PATH', realpath(dirname(__FILE__) . '/includes' )); // Path to includes folder
 define('BASE_URL', 'http://192.168.64.7//QuickerBooksPHP/QuickerBooksPHP/QuickerBooksX/'); // the home url of the website

 function getMultipleRecords($sql, $types = null, $params = []) {
  global $conn;
  $stmt = $conn->prepare($sql);
  if (!empty($params) && !empty($params)) { // parameters must exist before you call bind_param() method
    $stmt->bind_param($types, ...$params);
  }
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  return $user;
}
function getSingleRecord($sql, $types, $params) {
  global $conn;
  $stmt = $conn->prepare($sql);
  $stmt->bind_param($types, ...$params);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  $stmt->close();
  return $user;
}
function modifyRecord($sql, $types, $params) {
  global $conn;
  $stmt = $conn->prepare($sql);
  $stmt->bind_param($types, ...$params);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
}