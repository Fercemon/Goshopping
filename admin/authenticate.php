<?php
session_start();
include( '../db.php' );

// check if login data was submitted
if ( !isset( $_POST['username'], $_POST['password'] ) ) {
  die( 'Please fill both the username and password field!' );
}

// Prepare and execute our SQL
//Use prepare() to help prevent SQL injection security threat
$query = 'SELECT id, password FROM cms_users WHERE username = ?';
if ($stmt = $mysqli->prepare( $query ) ) {
  // Bind parameters (s=string, i=int, etc)
  // to use to replace the "?" in the query
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  $stmt->store_result();

  // Now check the credentials. If found the user, then check the password
  if ( $stmt->num_rows > 0 ) 
  {
    $stmt->bind_result($id, $password);
	  $stmt->fetch();

    if ( md5($_POST['password']) === $password )  {
      // authentication success!
      // wih new authenticated user, regenerate session id 
      // to prevent certain kinds of security threats
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['id'] = $id;
      header('Location: dashboard.php');
    }
    else {
      $_SESSION['error'] = "Incorrect password";
      header('Location: index.php');
    }
  }  
  else {
    $_SESSION['error'] = "Incorrect username";
    header('Location: index.php');
  }
  // free the space created by get_result
  $stmt->free_result();
  // close a prepared query
  $stmt->close();
}
else {
  die ('Database failure');
}
?>
