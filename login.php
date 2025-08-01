<?php
session_start();
require_once "db.php";

// Redirect if already logged in
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate fields
    if (empty($_POST['email']) || empty($_POST['password'])) {
        header("Location: login.php?error=empty");
        exit();
    }

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Query user
    $result = pg_query_params($conn, "SELECT * FROM users WHERE email = $1", [$email]);
    $userData = pg_fetch_assoc($result);

    if ($userData && password_verify($password, $userData['password'])) {
        // Store session
        $_SESSION['user'] = $userData['email'];
        header("Location: index.php");
        exit();
    } else {
        header("Location: login.php?error=invalid");
        exit();
    }
}

// Show error messages if any
$errorMessage = "";
if (isset($_GET['error'])) {
    if ($_GET['error'] === 'empty') $errorMessage = "Please fill all fields.";
    if ($_GET['error'] === 'invalid') $errorMessage = "Invalid email or password.";
}
?>