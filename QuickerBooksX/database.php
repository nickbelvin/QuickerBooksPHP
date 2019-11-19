<?php
session_start(); // start session
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'QuickerBooksDB');


// connect to database
$conn = new mysqli("localhost", "root", "", "QuickerBooksDB");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 $password = password_hash('Password123!', PASSWORD_DEFAULT);
 $created_at =$created_at = date('Y-m-d H:i:s');
 $sql = "INSERT INTO users (role_id, username, fname, lname, email, phone, password, profile_picture, dob, created_at)
 VALUES ('1', 'ddoe1019', 'Dara', 'Doe', 'dara@qb.com', '123455559', '$password', 'NULL', '91-09-18', '$created_at'),
 ('2', 'klee1019', 'Kelly', 'Lee', 'lkee@qb.com', '123345552', '$password', 'NULL', '87-12-18', '$created_at'),
 ('3', 'zlewis1019', 'Zach', 'Lewis', 'zlewis@qb.com', '123415661', '$password', 'NULL', '94-07-13', '$created_at'),
 ('2', 'psmith1019', 'Paula', 'Smith', 'psmith@qb.com', '123455577', '$password', 'NULL', '79-09-01', '$created_at'),
 ('3', 'slopez1019', 'Stella', 'Lopez', 'slopez@qb.com', '123455590', '$password', 'NULL', '81-09-20', '$created_at')";

 if ($conn->query($sql) === TRUE) {
     echo "New records created successfully";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }


