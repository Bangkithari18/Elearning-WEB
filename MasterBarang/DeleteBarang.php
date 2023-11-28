<?php
include "../koneksi.php";
$id_barang = $_POST['id_barang'];

if (empty($data['error'])) {
    $query = " DELETE FROM tb_barang WHERE id_barang='$id_barang'";

    mysqli_query($koneksi, $query) or die("gagal delete" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
