<?php
require "functions.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "
    <script type='text/javascript'>
        alert('Parameter id tiket tidak valid!');
        window.location = 'index.php';
    </script>
    ";
    exit; 
}

$id_order = $_GET['id'];
$detailTiket = mysqli_query($conn, "SELECT * FROM order_detail 
INNER JOIN order_tiket ON order_detail.id_order = order_tiket.id_order
INNER JOIN user ON order_detail.id_user = user.id_user
INNER JOIN jadwal_penerbangan ON order_detail.id_penerbangan = jadwal_penerbangan.id_jadwal
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute
INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai
WHERE order_detail.id_order = '$id_order'");

?>

<?php require '../../layouts/sidebar_maskapai.php'; ?>


<div class="list-tiket-pesawat">
    <h1 class="text-center">Detail Pemesanan - E Ticketing</h1>
    <?php foreach ($detailTiket as $data) : ?>
        <h4>Nomor Order : <?= $data["id_order"]; ?></h4>
        <table class="">
            <tr>
                <th>Nama Maskapai</th>
                <td><?= $data["nama_maskapai"]; ?></td>
            </tr>
            <tr>
                <th>Jumlah Tiket</th>
                <td><?= $data["jumlah_tiket"]; ?></td>
            </tr>
            <tr>
                <th>Rute Asal</th>
                <td><?= $data["rute_asal"]; ?></td>
            </tr>
            <tr>
                <th>Rute Tujuan</th>
                <td><?= $data["rute_tujuan"]; ?></td>
            </tr>
            <tr>
                <th>Waktu Berangkat</th>
                <td><?= $data["waktu_berangkat"]; ?></td>
            </tr>
            <tr>
                <th>Waktu Tiba</th>
                <td><?= $data["waktu_tiba"]; ?></td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>Rp <?= number_format($data["harga"]); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <?php 
                if($data["status"] == "proses"){
                    ?>
                    <td ><?= $data["status"]; ?></td>
                    <?php
                } else if($data["status"] == "berhasil"){
                       ?>
                    <td ><?= $data["status"]; ?></td>
                    <?php
                } else if($data["status"] == "gagal"){
                    ?>
                    <td ><?= $data["status"]; ?></td>
                    <?php
                }
            ?>
            </tr>
        </table>
        <a class="" href="index.php">back</a>
    <?php endforeach; ?>
</div>