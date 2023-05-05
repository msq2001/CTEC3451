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
    $id = $_POST["id"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $gender = $_POST["gender"];
    $name = $_POST["name"];
    $username = $_POST["username"];

    $sql = "UPDATE users SET email=?, address=?, phone_number=?, gender=?, name=?, username=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $email, $address, $phone_number, $gender, $name, $username, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_dashboard.php");
}

$user_id = $_GET["id"];
$sql = "SELECT * FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .form-edit-user {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <form class="form-edit-user" method="post"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Edit User</h1>
                    <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
                    <label for="inputName" class="sr-only">Name</label>
                    <input type="text" id="inputName" name="name" class="form-control mb-1"
                        value="<?php echo $user["name"]; ?>" required>
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control mb-1"
                        value="<?php echo $user["email"]; ?>" required>
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" id="inputUsername" name="username" class="form-control mb-1"
                        value="<?php echo $user["username"]; ?>" required>
                    <label for="inputAddress" class="sr-only">Address</label>
                    <textarea id="inputAddress" name="address" class="form-control mb-1"
                        required><?php echo $user["address"]; ?></textarea>
                    <label for="inputPhoneNumber" class="sr-only">Phone Number</label>
                    <input type="text" id="inputPhoneNumber" name="phone_number" class="form-control mb-1"
                        value="<?php echo $user["phone_number"]; ?>" required>
                    <label for="inputGender" class="sr-only">Gender</label>
                    <select id="inputGender" name="gender" class="form-control mb-1">
                        <option value="male" <?php echo ($user["gender"] == "male") ? "selected" : ""; ?>>Male</option>
                        <option value="female" <?php echo ($user["gender"] == "female") ? "selected" : ""; ?>>Female
                        </option>
                        <option value="other" <?php echo ($user["gender"] == "other") ? "selected" : ""; ?>>Other
                        </option>
                    </select>
                    <button class="btn btn-lg btn-success btn-block mt-3" type="submit">Update User</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>