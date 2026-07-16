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

echo "Processing Product Deletion";

// Fetch Product ID
$productID = $_GET['delete_product_id'];

require "../database/configuration.php";

// Query to DELETE product with given ID
$sql = "DELETE FROM products
        WHERE p_id = $productID";

$result = mysqli_query($conn, $sql);
if (!$result) {
  $error_message = "This Product does NOT exist!.";
} 

// Redirect back
header("Location: ../pages/admin.php");
?>