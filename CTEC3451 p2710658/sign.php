<?php
session_start();

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

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT id, name, email, password FROM users WHERE email =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $name, $email, $hashed_password);

if ($stmt->num_rows > 0) {
  $stmt->fetch();

  if ($password===$hashed_password)
  {
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;

    header("location: index.php");
  } 
  else {
    echo "Incorrect password.";
  
  }
} 
else {
  echo "No account found with that email address.";
}

$stmt->close();
$conn->close();
?>