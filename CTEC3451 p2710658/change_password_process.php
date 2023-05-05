<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: change_password.php");
    exit();
}

$email = $_POST['email'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];

if ($new_password != $confirm_new_password) {
    echo "New passwords do not match. Please try again.";
    header("Refresh: 2; URL=change_password.php");
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

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user || !password_verify($old_password, $user['password'])) {
    echo "Incorrect email or old password.";
    header("Refresh: 2; URL=change_password.php");
    exit();
}

$new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
$sql = "UPDATE users SET password = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $new_password_hash, $email);
$result = $stmt->execute();

if ($result) {
    echo "Password changed successfully.";
    header("Refresh: 2; URL=index.php");
} else {
    echo "Error changing password: " . $stmt->error;
    header("Refresh: 2; URL=change_password.php");
}

$stmt->close();
$conn->close();
?>