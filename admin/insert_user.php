<?php
require '../config/database.php';

$username = 'satpam';
$password = password_hash('12345', PASSWORD_DEFAULT); // otomatis pakai algoritma bcrypt

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

echo "User berhasil dibuat.";
?>
