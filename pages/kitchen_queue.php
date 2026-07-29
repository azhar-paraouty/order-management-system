<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

if ($_SESSION['user_role'] != "kitchen") {
  header("Location: login.php");
  exit();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Kitchen Queue</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/kitchen_queue.css">
  </head>

  <body>
    <div class="layout">
      <div class="left_panel">
        <h2 id="welcome_staff">Welcome, Kitchen Staff</h2>
        <hr class="horizontal_lines">
      </div>

      <div class="middle_panel">
        <h1 class="page_title">Kitchen Queue</h1>

        <!-- Header -->
        <div class="header">
          <div class="logo">
            Logo
          </div>

          <div class="search">
            <input type="text" name="search_order" placeholder="Search Order">
          </div>

          <div class="filter">
            <button id="filter_button">Filter</button>
          </div>

          <div class="logout">
            <a href="logout.php">Logout</a>
          </div>
        </div>

        <hr class="horizontal_lines">

        <!-- Pending Orders -->
        <section>
          <h2 class="kitchen_states">Pending Orders</h2>
          <div class="order_row">
            <?php

            // Fetch 'MORE' Order Cards request count
            if (isset($_GET['pending_order'])) {
              $order_count = $_GET['pending_order'];
            } else {
              $order_count = 1;
            }

            // Calculate the limit
            $limit = $order_count * 3;

            require "../php/configuration.php";

            // Query to fetch Orders currently in 'pending' state
            $sql = "SELECT * 
                    FROM `orders`
                    WHERE status = 'pending'
                    AND DATE(created_at)=CURDATE()
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

                <div class="order_card">
                  <!-- Populating the row with Cooking Orders -->
                  <h3><?php echo "Order #" . $order_id ?></h3>
                  <p><?php echo "Created: " . $created_at ?></p>
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
                    $item_size = $row['size'];
                    $add_ons = $row['addons']; // Need to unpack the elements from addons
            
                    ?>
                    <div class="order_items">
                      <?php echo $item_name . ' x' . $item_quantity . '<br>'; ?>
                      <?php echo 'Size: ' . substr($item_size, 0, 1) . '| Add Ons: ' . $add_ons . '<br>'; ?>
                    </div>
                  <?php
                  }
                  ?>

                  <button class="cook_btn">COOK</button>
                </div>

              <?php
              };

              $nextOrder = $order_count + 1;
              ?>     

              <a 
                class="more_btn" 
                href="kitchen_queue.php?pending_order=<?php echo $nextOrder; ?>"
                >MORE</a>

            <?php 
            } // Close else {..}
            ?>

          </div>
        </section>

        <hr class="horizontal_lines">

        <!-- Cooking Orders -->
        <section>
          <h2 class="kitchen_states">Cooking</h2>
          <div class="order_row">
            <?php

            // Fetch 'MORE' Order Cards request count
            if (isset($_GET['cooking_order'])) {
              $order_count = $_GET['cooking_order'];
            } else {
              $order_count = 1;
            }

            // Calculate the limit
            $limit = $order_count * 3;

            require "../php/configuration.php";

            // Query to fetch Orders currently in 'cooking' state
            $sql = "SELECT * 
                    FROM `orders`
                    WHERE status = 'cooking'
                    AND DATE(created_at)=CURDATE()
                    ORDER BY created_at ASC
                    LIMIT $limit;"; 

            $result = mysqli_query($conn, $sql);
            if (!$result) {
              $error_message = "No Order was found.";
            } 

            if(mysqli_num_rows($result)==0) {
              echo "<p class='empty_row'>No orders are being cooked.</p>";
            }

            else {
              while ($row = mysqli_fetch_array($result)) {
                // Individual Order data
                $order_id = $row['o_id'];
                $order_status = $row['status'];
                $created_at = date("H:i:s", strtotime($row['created_at']));
                $updated_at = date("H:i:s", strtotime($row['updated_at']));
                ?>

                <div class="order_card">
                  <!-- Populating the row with Cooking Orders -->
                  <h3><?php echo "Order #" . $order_id ?></h3>
                  <p><?php echo "Started Cooking: " . $updated_at ?></p>
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
                    $item_size = $row['size'];
                    $add_ons = $row['addons']; // Need to unpack the elements from addons
            
                    ?>
                    <div class="order_items">
                      <?php echo $item_name . ' x' . $item_quantity . '<br>'; ?>
                      <?php echo 'Size: ' . substr($item_size, 0, 1) . '| Add Ons: ' . $add_ons . '<br>'; ?>
                    </div>
                  <?php
                  }
                  ?>

                  <button class="ready_btn">READY</button>
                </div>
              <?php
              };

              $nextOrder = $order_count + 1;
              ?>     

              <a 
                class="more_btn" 
                href="kitchen_queue.php?cooking_order=<?php echo $nextOrder; ?>"
                >MORE</a>

            <?php 
            } // Close else {..}
            ?>
           
          </div>
        </section>

        <hr class="horizontal_lines">

        <!-- Ready Orders -->
        <section>
          <h2 class="kitchen_states">Ready</h2>
          <div class="order_row">
            <?php

            // Fetch 'MORE' Order Cards request count
            if (isset($_GET['ready_order'])) {
              $order_count = $_GET['ready_order'];
            } else {
              $order_count = 1;
            }

            // Calculate the limit
            $limit = $order_count * 3;

            require "../php/configuration.php";

            // Query to fetch Orders currently in 'ready' state
            $sql = "SELECT * 
                    FROM `orders`
                    WHERE status = 'ready'
                    AND DATE(created_at)=CURDATE()
                    ORDER BY created_at ASC
                    LIMIT $limit;"; 

            $result = mysqli_query($conn, $sql);
            if (!$result) {
              $error_message = "No Order was found.";
            } 

            if(mysqli_num_rows($result)==0) {
              echo "<p class='empty_row'>No orders are ready.</p>";
            }

            else {
              while ($row = mysqli_fetch_array($result)) {
                // Individual Order data
                $order_id = $row['o_id'];
                $order_status = $row['status'];
                $created_at = date("H:i:s", strtotime($row['created_at']));
                $updated_at = date("H:i:s", strtotime($row['updated_at']));
                ?>

                <div class="order_card">
                  <!-- Populating the row with Ready Orders -->
                  <h3><?php echo "Order #" . $order_id ?></h3>
                  <p><?php echo "Ready: " . $updated_at ?></p>
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
                    $item_size = $row['size'];
                    $add_ons = $row['addons']; // Need to unpack the elements from addons
            
                    ?>
                    <div class="order_items">
                      <?php echo $item_name . ' x' . $item_quantity . '<br>'; ?>        
                    </div>
                  <?php
                  }
                  ?>
                
                  <button class="clear_btn">CLEAR</button>
                </div>
                
              <?php
              };

              $nextOrder = $order_count + 1;
              ?>     

              <a 
                class="more_btn" 
                href="kitchen_queue.php?ready_order=<?php echo $nextOrder; ?>"
                >MORE</a>

            <?php 
            } // Close else {..}
            ?>

          </div>
        </section>
        
        <hr class="horizontal_lines">

      </div>
    </div>
    <script type="text/javascript" src="../js/kitchen_queue.js"></script>
  </body>
</html>