<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are correct
    if ($username == "administrator" && $password == "eshop") {
        // Set session variables and redirect to the admin dashboard
        $_SESSION['admin_loggedin'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // Redirect back to the admin login page with an error message
        $_SESSION['admin_login_error'] = "Invalid username or password";
        header("Location: admin_login.php");
        exit;
    }
} else {
    // Redirect back to the admin login page if the form was not submitted
    header("Location: admin_login.php");
    exit;
}
?>