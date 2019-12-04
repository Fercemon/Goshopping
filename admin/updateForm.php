
<?php
session_start();
/* This file is almost the same than upLoadForm file
The only difference is that here we UPDATE the table insted of insert
I keep the comments to avoid changing from file to file in case don't understand something */

  //include connection with database
  include('../db.php');
  if (isset($_POST['save_product'])) {
    // for the database
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $imageName = $_FILES["fileUpload"]["name"];
    $productImage = $_POST['img'];

    // For image upload
    $target_dir = "../img/";
    $target_file = $target_dir . basename($imageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['fileUpload']['size'] > 200000) {
      echo "Image size should not be greated than 200Kb";
      echo "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      echo "File already exists";
      echo "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)){
        //To insert the new product in products table
    $query = 'UPDATE products SET `img`="'.$imageName.'", `name` ="'.$name.'", `desc`="'.$description.'", `price`="'.$price.'", `quantity`="'.$quantity.'" WHERE `id` ="'.$_SESSION['id'].'"';

    //Redirect to dashboard page if no errors
     header('Location: dashboard.php'); 

    if(mysqli_query($mysqli, $query)) {
        echo "Your product had been added to stock";
    }else{
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
      }else{
            //To insert the new product in products table
    $query = 'UPDATE products SET `img`="'.$productImage.'", `name` ="'.$name.'", `desc`="'.$description.'", `price`="'.$price.'", `quantity`="'.$quantity.'" WHERE `id` ="'.$_SESSION['id'].'"';

    //Redirect to dashboard page if no errors
     header('Location: dashboard.php'); 

    if(mysqli_query($mysqli, $query)) {
        echo "Your product had been added to stock";
    }else{
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
      }
    }
  }
?>