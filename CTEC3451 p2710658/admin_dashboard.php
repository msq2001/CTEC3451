<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_loggedin']) || !$_SESSION['admin_loggedin']) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Admin Dashboard</h2>
        <p>Welcome, <?= $_SESSION['admin_username'] ?></p>
        <a href="index.php" class="btn btn-danger">Logout</a>
        <!-- User Management -->
        <h3>User Management</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>~
                </tr>
            </thead>
            <tbody>
                <!-- Retrieve and display users from the database -->
                <?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "world";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, email FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['name']}</td>
          <td>{$row['email']}</td>
          <td>
            <a href='edit_user.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
            <a href='delete_user.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No users found.</td></tr>";
    }
    ?>
            </tbody>
        </table>

        <!-- Product Management -->
        <h3>Product Management</h3>
        <a href="add_product.php" class="btn btn-primary mb-3">Add Product</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Retrieve and display products from the database -->
                <?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "world";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT product_id, product_name, product_prices FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>{$row['product_id']}</td>
          <td>{$row['product_name']}</td>
          <td>{$row['product_prices']}</td>
          <td>
            <a href='edit_product.php?id={$row['product_id']}' class='btn btn-warning'>Edit</a>
            <a href='delete_product.php?id={$row['product_id']}' class='btn btn-danger'>Delete</a>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No products found.</td></tr>";
    }
    ?>
            </tbody>
        </table>
        <h3>Order Management</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <!-- Retrieve and display cart records from the database -->
                <?php
    $sql = "SELECT id, user_id, product_id, quantity FROM cart";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['user_id']}</td>
          <td>{$row['product_id']}</td>
          <td>{$row['quantity']}</td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No orders found.</td></tr>";
    }
    ?>
            </tbody>
        </table>

    </div>
</body>

</html>