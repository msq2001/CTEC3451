<?php
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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (id, email, address, phone_number, gender, name, password, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssss", $id, $email, $address, $phone_number, $gender, $name, $password, $username);

// Set parameters and execute
$id = $_POST["id"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone_number = $_POST["phone_number"];
$gender = $_POST["gender"];
$name = $_POST["name"];
$password = $_POST["password"];
$username = $_POST["username"];
$stmt->execute();

echo "New user created successfully";
header("location: index.php");
$stmt->close();
$conn->close();
?>