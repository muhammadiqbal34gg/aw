<?php

require '../../koneksi.php';

function query($query){

    global $conn;

    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;    
}

function hapus($id){
    global $conn; 

    mysqli_query($conn, "DELETE FROM order_tiket WHERE id_order = '$id'");
    return mysqli_affected_rows($conn);
}

function getOrderDetail($id_order)
{
    global $conn;

    $query = "SELECT * FROM order_detail 
              INNER JOIN jadwal_penerbangan ON order_detail.id_jadwal = jadwal_penerbangan.id_jadwal
              INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute
              INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai
              WHERE order_detail.id_order = '$id_order'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return null;
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<di

?>