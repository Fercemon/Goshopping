<?php
  //include connection with database
  include('../db.php');
  if (isset($_POST['save_product'])) {
    // for the database
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $imageName = $_FILES["fileUpload"]["name"];
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
      if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {//this upload the image in the img folder

        //To insert the new product in products table
        $query = 'INSERT INTO products (img, `name`, `desc`, price, quantity) VALUES ("'. $imageName .'", "'.$name.'", "'.$description.'", "'.$price.'", "'.$quantity.'")';

        //Redirect to dashboard page if no errors
        header('Location: dashboard.php');

        if(mysqli_query($mysqli, $query)) {
            echo "Your product had been added to stock";
        }else{
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    } else {
        echo "There was an erro uploading the file";
        echo "alert-danger";
      }
    }
      
  }
?>