<?php    
  // first, set general PHP error reporting and mysqli error reporting
  // in order to be sure we will see every error in the script
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  // Connect to our MySQL server
  $host = "localhost";
  $user_id = "fcere046_fcmon";
  $password = "02218540Ab";
  $database = "fcere046_assignment2";
  $mysqli = new mysqli(
    $host, $user_id, $password, $database
  );

  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }
  ?>