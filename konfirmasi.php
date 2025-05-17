<?php
session_start();
if (!isset($_SESSION['user'])) header("Location: index.php");

include 'db.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tiket WHERE id = $id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Tiket</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #FADADD;
            text-align: center;
            margin-top: 50px;
        }
        .box {
            background-color: #D0E7D2;
            padding: 30px;
            margin: auto;
            border-radius: 12px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        .detail {
            margin-top: 15px;
            text-align: left;
        }
        .detail p {
            margin: 8px 0;
            font-size: 16px;
        }
        a {
            text-decoration: none;
            color: #444;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>✅ Pesanan Anda Berhasil!</h2>
        <div class="detail">
            <p><strong>Nama:</strong> <?= htmlspecialchars($data['nama_pemesan']) ?></p>
            <p><strong>Film:</strong> <?= htmlspecialchars($data['film']) ?></p>
            <p><strong>Jumlah Tiket:</strong> <?= $data['jumlah'] ?></p>
            <p><strong>Waktu:</strong> <?= $data['waktu_pesan'] ?></p>
        </div>
        <a href="home.php">← Kembali ke Home</a>
    </div>
</body>
</html>
