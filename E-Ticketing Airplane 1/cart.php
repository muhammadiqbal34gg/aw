<?php require 'layouts/navbar.php'; ?> 

<div class="container mx-auto px-4 mt-8 ">
    <h1 class="text-2xl font-semibold">List Pemesanan Tiket</h1>
    <?php if(empty($_SESSION["cart"])){
        ?>
            <h1>Belum ada tiket yang kamu pesan</h1>
            <?php
    }else{
        ?>

            <table cellpadding="10" cellspacing="0" class="bg-white rounded-md">
                <tr>
                    <th>No</th>
                    <th>Nama Maskapai</th>
                    <th>Rute</th>
                    <th>Tanggal Berangkat</th>
                    <th>Waktu Berangkat</th>
                    <th>Harga</th>
                    <th>Kapasitas</th>
                    <th>Total Harga</th>
                </tr>
                
                <?php $no = 1; ?>
                <?php $grandtotal = 0; ?>
                <?php foreach($_SESSION["cart"] as $id_jadwal => $kuantitas) : ?>
                <?php $jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
                INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_jadwal'")[0]; 
            
                $totalharga = $jadwalPenerbangan["harga"] * $kuantitas;
                $grandtotal += $totalharga;?>

                <tr>
                    <td><?= $no ; ?></td>
                    <td><?= $jadwalPenerbangan["nama_maskapai"] ; ?></td>
                    <td><?= $jadwalPenerbangan["rute_asal"] ; ?> - <?= $jadwalPenerbangan["rute_tujuan"] ; ?></td>
                    <td><?= $jadwalPenerbangan["tanggal_pergi"] ; ?></td>
                    <td><?= $jadwalPenerbangan["waktu_berangkat"] ; ?> - <?= $jadwalPenerbangan["waktu_tiba"] ; ?></td>
                    <td>Rp <?=  number_format($jadwalPenerbangan["harga"]) ; ?></td>
                    <td><?= $kuantitas; ?></td>
                    <td>Rp <?= number_format($totalharga); ?></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
                <tr class="bg-green-100 py-2 px-4">
                    <td colspan="7">Total</td>
                    <td>Rp <?= number_format($grandtotal); ?></td>
                </tr>
                <tr>
                    <td colspan="9">
                        <a href="checkout.php" class="bg-blue-500 py-2 px-4 rounded-md">Checkout</a>
                    </td>
                </tr>
            </table>
        <?php 
    }
    ?>
</div>