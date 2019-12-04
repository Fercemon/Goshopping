<?php
session_start();
include('db.php');
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoShopping</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="header">
            <nav class="nav-bar">
            <div class="logoContainer">
                <a href="index.php">
                    <i class="fab fa-opencart goCartLogo"></i>
                    <p class="textLogo"><span class="go">Go</span>Shopping</p>
                </a>
            </div>
            <a href="cart.php">
                <div class="cartLink">
                    <i class="fas fa-shopping-cart cartLogo"></i>
                    <?php if(isset($_SESSION['cartItems']) && $_SESSION['cartItems'] > 0) { ?>
                        <span class='count'><?php echo $_SESSION['cartItems'] ?></span>
                    <?php } else { ?>
                        <span></span>
                    <?php } ?>
                </div>
            </a>
            </nav>
            <div class="headerContent">
                <div class="logoContainer2">
                    <i class="fab fa-opencart goCartLogo2"></i>
                    <p class="textLogo"><span class="go">Go</span>Shopping</p>
                </div>
                <p class="quote">The future of shopping</p>
            </div>
        </div>
    </header>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<main>
<?php
    // Create the SQL command
    $query = 'SELECT * FROM products ORDER BY name'; 
    // Execute our SQL command
    $result = $mysqli->query($query);
    while( $product = $result->fetch_assoc() ) { ?>
        <section class="flip-card" id="<?php echo $product['id']?>">
            <a href="product.php?id=<?php echo $product['id']?>">
            <img src="img/<?php echo $product['img'] ?>" alt="<?php echo $product['name']?>" class="image">
            <h1><?php echo $product['name']?></h1>
            <p class="model">Price: <?php echo $product['price']?></p>
            </a>
        </section>
   <?php } ?>
   </main>
    <footer>
        <p>FOLLOW US ON :</p>
        <img class="icon1" src="fb.png" alt="facebook icon"> <img class="icon2" src="instagram-logo.png" alt="instagram icon">
    </footer>
</body>
</html>
