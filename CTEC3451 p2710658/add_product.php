<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "world";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["product_name"];
    $price = $_POST["product_prices"];
    $description = $_POST["product_description"];
    $quantity = $_POST["number_of_item_remaining"];
    $total_quantity = $_POST["total_number_of_products"];
    $product_range = $_POST["product_range"];
    $product_images = $_POST["product_images"];

    $sql = "INSERT INTO products (product_name, product_prices, product_description, number_of_item_remaining, total_number_of_products, product_range, product_images) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
  
    $stmt->bind_param("siiidss", $name, $images, $quantity, $total_quantity, $price, $description, $product_range);

    $stmt->execute();
    $stmt->close();
    header("Location: admin_dashboard.php");
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Add Product</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Name:</label>
            <input type="text" name="product_name" class="form-control" required><br>
            <label>Price:</label>
            <input type="text" name="product_prices" class="form-control" required><br>
            <label>Description:</label>
            <textarea name="product_description" class="form-control" required></textarea><br>
            <label>Quantity:</label>
            <input type="number" name="number_of_item_remaining" class="form-control" required><br>
            <label>Total Quantity:</label>
            <input type="number" name="total_number_of_products" class="form-control" required><br>
            <label>Product Range:</label>
            <select name="product_range" class="form-control">
                <option value="home_decor">Home Decor</option>
                <option value="furniture">Furniture</option>
                <option value="lighting">Lighting</option>
                <option value="home_accents">Home Accents</option>
                <option value="rugs">Rugs</option>
                <option value="outdoors">Outdoors</option>
                <option value="holidays">Holidays</option>
                <option value="gifts_events">Gifts & Events</option>
            </select><br>
            <label>Product Images:</label>
            <input type="text" name="product_images" class="form-control" required><br>
            <input type="submit" value="Add Product" class="btn btn-primary">
        </form>
    </div>
</body>

</html>