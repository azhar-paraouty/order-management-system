<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

if ($_SESSION['user_role'] != "desk") {
  header("Location: login.php");
  exit();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Order Status</title>
    <link rel="stylesheet" href="../css/order_status.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
    <div class="layout">
      <aside class="left_panel">
        <h2 id="welcome_staff">Welcome, Desk Staff</h2>
        <hr class="horizontal_lines">
      </aside>

      <main class="middle_panel">
        <h1 class="page_title">Status Dashboard</h1>

        <!-- Header -->
        <div class="header">
          <div class="logo">
            Logo
          </div>

          <div class="search">
            <input type="text" name="search_order" placeholder="Search Orders">
          </div>

          <div class="filter">
            <button id="filter_button">Filter</button>
          </div>

          <div class="logout">
            <a href="logout.php">Logout</a>
          </div>
        </div>

        <hr class="horizontal_lines">

        <!-- Orders and their current states -->
        <section class="orders">
          <?php

          // Fetch 'MORE' Order Cards request count
          if (isset($_GET['order'])) {
            $order_count = $_GET['order'];
          } else {
            $order_count = 1;
          }

          // Calculate the limit
          $limit = $order_count * 3;

          require "../php/configuration.php";

          // Query to fetch Orders
          $sql = "SELECT * 
                  FROM `orders`
                  WHERE DATE(created_at)=CURDATE()
                  ORDER BY created_at ASC
                  LIMIT $limit;"; 

          $result = mysqli_query($conn, $sql);
          if (!$result) {
            $error_message = "No Order was found.";
          } 

          if(mysqli_num_rows($result)==0) {
            echo "<p class='empty_row'>No orders are pending.</p>";
          }
          
          else {
            while ($row = mysqli_fetch_array($result)) {
              // Individual Order data
              $order_id = $row['o_id'];
              $order_status = $row['status'];
              $created_at = date("H:i:s", strtotime($row['created_at']));
              $updated_at = date("H:i:s", strtotime($row['updated_at']));
              ?>
              <div class="order_row">
                <div class="order_card">
                  <!-- Populating the row with Cooking Orders -->
                  <h3><?php echo "Order #" . $order_id ?></h3>
                  <?php

                  // Query to fetch Order Items data
                  $sql_items = "SELECT * 
                                FROM `order_items` AS i
                                JOIN `products` AS p
                                ON i.p_id = p.p_id
                                WHERE i.o_id = '$order_id';"; 

                  $result_items = mysqli_query($conn, $sql_items);
                  if (!$result_items) {
                    $error_message = "No Order Items were found.";
                  }

                  while ($row = mysqli_fetch_array($result_items)) {
                    // Individual Order Item data
                    $item_name = $row['name'];
                    $item_quantity = $row['quantity'];
                    $item_price = $row['price'];
            
                    ?>
                    <div class="order_items">
                      <p><?php echo $item_name . ' x' . $item_quantity . '<br>'; ?></p>
                      <p><?php echo 'Total Price: Rs ' . ($item_price * $item_quantity) . '<br>'; ?></p>
                    </div>
                  <?php
                  }
                  ?>
                  
                  <p class="order_status"><?php echo 'Status: ' . $order_status . '<br>'; ?></p>

                </div>

                <div class="order_options">
                  <button class="deliver_btn">DELIVER</button>
                  <button class="cancel_btn">CANCEL</button>
                </div>

              </div>

              <hr class="horizontal_lines">

            <?php
            };

            $nextOrder = $order_count + 1;
            ?>     

            <a 
              class="more_btn" 
              href="order_status.php?order=<?php echo $nextOrder; ?>"
              >MORE</a>

          <?php 
          } // Close else {..}
          ?>

        </section>
      </main>
    </div>
    <script type="text/javascript" src="../js/order_status.js"></script>
  </body>
</html>