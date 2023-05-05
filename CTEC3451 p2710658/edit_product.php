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
    $id = $_POST["product_id"];
    $name = $_POST["product_name"];
    $price = $_POST["product_prices"];
    $description = $_POST["product_description"];
    $quantity = $_POST["number_of_item_remaining"];

    $sql = "UPDATE products SET product_name=?, product_prices=?, product_description=?, number_of_item_remaining=? WHERE product_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdsii", $name, $price, $description, $quantity, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_dashboard.php");
}

$product_id = $_GET["id"];
$sql = "SELECT * FROM products WHERE product_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Product</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="product_id" value="<?php echo $product["product_id"]; ?>">
            <label>Name:</label>
            <input type="text" name="product_name" class="form-control"
                value="<?php echo $product["product_name"]; ?>"><br>
            <label>Price:</label>
            <input type="text" name="product_prices" class="form-control"
                value="<?php echo $product["product_prices"]; ?>"><br>
            <label>Description:</label>
            <textarea name="product_description"
                class="form-control"><?php echo $product["product_description"]; ?></textarea><br>
            <label>Quantity:</label>
            <input type="number" name="number_of_item_remaining" class="form-control"
                value="<?php echo $product["number_of_item_remaining"]; ?>"><br>
            <input type="submit" value="Update Product" class="btn btn-primary">
        </form>
    </div>
</body>

</html>