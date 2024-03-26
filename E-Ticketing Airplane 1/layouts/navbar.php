<?php

require 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Tic Pesawat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body class="bg-blue-50">

<div class="navbar bg-blue-500 p-4">
    <div class="container mx-auto flex justify-between items-center font-semibold">
        <div class="logo text-white text-xl font-bold">E - Tic Pesawat</div>
        <div class="menu">
            <a href="index.php" class="text-white px-3 py-2">Beranda</a>
            <a href="cart.php" class="text-white px-3 py-2">Pemesanan Tiket</a>
            <a href="histori.php" class="text-white px-3 py-2">Riwayat Pemesanan</a>
        </div>
        <div class="authentication">
            <?php if(isset($_SESSION["username"])) { ?>
                <span class="text-white mr-2">Halo, <?= $_SESSION["nama_lengkap"]; ?></span>
                <a href="logout.php" class="text-white hover:text-gray-200 bg-red-600 py-2 px-4 rounded-md">Logout</a>
            <?php } else { ?>
                <a href="auth/login/" class="text-white hover:text-gray-200 mr-2">Login</a>
                <a href="auth/register/" class="text-white hover:text-gray-200">Register</a>
            <?php } ?>
        </div>
    </div>
</div>

</body>
</html>