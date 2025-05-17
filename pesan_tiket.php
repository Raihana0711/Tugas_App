<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user'];
    $film = $_POST['film'];
    $nama = $_POST['nama_pemesan'];
    $jumlah = $_POST['jumlah'];

    if ($film && $nama && $jumlah > 0) {
        // Simpan ke database
        $query = "INSERT INTO tiket (user_id, film, nama_pemesan, jumlah)
                  VALUES ($user_id, '$film', '$nama', $jumlah)";
        mysqli_query($conn, $query);

        // Ambil data terakhir untuk konfirmasi
        $result = mysqli_query($conn, "SELECT * FROM tiket WHERE user_id = $user_id ORDER BY waktu_pesan DESC LIMIT 1");
        $pesanan = mysqli_fetch_assoc($result);
    } else {
        $error = "Data tidak lengkap.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket</title>
    <style>
        body {
            background-color: #FADADD;
            font-family: 'Segoe UI', sans-serif;
            text-align: center;
            padding: 60px 20px;
            color: #333;
        }
        .box {
            background: #CFE3D4;
            display: inline-block;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        h2 {
            color: #444;
            margin-bottom: 15px;
        }
        p {
            margin: 6px 0;
            font-size: 16px;
        }
        .btn {
            margin-top: 20px;
            background-color: #FADADD;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            color: #333;
            display: inline-block;
        }
        .btn:hover {
            background-color: #f5bfc5;
        }
    </style>
</head>
<body>

<?php if (!empty($pesanan)): ?>
    <div class="box">
        <h2>✅ Pesanan Anda Berhasil!</h2>
        <p><strong>Nama Pemesan:</strong> <?= htmlspecialchars($pesanan['nama_pemesan']) ?></p>
        <p><strong>Film:</strong> <?= htmlspecialchars($pesanan['film']) ?></p>
        <p><strong>Jumlah Tiket:</strong> <?= htmlspecialchars($pesanan['jumlah']) ?></p>
        <p><strong>Waktu Pesan:</strong> <?= htmlspecialchars($pesanan['waktu_pesan']) ?></p>
        <a href="home.php" class="btn">Kembali ke Beranda</a>
    </div>
<?php elseif (!empty($error)): ?>
    <p><?= $error ?></p>
<?php else: ?>
    <p>Akses tidak valid.</p>
<?php endif; ?>

</body>
</html>
