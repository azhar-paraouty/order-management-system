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

echo "Processing Order: Cooking -> Ready state (READY Button clicked)";

// Fetch Order, and convert JSON String to PHP-understandable format
$orderJSON = $_GET['order'];
$order = json_decode($orderJSON, true);

// Extract the actual Order ID from the Order
$orderID = substr((strstr($order, "#")), 1);

require "../database/configuration.php";

// Standard timezone
date_default_timezone_set('Indian/Mauritius');
$currentTimestamp = date('Y-m-d H:i:s');

// Query to Update ORDER with given ID
$sql = "UPDATE orders
        SET 
          status = 'ready',
          updated_at = '$currentTimestamp'
        WHERE o_id = '$orderID'";

$result = mysqli_query($conn, $sql);
if (!$result) {
  $error_message = "Order could NOT be updated!.";
} 

// Redirect back
header("Location: ../pages/kitchen_queue.php");
exit();

?>