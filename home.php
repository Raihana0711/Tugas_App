<?php
session_start();
if (!isset($_SESSION['user'])) header("Location: index.php");
include 'db.php';

$user_id = $_SESSION['user'];
$result = mysqli_query($conn, "SELECT * FROM tiket WHERE user_id=$user_id ORDER BY waktu_pesan DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #FADADD;
            text-align: center;
            margin-top: 40px;
            color: #333;
        }
        form {
            background: #CFE3D4;
            padding: 25px;
            width: 350px;
            margin: auto;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        input, select, button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 14px;
        }
        button {
            background: #FADADD;
            color: #333;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: #f5bfc5;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }
        li {
            background: #fff;
            margin: 5px auto;
            padding: 10px;
            border-radius: 8px;
            width: 320px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        a {
            color: #555;
        }
    </style>
</head>
<body>
<h2>Pesan Tiket Bioskop</h2>
<form action="pesan_tiket.php" method="POST">
    <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" required>
    <input type="number" name="jumlah" placeholder="Jumlah Tiket" min="1" required>
    <select name="film" required>
        <option value="">-- Pilih Film --</option>
        <option value="Komang">Komang</option>
        <option value="Jumbo">Jumbo</option>
        <option value="Danur">Danur</option>
    </select>
    <button type="submit">Pesan Tiket</button>
</form>
</body>
</html>
