<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "world";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from URL parameter
$product_id = $_GET['id'];

// Fetch product information from the database
$sql = "SELECT * FROM products WHERE product_id = ?";
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
    <title>e-shop - Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    require_once('include/header.php')
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $product['product_images'] ?>" class="img-fluid" alt="<?= $product['product_name'] ?>">
            </div>
            <div class="col-md-6">
                <h1><?= $product['product_name'] ?></h1>
                <p><?= $product['product_description'] ?></p>
                <p>Price: $<?= $product['product_prices'] ?></p>
                <form action="add_to_basket.php" method="post">
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <button type="submit" class="btn btn-success mb-2">Add to Basket</button>
                </form>


                <span>&nbsp;</span>
                <form action="add_to_basket.php" method="post">
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <button type="submit" class="btn btn-success mb-2">Purchase</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>