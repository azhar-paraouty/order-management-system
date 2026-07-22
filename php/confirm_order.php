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

echo "Processing Order Submission";

// Check if URL is set with values 
// indicates 'Confirm Order' Button was pressed
// and Order Items were sent to URL
if (isset($_GET['order'])) {

  // Convert JSON String to PHP-understandable format
  $orderJSON = $_GET['order'];
  $order = json_decode($orderJSON, true);

  require "../database/configuration.php";

  // Query to populate 'orders' table
  $sql_insert = "INSERT INTO orders (status)
          VALUES ('pending')";

  mysqli_query($conn, $sql_insert);

  // Query to obtain last added 'o_id' from 'orders' table
  $sql_select = "SELECT o_id FROM orders
                 ORDER BY o_id DESC
                 LIMIT 1";

  $result_select = mysqli_query($conn, $sql_select);
  if (!$result_select) {
    $error_message = "Order ID NOT found.";
  }

  $row = mysqli_fetch_array($result_select);
  $order_id = $row['o_id'];

  // Manipulating each Order Items
  foreach ($order['items'] as $item) {
    $product_id =  $item['productID'];
    $item_quantity = $item['quantity'];
    $item_size = $item['size'];
    $item_addOns = $item['addOns'];
    
    require "../database/configuration.php";

    // Query to populate 'order_items' table
    $sql = "INSERT INTO order_items (o_id, p_id, quantity, size, addons)
            VALUES ('$order_id', '$product_id', '$item_quantity', '$item_size', '$item_addOns')";

    mysqli_query($conn, $sql);
  }

}

// Redirect back
header("Location: ../pages/order_dashboard.php");
exit();

/* 
ORDER ITEMS STRUCTURE

Array
(
  [items] => Array
      (
        [0] => Array
            (
              [productID] => 47
              [name] => Chicken Burger
              [price] => Rs 225.00
              [quantity] => 1
              [size] => Medium
              [addOns] => None
              [removed] => false
            )
      )
)

*/
?>