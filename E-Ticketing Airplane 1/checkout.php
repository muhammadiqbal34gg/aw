<?php require 'layouts/navbar.php'; ?> 

<div class="container mx-auto">
    <div class="list-tiket-pesawat">
        <?php if(empty($_SESSION["cart"])) : ?>
            <h1 class="text-2xl">Belum ada tiket yang kamu pesan</h1>
        <?php else : ?>
            <div class="wrapper-checkout mt-8">
                <h1 class="text-3xl font-bold mb-4">Checkout Pemesanan Tiket</h1>
                <div class="checkout bg-white shadow-md rounded-lg p-6">
                    <form action="" method="POST">
                        <label for="nama_lengkap" class="block">Nama Lengkap</label>
                        <input type="hidden" name="id_user" value="<?= $_SESSION["id_user"]; ?>" class="block w-full border border-gray-300 rounded-md p-2 mb-4" disabled value="<?= $_SESSION["nama_lengkap"]; ?>">
                        <?php $grandtotal = 0; ?>
                        <?php foreach($_SESSION["cart"] as $id_tiket => $kuantitas) : ?>
                            <?php 
                                $tiket = query("SELECT * FROM jadwal_penerbangan 
                                INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_tiket'")[0]; 
                            
                                $totalHarga = $tiket["harga"] * $kuantitas;
                                $grandtotal += $totalHarga;
                            ?>
                            <input type="hidden" name="id_penerbangan" value="<?= $id_tiket; ?>">
                            <input type="hidden" name="jumlah_tiket" value="<?= $kuantitas; ?>">
                            <input type="hidden" name="total_harga" value="<?= $totalHarga; ?>">
                        <?php endforeach; ?>

                        <h1 class="text-2xl mt-8 mb-4">List tiket pesawat yang dibeli</h1>
                        <?php foreach($_SESSION["cart"] as $id_tiket => $kuantitas) : ?>
                            <?php 
                                $tiket = query("SELECT * FROM jadwal_penerbangan 
                                INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_tiket'")[0]; 
                            
                                $totalHarga = $tiket["harga"] * $kuantitas;
                            ?>
                            <div class="wrapper-checkout-tiket-pesawat mb-4">
                                <div class="card-checkout-tiket-pesawat bg-gray-100 p-4 rounded-lg">
                                    <a href="detail.php?id=<?= $tiket["id_jadwal"]; ?>" class="text-black">
                                        <div class="flex items-center mb-2">
                                            <div class="logo-maskapai mr-4"><img src="assets/images/<?= $tiket["logo_maskapai"] ; ?>" alt=""></div>
                                            <div class="nama-maskapai font-bold"><?= $tiket["nama_maskapai"]; ?></div>
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <div class="tanggal-berangkt mr-4"><?= $tiket["tanggal_pergi"]; ?></div>
                                            <div class="waktu-berangkat mr-4"><?= $tiket["waktu_berangkat"]; ?>-<?= $tiket["waktu_tiba"]; ?></div>
                                            <div class="rute-penerbangan"><?= $tiket["rute_asal"]; ?>-<?= $tiket["rute_tujuan"]; ?></div>
                                        </div>
                                        <div class="text-harga font-bold">Rp <?= number_format($tiket["harga"]); ?> @ <?= $kuantitas; ?> Tiket</div>
                                        <div class="total font-bold">Rp <?= number_format($totalHarga); ?></div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <h2 class="text-2xl font-bold mt-4">Grand Total <br> Rp. <?= number_format($grandtotal); ?></h2>
                        <button type="submit" name="checkout" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded-lg hover:bg-blue-600">Checkout</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <?php 
        if (isset($_POST['checkout'])){
            if(checkout($_POST)){
                echo "
                <script type='text/javascript'>
                    alert('berhasil dicheckout');
                    window.location = 'index.php'
                </script>
                ";
            } else {
                echo mysqli_error($conn);
            }
        }
        ?>
    </div>
</div>