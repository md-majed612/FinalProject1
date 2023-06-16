<?php

  // Set connection variables
  $server = "localhost";
  $username = "root";
  $Password = "";
  $dbName = "ssms1";
  
  // Create a database connection
  $con = mysqli_connect($server, $username, $Password,$dbName);

  // Check for connection success
  if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  }

?>