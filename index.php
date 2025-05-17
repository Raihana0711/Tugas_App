<?php session_start(); if (isset($_SESSION['user'])) header("Location: home.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #FADADD;
            margin-top: 60px;
            text-align: center;
            color: #333;
        }
        form {
            background: #CFE3D4;
            padding: 30px;
            width: 300px;
            margin: auto;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 8px;
            font-size: 14px;
        }
        input {
            background: #fff;
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
        a {
            color: #555;
        }
    </style>
</head>
<body>
<h2>Login</h2>
<form action="proses_login.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
</body>
</html>
