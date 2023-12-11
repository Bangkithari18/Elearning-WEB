<?php
include "../koneksi.php";
$id_keluar = $_POST['id_keluar'];

if (empty($data['error'])) {
    $query = " DELETE FROM tb_barang_keluar WHERE id_keluar='$id_keluar'";

    mysqli_query($koneksi, $query) or die("gagal delete" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
