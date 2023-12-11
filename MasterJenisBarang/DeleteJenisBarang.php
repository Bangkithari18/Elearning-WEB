<?php
include "../koneksi.php";
$id_jenis = $_POST['id_jenis'];

if (empty($data['error'])) {
    $query = " DELETE FROM tb_jenis_barang WHERE Id_Jenis='$id_jenis'";

    mysqli_query($koneksi, $query) or die("gagal delete" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
