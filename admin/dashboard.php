<?php
session_start();
// If user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin'])){
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <script src="https://kit.fontawesome.com/3cd950c6c8.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
    <header class="dashboard-header">
        <i id="dashboard-menu" class="fas fa-bars dashboard-menu" onclick="handleNavBar()"></i>
        <nav class="dashboard-navBar">
            <a class="dashboard-navBarLink active" href="dashboard.php"><i class="fas fa-home"></i></a>
            <a class="dashboard-navBarLink" href="dashboard-orders.php"><i class="fas fa-shopping-basket"></i></a>
            <a class="dashboard-navBarLink" href="dashboard-products.php"><i class="fas fa-dolly"></i></a>
            <a class="dashboard-navBarLink" href="logOut.php"><i class="fas fa-sign-out-alt"></i></a>
        </nav>

        <nav class="dashboard-overlay">
            <a class="dashboard-overlayLink" href="dashboard.php"><i class="fas fa-home"></i></a>
            <a class="dashboard-overlayLink" href="dashboard-orders.php"><i class="fas fa-shopping-basket"></i></a>
            <a class="dashboard-overlayLink" href="dashboard-products.php"><i class="fas fa-dolly"></i></a>
            <a class="dashboard-overlayLink" href="logOut.php"><i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
    <section class="dashboard-main">
        <h1 class="dashboard-title">Hi <?=$_SESSION['name']?>, check all you cand do in your dashboard</h1>
        <div class="optionsContainer">
            <div class="option-wrapp">
                <i class="fas fa-dolly"></i>
                <p>In your product page you can Edit one or more fields of the products you already have on stock by clicking on the name or the edit button, or you can creat a new item by clicking on add new button</p>
            </div>
            <div class="option-wrapp">
                <i class="fas fa-shopping-basket"></i>
                <p>In the orders page you can see all the products your customers ordered, making the to follow up of your sells really easy</p>
            </div>
        </div>
        <h1 class="dashboard-title">Go and try it yourself!</h1>
    </section>    
        <script src="../script/script.js"></script>
  </body>
</html>