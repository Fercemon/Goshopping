<?php
session_start();
// If user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin'])){
  header('Location: index.php');
  exit();
}

include('../db.php');
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
            <a class="dashboard-navBarLink" href="dashboard.php"><i class="fas fa-home"></i></a>
            <a class="dashboard-navBarLink" href="dashboard-orders.php"><i class="fas fa-shopping-basket"></i></a>
            <a class="dashboard-navBarLink active" href="dashboard-products.php"><i class="fas fa-dolly"></i></a>
            <a class="dashboard-navBarLink" href="logOut.php"><i class="fas fa-sign-out-alt"></i></a>
        </nav>

        <nav class="dashboard-overlay">
            <a class="dashboard-overlayLink" href="dashboard.php"><i class="fas fa-home"></i></a>
            <a class="dashboard-overlayLink" href="dashboard-orders.php"><i class="fas fa-shopping-basket"></i></a>
            <a class="dashboard-overlayLink" href="dashboard-newProduct.php"><i class="fas fa-dolly"></i></a>
            <a class="dashboard-overlayLink" href="logOut.php"><i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
    <section class="stockSection">
        <h1>STOCK</h1>
        <span>
        <a class="btn" href="dashboard-newProduct.php">Add new</a>
        </span>
        <?php
            // Create the SQL command
            $query = 'SELECT * FROM products ORDER BY name'; 
            // Execute our SQL command
            $result = $mysqli->query($query);
            while( $product = $result->fetch_assoc() ) { ?>
                <div class="stockProductContainer">
                    <a class="stockProduct" href="dashboard-editProduct.php?id=<?php echo $product['id']?>">
                        <img src="../img/<?php echo $product['img'] ?>" alt="<?php echo $product['name']?>">
                        <h1><?php echo $product['name']?></h1>
                        <p>Price: <?php echo $product['price']?></p>
                    </a>
                </div>
                <div class="editButtonContainer">
                    <a class="btn" href="dashboard-editProduct.php?id=<?php echo $product['id']?>">Edit</a>
                </div>
        <?php } ?>
    </section>
    <script src="../script/script.js"></script>
</body>
</html>