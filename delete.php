<?php
session_start();
include('db.php');

if (isset($_POST['remove']) && is_numeric($_POST['remove'])) {
    // get the id of the product we want to delete
    $remove = (int)$_POST['remove'];
    // Remove product from cart table
    $query = 'DELETE FROM cart WHERE order_id ="'. $remove . '"' ;

    if (mysqli_query($mysqli, $query)) {
        echo "Your item had been removed to cart";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }

    $_SESSION['cartItems'] -= 1;
    
    header('Location: cart.php');
}    
?>