<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    echo "Please log in first.";
    header("Refresh: 2; URL=sigin.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "world";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = $_POST['product_id'];
$user_id = $_SESSION['id'];

$sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $product_id);
$result = $stmt->execute();

if ($result) {
    header("Location: wishlist.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>