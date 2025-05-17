<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Berhasil</title>
    <meta http-equiv="refresh" content="5;url=logout.php">
    <style>
        body {
            font-family: Arial;
            background-color: #f0fff0;
            text-align: center;
            padding-top: 100px;
        }
        .box {
            display: inline-block;
            padding: 30px;
            background-color: #d4edda;
            border: 2px solid #28a745;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>✅ Pesanan Tiket Berhasil!</h2>
        <p>Terima kasih telah memesan.</p>
        <p>Anda akan logout otomatis dalam 5 detik...</p>
        <p><a href="logout.php">Klik di sini jika tidak otomatis</a></p>
    </div>
</body>
</html>
