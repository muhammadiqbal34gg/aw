<?php
$page = "Dashboard";

session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../auth/login/index.php';
    </script>
    ";
}


?>

<?php require '../layouts/sidebar_maskapai.php'; ?>

<div class="flex-auto overflow-x-hidden bg-blue-100">
    <div class="p-6 ">
        <h1 class="text-3xl font-bold ">Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    </div>
</div>