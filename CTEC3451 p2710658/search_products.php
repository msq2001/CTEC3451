<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "world";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['query'];

$sql = "SELECT * FROM products WHERE product_name LIKE ?";
$stmt = $conn->prepare($sql);
$search_query = "%" . $query . "%";
$stmt->bind_param("s", $search_query);
$stmt->execute();
$result = $stmt->get_result();

$products = [];

while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-shop - Search Results</title>
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
        <h1>Search Results for '<?= htmlspecialchars($query) ?>'</h1>
        <div class="row">
            <?php foreach ($products as $product) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= $product['product_images'] ?>" class="card-img-top"
                        alt="<?= $product['product_name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['product_name'] ?></h5>
                        <p class="card-text"><?= $product['product_description'] ?></p>
                        <p class="card-text">Price: $<?= $product['product_prices'] ?></p>
                        <a href="shopcard.php?id=<?= $product['product_id'] ?>" class="btn btn-primary">View
                            Product</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>