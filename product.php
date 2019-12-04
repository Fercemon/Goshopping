<?php
session_start();
include('db.php');

// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $_SESSION['id'] = $product_id;
    $product_name = $_POST['product_name'];
    $quantity = (int)$_POST['quantity'];
    // Insert product info into cart table
    $query = 'INSERT INTO cart (product_id, order_quantity) VALUES ("'. $product_id .'", "'.$quantity.'")';

    // to load in this page
    header('Location: product.php?id=' . $product_id);
    
    if (mysqli_query($mysqli, $query)) {
        echo "Your item had been added to cart";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }

    // we select the addition of all the quantitys from cart table
    $query= 'SELECT SUM(order_quantity) AS sum_items FROM cart';

    $items = $mysqli->query($query);

    while($cartItems = $items->fetch_assoc()) {
        $itemsNumber = $cartItems['sum_items'];
        // to store the number of items in a session so we can acces to it from every page
        $_SESSION['cartItems'] = $itemsNumber;
    }
}
        $productId = $_REQUEST['id'];
        // Select data from products table
        $query = 'SELECT * FROM products WHERE id ="' . $productId . '"';
        $result = $mysqli->query($query);
        $product = $result->fetch_assoc();
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="css/stylesheet.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <title>Product</title>
 </head>
 <body>
    <header>
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
    </header>
    <main>
        <div class="productContainer">
            <img src="img/<?php echo $product['img']?>" alt="<?php echo $product['name']?>">
            <div class="productDetails">
                <h1 class="name"><?php echo $product['name']?></h1>
                <div class="price">
                    &dollar;<?php echo $product['price']?>
                </div>
                <form action="product.php?id=" . <?php $product['id']?> method="post">
                    <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['quantity']?>" placeholder="Quantity" required>
                    <input type="hidden" name="product_id" value="<?php echo $product['id']?>">
                    <input type="hidden" name="product_name" value="<?php echo $product['name']?>">
                    <input type="submit" value="Add To Cart">
                </form>
                <div class="description">
                    <?php echo $product['desc']?>
                </div>
                <div class="bShopping">
                    <a href="index.php">Back to shopping</a>
                </div>
            </div>
        </div>
        </main>
</body>
</html>