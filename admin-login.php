<?php
session_start();
require "config/db-connect.php"; // $pdo

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if($admin && password_verify($password, $admin['password'])){
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Wrong username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<style>
body { background:#121212; color:white; }
.btn-gold { background: gold; color:black; }
</style>
</head>
<body>
<div class="container mt-5" style="max-width:400px;">
    <h3 class="text-center mb-4">Admin Login</h3>
    <?php if(isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" name="login" class="btn btn-gold w-100">Login</button>
    </form>
</div>
</body>
</html>
