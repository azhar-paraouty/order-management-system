<?php
// Start User session
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

if ($_SESSION['user_role'] != "admin") {
  header("Location: login.php");
  exit();
}

echo "Processing Product Creation";

require "../database/configuration.php";

// Fetch NEW Product Data
$product_name = $_GET['product_name'];
$product_price = $_GET['product_price'];
$product_category = $_GET['product_category'];

if (!empty($_GET['product_image'])) {
  $product_image = $_GET['product_image'];
}

else {
  $product_image = "product_placeholder.jpg"; 
}
// Query to ADD New Product image path
$sql = "INSERT INTO products (name, price, image, category)
        VALUES ('$product_name', '$product_price', '$product_image', '$product_category')";

$result = mysqli_query($conn, $sql);
if (!$result) {
  $error_message = "This Product does NOT exist!.";
} 

// Redirect back
header("Location: ../pages/admin.php");
?>