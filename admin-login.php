<?php
session_start(); // Start session to track admin login
require "config/db-connect.php"; // Include database connection ($pdo)

// Check if login form is submitted
if(isset($_POST['login'])){
    $username = $_POST['username']; // Get username from form
    $password = $_POST['password']; // Get password from form

    // Prepare SQL statement to get admin with this username
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(); // Fetch admin record

    // Verify password and login
    if($admin && password_verify($password, $admin['password'])){
        $_SESSION['admin_logged_in'] = true; // Set session for logged in
        $_SESSION['admin_username'] = $username; // Save username in session
        header("Location: admin.php"); // Redirect to admin dashboard
        exit;
    } else {
        $error = "Wrong username or password!"; // Show error if login fails
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<style>
body { background:#121212; color:white; } /* Dark theme for login page */
.btn-gold { background: gold; color:black; } /* Gold button styling */
</style>
</head>
<body>
<div class="container mt-5" style="max-width:400px;">
    <!-- Page heading -->
    <h3 class="text-center mb-4">Admin Login</h3>
    
    <!-- Show error if login failed -->
    <?php if(isset($error)) echo "<p class='text-danger'>$error</p>"; ?>

    <!-- Login form -->
    <form method="post">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" name="login" class="btn btn-gold w-100">Login</button>
    </form>
</div>
</body>
</html>
