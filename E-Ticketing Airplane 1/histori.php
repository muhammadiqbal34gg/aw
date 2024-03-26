<?php require 'layouts/navbar.php'; ?>
<?php 

$id_user = $_SESSION["id_user"];
$orderTiket = mysqli_query($conn, "SELECT order_tiket.id_order, order_tiket.struk, order_tiket.status, order_detail.id_order, order_detail.id_user, user.id_user FROM order_tiket 
INNER JOIN order_detail ON order_tiket.id_order = order_detail.id_order 
INNER JOIN user ON order_detail.id_user = user.id_user WHERE user.id_user = '$id_user' GROUP BY order_tiket.id_order");
?>


<div class="list-tiket-pesawat">
    <h1 class="text-2xl font-semibold p-2">History Pemesanan E-Ticketing</h1>  

    <table border="1" cellpadding="10" cellspacing="2"class="bg-white rounded-md m-2">
        <tr>
            <th>No Order</th>
            <th>Struk</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php foreach($orderTiket as $data) : ?>
        <tr>
            <td><?= $data["id_order"]; ?></td>
            <td><?= $data["struk"]; ?></td>
            <?php 
                if($data["status"] == "Proses"){
                    ?>
                    <td class="text-gray-700 text-center bg-gray-200 rounded-md px-1"><?= $data["status"]; ?></td>
                    <?php
                } else if($data["status"] == "Berhasil"){
                    ?>
                    <td class="text-green-700 text-center bg-green-200 rounded-md px-1"><?= $data["status"]; ?></td>
                    <?php
                } else if($data["status"] == "Gagal"){
                    ?>
                    <td class="text-red-700 text-center bg-red-200 rounded-md px-1"><?= $data["status"]; ?></td>
                    <?php
                }
            ?>
            <td>
                <a href="detailHistory.php?id=<?= $data["id_order"]; ?>" class="text-blue-700 bg-blue-200 py-2 px-4 rounded-md">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>