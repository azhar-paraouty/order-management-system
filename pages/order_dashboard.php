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
    <title>Order Dashboard</title>
    <link rel="stylesheet" href="../css/order_dashboard.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
    <div class="layout">
      <aside class="left_panel">
        <h2 id="welcome_staff">Welcome, Desk Staff</h2>
        
        <!-- Completed orders loaded from database -->
        <div id="completed_orders">
          Orders Ready for Delivery
          <?php

          require "../database/configuration.php";

          // Query to fetch Completed Orders (awaiting Delivery)
          $sql = "SELECT * 
                  FROM `orders`
                  WHERE status = 'ready'
                  AND DATE(created_at)=CURDATE()
                  ORDER BY updated_at DESC;"; 
                  // LIMIT to ONLY display recent completed orders (⚠️LATER IMPLEMENTATION)

          $result = mysqli_query($conn, $sql);
          if (!$result) {
            $error_message = "No Order was found.";
          } 

          while ($row = mysqli_fetch_array($result)) {
            // Individual Order data
            $order_id = $row['o_id'];
            $ready_at = date("H:i:s", strtotime($row['updated_at']));
          ?>
            <!-- Populating each Order Item Card -->
             <div class="ready_card">
                <?php echo 'Order #' . $order_id . '<br>'; ?>
                <?php echo 'Ready At: ' . $ready_at; ?>
              </div>
          <?php
          };
          ?>
        </div>

        <div id="view_order">
          <a href="order_status.php" target="_blank">
            <button>View Full Order Status</button>
          </a>
        </div>
        <hr class="horizontal_lines">
      </aside>

      <main class="middle_panel">

        <h1 class="page_title">Order Dashboard</h1>

        <!-- Header -->
        <div class="header">
          <div class="logo">
            Logo
          </div>

          <div class="search">
            <input type="text" name="search_item" placeholder="Search Items">
          </div>

          <div class="filter">
            <button id="filter_button">Filter</button>
          </div>

          <div class="logout">
            <a href="logout.php">Logout</a>
          </div>
        </div>

        <hr class="horizontal_lines">

        <!-- Products loaded from database -->
        <div class="product_grid">
          
          <?php
          // Product image path
          $imagePath = "../images/products/"; 

          // Fetch 'view more' request count
          if (isset($_GET['page'])) {
            $page_count = $_GET['page'];
          } else {
            $page_count = 1;
          }

          // To set Initial Limit to 9 instead. Then +5 each time (⚠️LATER IMPLEMENTATION)

          // Calculate the new limit
          $limit = $page_count * 5;

          require "../database/configuration.php";

          // Query to fetch Products
          $sql = "SELECT * FROM products
                  LIMIT $limit";

          $result = mysqli_query($conn, $sql);
          if (!$result) {
            $error_message = "No product was found.";
          } 

          while ($row = mysqli_fetch_array($result)) {
            // Individual Product data
            $product_id = $row['p_id'];
            $product_name = $row['name'];
            $product_price = $row['price'];
            $product_image = $row['image'];
            $product_category = $row['category']; 
          ?>
            <!-- Populating each Product Card -->
            <div class="product_cards" data-product-id="<?php echo $product_id; ?>">
              <div class="product_name"><?php echo $product_name ?></div>
              <div class="product_img"><img src="<?php echo $imagePath . $product_image ?>"></div>
              <div class="product_price">Rs <?php echo $product_price ?></div>
            </div>
          <?php
          };
          ?>

        </div>

        <?php
          $nextPage = $page_count + 1;
        ?>

        <a href="order_dashboard.php?page=<?php echo $nextPage; ?>">
          <div class="view_more">
            <button>View More Products</button>
          </div>
        </a>

        <hr class="horizontal_lines">

      </main>

      <!-- Currently selected product/s and their details -->
      <aside class="right_panel">
        <div id="selected_product">
          <h3>CURRENTLY SELECTING</h3>
          <div class="product_cards">
            <div class="product_name" id="selected_name"></div>
            <div class="product_img" id="selected_img"><img src="#"></div>
            <div class="product_price" id="selected_price"></div>
          </div>
        </div>

        <div id="edit_product">
          <div id="quantity">
            Quantity
            <button class="qty_controls" id="decrease_btn">-</button>
            <span id="item_qty">0</span>
            <button class="qty_controls" id="increase_btn">+</button>
          </div>

          <!-- Size and Add-Ons in radio button format -->
          <div id="customise">
            Customise
            <div id="item_sizes">
              Size
              <input type="radio" name="item_size" class="item_size" id="small" value="Small">
              <label for="small">Small</label>

              <input type="radio" name="item_size" class="item_size" id="medium" value="Medium">
              <label for="medium">Medium</label>

              <input type="radio" name="item_size" class="item_size" id="large" value="Large">
              <label for="large">Large</label>
            </div>

            <div id="add_ons">
              Add On
              <input type="checkbox" name="add_on" class="add_on" id="cheese" value="Cheese">
              <label for="cheese">Cheese</label>

              <input type="checkbox" name="add_on" class="add_on" id="pine" value="Pine">
              <label for="pine">Pine</label>

              <input type="checkbox" name="add_on" class="add_on" id="fries" value="Fries">
              <label for="fries">Fries</label>
            </div>
          </div>
        </div>

        <div id="add_order">
          <button>Add to Order</button>
        </div>

        <hr class="horizontal_lines">

        <!-- Cart items generated dynamically -->
        <div id="summary">
          <h2>Summary</h2>
          <div id="total_cost">
            Total: Rs 0
          </div>
        </div>

        <button id="confirm_order">Confirm Order</button>

      </aside>
    </div>

    <script type="text/javascript" src="../js/order_dashboard.js"></script>
  </body>
</html>