<?php
session_start();

$error_message = "";

// Verifying User Credentials
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $uname = $_POST['username'];
  $pword = $_POST['password'];

  // Database parameters
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "island_bites";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Query to fetch Users
  $sql = "SELECT * FROM users 
          WHERE username = '$uname'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  if (!$row) {
    $error_message = "Invalid username or password.";
  } 
  
  else {
    if (password_verify($pword, $row['password'])) {
      // Login successful
      $user_role = $row['user_role'];

      $_SESSION['username'] = $uname;
      $_SESSION['user_role'] = $user_role;

      switch ($user_role) {
        case "admin":
            header("Location: admin.php");
            exit();

        case "desk":
            header("Location: order_dashboard.php");
            exit();

        case "kitchen":
            header("Location: kitchen_queue.php");
            exit();
      }

    } 
    
    else {
      // Username was found, with incorrect password
      $error_message = "Invalid password for $uname";
    }
  }
}

else {
  // Default User values
  $uname = ''; 
  $pword = ''; 
}

?>

<!DOCTYPE html>
<html>

  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
  </head>

  <body>
    <!-- Login Form  -->
    <div class="login_container">
      <form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1>Welcome Back!</h1>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required>

        <button type="submit">Login</button>

        <?php
        if (!empty($error_message)) {
          echo "<p style='color: red; text-align: center; margin-top: 15px'>$error_message</p>";
        }
        ?>

        <h5>Contact <a href="">Admin</a> for credentials</h5>
      </form>
    </div>

  </body>

</html>