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
    <title>New Product</title>
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
            <a class="dashboard-overlayLink" href="dashboard-products.php"><i class="fas fa-dolly"></i></a>
            <a class="dashboard-overlayLink" href="logOut.php"><i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>
    <!-- Form to upload image in img folder and infor in database-->
    <form class="upLoadForm" action="upLoadForm.php" method="post" enctype="multipart/form-data">
        <img src="../img/Rolex-Watch.png" id="btnFileUpload"/>
        <input type="file" id="FileUpload" name="fileUpload" style="display: none" require/>
        <input type="text" name="name" placeholder="Product name" required/>
        <input type="text" name="description" placeholder="Product description"/>
        <input type="number" name="price" placeholder="Set a price" step="any" min="0" required/>
        <input type="number" name="quantity" placeholder="Quantity on stock" required/>
        <input type="submit" name='save_product' value="Submit"/>
    </form>
    <script src="../script/script.js"></script>
    <script type="text/javascript">
    /* script to get upload file windows  */
        var fileupload = document.getElementById("FileUpload"); 
        var button = document.getElementById("btnFileUpload");

        //To trigger the file input
        button.onclick = function (e) {
            fileupload.click();
        };

        //Call displayImage function with the trigger event 
        //to display the image for preview when the file input change
        fileupload.onchange = function () {
        displayImage(this);
        };

        //Function to display the preview image after select it
        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                button.setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    
    </script>
</body>
</html>