<?php
include 'db.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Gagal registrasi: " . mysqli_error($conn);
}
?>
