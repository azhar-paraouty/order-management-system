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

echo "Processing Order Cancellation";

// Fetch Order, and convert JSON String to PHP-understandable format
$orderJSON = $_GET['order'];
$order = json_decode($orderJSON, true);

// Extract the actual Order ID from the Order
$orderID = substr((strstr($order, "#")), 1);

require "configuration.php";

// Standard timezone
date_default_timezone_set('Indian/Mauritius');
$currentTimestamp = date('Y-m-d H:i:s');

// Query to Cancel ORDER with given ID
$sql = "UPDATE orders
        SET 
          status = 'cancelled',
          updated_at = '$currentTimestamp'
        WHERE o_id = '$orderID'
        AND (
          status = 'pending' OR status = 'cooking' OR status = 'ready'
        )"; 
        /* Enforce Business Rules: 
           (i)  A delivered Order cannot be cancelled. 
           (ii) A cancelled Order cannot be cancelled again. 
           (iii) Either a PENDING, COOKING, OR READY Order can be cancelled.*/

$result = mysqli_query($conn, $sql);
if (!$result) {
  $error_message = "Order could NOT be cancelled!.";
} 

// Redirect back
header("Location: ../pages/order_status.php");
exit();

?>