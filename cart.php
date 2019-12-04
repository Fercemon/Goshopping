<?php
session_start();
include('db.php');

// Select data from cart table
$query = 'SELECT products.name, products.price, products.img, cart.order_id, cart.product_id, cart.order_quantity
FROM products inner join cart
on (products.id = cart.product_id)';
 $result = $mysqli->query($query);
 // Loop within the table and store its data into $products array
 while($product = $result->fetch_assoc()) {
     $products[] = $product;
 };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Cart</title>
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
    <section class="cartSection">
        <!-- if the array is empty, no data in our sql table, empty message else display items -->
        <?php if(empty($products)){ ?>
            <div class='emptyCartContainer'>
                <h1 class='emptyCart'>Sorry, there is not items in your cart</h1>
                <div class="bShopping emptyCart">
                    <a href="index.php">Back to shopping</a>
                </div>
            </div>
        <?php }else{ ?>
            <table>
                <thead class="tableHeader">
                    <tr>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody class="tableBody">
                    <!-- Loop through $products array and display the code below for each item -->
                    <?php foreach ($products as $product) { ?>
                        <tr class="borderBottom">
                            <td class="productCeld">
                                <img class="tableImg" src="img/<?php echo $product['img']?>" alt="<?php echo $product['name']?>">
                                <h2><?php echo $product['name']?></h2>
                            </td>
                            <td class="price">&dollar;<?php echo $product['price']?></td>
                            <td>
                                <p class="cartQuantity"><?php echo $product['order_quantity']?></p>
                            </td>
                            <td class="price">
                                &dollar;<?php echo $product['price'] ?>
                                <form class="removeForm" action="delete.php" method="post">
                                    <input type="hidden" name="remove" value="<?php echo $product['order_id']?>">
                                    <input class="remove" type="submit" name="submit" value="&times;">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="bShopping">
                <a href="index.php">Back to shopping</a>
            </div>
        <?php } ?>
    </section>
</body>
</html>