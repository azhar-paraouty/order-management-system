<?php
// Start User session
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: ../pages/login.php");
  exit();
}

if ($_SESSION['user_role'] != "desk") {
  header("Location: ../pages/login.php");
  exit();
}

echo "Processing Order Delivery";

// Fetch Order, and convert JSON String to PHP-understandable format
$orderJSON = $_GET['order'];
$order = json_decode($orderJSON, true);

// Extract the actual Order ID from the Order
$orderID = substr((strstr($order, "#")), 1);

require "configuration.php";

// Standard timezone
date_default_timezone_set('Indian/Mauritius');
$currentTimestamp = date('Y-m-d H:i:s');

// Query to Deliver ORDER with given ID
$sql = "UPDATE orders
        SET 
          status = 'delivered',
          updated_at = '$currentTimestamp'
        WHERE o_id = '$orderID'
        AND status = 'ready';"; 
        /* Enforce Business Rules: 
           (i)   A pending Order cannot be delivered.
           (ii)  A cooking Order cannot be delivered.
           (iii) A cancelled Order cannot be delivered. 
           (iv)  A delivered Order cannot be delivered again. 
           (v)   ONLY a READY Order can be delivered. */;

$result = mysqli_query($conn, $sql);
if (!$result) {
  $error_message = "Order could NOT be delivered!.";
} 

// Redirect back
header("Location: ../pages/order_status.php");
exit();

?>