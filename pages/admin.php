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
        <div class="products">
          <h3 id="top_title">TOP 3 Products</h3>
          <hr class="horizontal_lines">
          <div class="product_card">
            <h3 class="product_title">Product 1</h3>

            <div class="product_info">
              <div class="product_image">
                <img src="img1.jpg">IMG
              </div>
              <div class="product_details">
                Price | Category | Ingredients
              </div>
            </div>

            <div class="product_actions">
              <button class="update_product_details">UPDATE</button>
              <button class="remove_product">REMOVE</button>
            </div>
          </div>

          <hr class="horizontal_lines">
          <div class="product_card">
            <h3 class="product_title">Product 2</h3>

            <div class="product_info">
              <div class="product_image">
                <img src="img2.jpg">IMG
              </div>
              <div class="product_details">
                Price | Category | Ingredients
              </div>
            </div>

            <div class="product_actions">
              <button class="update_product_details">UPDATE</button>
              <button class="remove_product">REMOVE</button>
            </div>
          </div>

          <hr class="horizontal_lines">
          <div class="product_card">
            <h3 class="product_title">Product 3</h3>

            <div class="product_info">
              <div class="product_image">
                <img src="img3.jpg">IMG
              </div>
              <div class="product_details">
                Price | Category | Ingredients
              </div>
            </div>

            <div class="product_actions">
              <button class="update_product_details">UPDATE</button>
              <button class="remove_product">REMOVE</button>
            </div>
          </div>

        </div>

        <hr class="horizontal_lines">

        <div class="manage_products">
          <button class="view_more_btn">View More Products</button>
          <button class="create_product_btn">Create New Products</button>
        </div>

        <section class="products_table">
          <table class="more_products" border="1">
            <tr>
              <th>Image</th>
              <th>Price</th>
              <th>Category</th>
              <th>Ingredients</th>
              <th colspan="2">Manage</th>
            </tr>
            <tr>
              <td>img1</td>
              <td>price1</td>
              <td>category1</td>
              <td>ingredients1</td>
              <td>UPDATE</td>
              <td>DELETE</td>
            </tr>
          </table>
        </section>
      </main>
    </div>
  </body>
</html>