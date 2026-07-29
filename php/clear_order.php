<?php
// Start User session
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: ../pages/login.php");
  exit();
}

if ($_SESSION['user_role'] != "kitchen") {
  header("Location: ../pages/login.php");
  exit();
}

echo "Processing Order Clearance: Check state (CLEAR Button clicked)";

// Fetch Order, and convert JSON String to PHP-understandable format
$orderJSON = $_GET['order'];
$order = json_decode($orderJSON, true);

// Extract the actual Order ID from the Order
$orderID = substr((strstr($order, "#")), 1);

require "configuration.php";

// Query to Check if ORDER with given ID has already been delivered/cancelled
$sql = "SELECT status
        FROM orders
        WHERE o_id = '$orderID'
        AND (
          NOT status = 'delivered' OR NOT status = 'cancelled'
        )";

$result = mysqli_query($conn, $sql);
if (!$result) {
  $error_message = "Order NOT found!.";
} 

// Need to improve the Business Rule about CLAERING an Order (⚠️LATER IMPLEMENTATION)
while ($row = mysqli_fetch_array($result)) {
  echo "Order is still active. Cannot be cleared";

  // Redirect back
  header("Location: ../pages/kitchen_queue.php");
  exit();
}

?>