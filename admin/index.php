<?php
session_start();
if ($_SESSION['loggedin']) {
  // if already logged in and you get to this page, then do automatic logout
  header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>LOGIN</h1>
    <?php
      $message = $_SESSION['error'];
      if ($message) {
        echo "<p>$message</p>";
      }
    ?>
    <form action="authenticate.php" method="POST">
        <input type="text" name="username"  placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>