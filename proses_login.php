<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['id'];
    header("Location: home.php");
} else {
    echo "Login gagal. <a href='index.php'>Coba lagi</a>";
}
?>
