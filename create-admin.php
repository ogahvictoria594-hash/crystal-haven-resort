<?php
require "config/db-connect.php"; 

$username = 'admin';
$password = password_hash('12345', PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
$stmt->execute([
    ':username' => $username,
    ':password' => $password
]);

echo "Admin account created successfully!";
?>
