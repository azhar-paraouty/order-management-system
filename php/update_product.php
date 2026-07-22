<?php
// Start User session
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: ../pages/login.php");
  exit();
}

if ($_SESSION['user_role'] != "admin") {
  header("Location: ../pages/login.php");
  exit();
}

echo "Processing Product Update";

// Fetch Data of the Product to UPDATE
$productID = $_GET['update_product_id'];

$productName = $_GET['product_name'];
$productPrice = $_GET['product_price'];
$productImage = $_GET['product_image'];
$productCategory = $_GET['product_category'];

require "../database/configuration.php";

// Query to fetch product with given ID
$sql = "UPDATE products
        SET 
          name = '$productName',
          price = '$productPrice',
          image = '$productImage',
          category = '$productCategory'
        WHERE p_id = '$productID'";

$result = mysqli_query($conn, $sql);
if (!$result) {
  $error_message = "Product could NOT be updated!.";
} 

// Redirect back
header("Location: ../pages/admin.php");
?>