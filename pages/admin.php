<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

if ($_SESSION['user_role'] != "admin") {
  header("Location: login.php");
  exit();
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Page</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <div class="layout">
    <aside class="left_panel">
      <h2 id="welcome_staff">Welcome, Admin</h2>
      <hr class="horizontal_lines">
    </aside>

    <main class="middle_panel">
      <h1 class="page_title">Product Management</h1>

      <!-- Header -->
      <div class="header">
        <div class="logo">
          Logo
        </div>

        <div class="search">
          <input type="text" name="search_product" placeholder="Search Products">
        </div>

        <div class="filter">
          <button id="filter_button">Filter</button>
        </div>

        <div class="logout">
          <a href="logout.php">Logout</a>
        </div>
      </div>

      <hr class="horizontal_lines">

      <!-- Product Data -->
      <section class="products_table">
        <!-- Headers for the table -->
        <table class="products" border="1">
          <tr>
            <th>Product ID</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Name</th>
            <th colspan="2">Manage</th>
          </tr>

          <?php
          // Product image path
          $imagePath = "../images/products/";

          // Fetch 'view more' request count
          if (isset($_GET['page'])) {
            $page_count = $_GET['page'];
          } else {
            $page_count = 1;
          }

          // Calculate the limit
          $limit = $page_count * 5;

          require "../database/configuration.php";

          // Query to fetch Products
          $sql = "SELECT * FROM products
                  LIMIT $limit";

          $result = mysqli_query($conn, $sql);
          if (!$result) {
            $error_message = "No products have been supplied.";
          }

          while ($row = mysqli_fetch_array($result)) {
            // Individual Product data
            $product_id = $row['p_id'];
            $product_name = $row['name'];
            $product_price = $row['price'];
            $product_image = $row['image'];
            $product_category = $row['category'];
          ?>
            <!-- Populating the table with Product data -->
            <tr>
              <td><?php echo $product_id ?></td>
              <td><img src="<?php echo $imagePath . $product_image ?>"></td>
              <td>Rs <?php echo $product_price ?></td>
              <td><?php echo $product_category ?></td>
              <td><?php echo $product_name ?></td>
              <td><button class="update_product_details">UPDATE</button></td>
              <td><button class="remove_product">REMOVE</button></td>
            </tr>
          <?php
          };
          ?>

        </table>
      </section>

      <hr class="horizontal_lines">

      <div class="manage_products">
        <?php
        $nextPage = $page_count + 1;
        ?>

        <a href="admin.php?page=<?php echo $nextPage; ?>">
          <button class="view_more_btn">View More Products</button>
        </a>
        <a href="admin.php?create=1">
          <button type="button" class="create_product_btn">Create New Products</button>
        </a>
      </div>
    </main>

    <aside class="right_panel">
      <!-- CREATE NEW PRODUCTs FORM -->
      <?php if(isset($_GET['create'])) { ?>
        <div class="create_product">
          <form class="create_product_form" action="../php/create_product.php" method="GET">
            <h1>Create Product</h1>

            <label for="product_name">Name</label>
            <input type="text" id="product_name" name="product_name" required>

            <label for="product_category">Category</label>

            <?php
            require "../database/configuration.php";

            // Query to fetch Category of products
            $sql = "SELECT DISTINCT category 
                    FROM products
                    ORDER BY category;";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
              $error_message = "No products have been supplied.";
            }

            while ($row = mysqli_fetch_array($result)) {
            ?>
              <label>
                <input type="radio" name="product_category" value="<?php echo $row['category']; ?>" required>
                <?php echo $row['category']; ?> <br>
              </label>
            <?php
            };
            ?>

            <label for="product_price">Price</label>
            <input type="number" id="product_price" name="product_price" required>

            <!-- Images should be attached as files and NOT file path (⚠️LATER IMPLEMENTATION) -->
            <label for="product_image">Image file name</label>
            <input type="text" id="product_image" name="product_image">

            <button type="submit">Create</button>
            <button type="button" onclick="window.location='admin.php'">Cancel</button>
          </form>
        </div>
      <?php } ?>

      <!-- UPDATE PRODUCT FORM -->
      <?php if(!empty($_GET['update_product_id'])) { ?>
        <div class="update_product">
          <form class="update_product_form" action="../php/update_product.php" method="GET">
            <h1>Update Product</h1>

            <?php
            require "../database/configuration.php";

            // Fetch Product ID
            if (!empty($_GET['update_product_id'])) {
              $productID = $_GET['update_product_id'];
            }

            else {
              // Set default values

              $productID = 0; 

              $product_name = "";
              $product_price = "";
              $product_image = "";
              $product_category = "";
            }

            // Query for the Product with given ID
            $sql = "SELECT * FROM products
                    WHERE p_id = '$productID'";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
              $error_message = "No products have been supplied.";
            }

            while ($row = mysqli_fetch_array($result)) {
              // Product data
              $product_name = $row['name'];
              $product_price = $row['price'];
              $product_image = $row['image'];
              $product_category = $row['category'];
            ?>
            <?php
            };
            ?>

            <!-- ID of Product to UPDATE sent to URL -->
            <input type="hidden" name="update_product_id" value="<?php echo $productID; ?>">

            <label for="product_name">Name</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo $product_name?>" required>

            <label for="product_category">Category</label>

            <?php
            require "../database/configuration.php";

            // Query to fetch Category of products
            $sql = "SELECT DISTINCT category 
                    FROM products
                    ORDER BY category;";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
              $error_message = "No products have been supplied.";
            }

            while ($row = mysqli_fetch_array($result)) {
            ?>
              <label>
                <input 
                  type="radio" 
                  name="product_category" 
                  value="<?php echo $row['category']; ?>" 
                  <?php
                    if ($row['category'] == $product_category)
                      {
                        echo "checked";
                      }
                  ?>
                >
                <?php echo $row['category']; ?> <br>
              </label>
            <?php
            };
            ?>

            <label for="product_price">Price</label>
            <input type="number" id="product_price" name="product_price" value="<?php echo $product_price?>" required>

            <!-- Images should be attached as files and NOT file path (⚠️LATER IMPLEMENTATION) -->
            <label for="product_image">Image file name</label>
            <input type="text" id="product_image" name="product_image" value="<?php echo $product_image?>">

            <button type="submit">Update</button>
            <button type="button" onclick="window.location='admin.php'">Cancel</button>
          </form>
        </div>
      <?php } ?>

      <!-- DELETE PRODUCT FORM -->
      <?php if(!empty($_GET['delete_product_id'])) { ?>
        <div class="delete_product">
          <form class="delete_product_form" action="../php/delete_product.php" method="GET">
            <h1>Delete Product</h1>

            <?php
            require "../database/configuration.php";

            // Fetch Product ID
            if (!empty($_GET['delete_product_id'])) {
              $productID = $_GET['delete_product_id'];
            }

            else {
              // Set default values

              $productID = 0; 

              $product_name = "";
              $product_price = "";
              $product_image = "";
              $product_category = "";
            }

            // Query to fetch data about the product to be removed
            $sql = "SELECT * FROM products
                    WHERE p_id = '$productID'";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
              $error_message = "No products have been supplied.";
            }

            while ($row = mysqli_fetch_array($result)) {
              // Individual Product data
              $product_name = $row['name'];
              $product_price = $row['price'];
              $product_image = $row['image'];
              $product_category = $row['category'];
            };
            ?>

            <!-- ID of Product to DELETE sent to URL -->
            <input type="hidden" name="delete_product_id" value="<?php echo $productID; ?>">

            <label for="product_name">Name</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo $product_name?>" disabled>

            <label for="product_category">Category</label>
            <input type="text" id="product_category" name="product_category" value="<?php echo $product_category?>" disabled>

            <label for="product_price">Price</label>
            <input type="number" id="product_price" name="product_price" value="<?php echo $product_price?>" disabled>

            <!-- Images should be attached as files and NOT file path (⚠️LATER IMPLEMENTATION) -->
            <label for="product_image">Image file name</label>
            <input type="text" id="product_image" name="product_image" value="<?php echo $product_image?>" disabled>

            <button type="submit">Delete</button>
            <button type="button" onclick="window.location='admin.php'">Cancel</button>
          </form>
        </div>
      <?php } ?>
    </aside>
  </div>
  <script type="text/javascript" src="../js/admin.js"></script>
</body>

</html>