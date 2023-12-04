<?php
include "../koneksi.php";
$id_masuk = $_POST['id_masuk'];

if (empty($data['error'])) {
    $query = " DELETE FROM tb_barang_masuk WHERE id_masuk='$id_masuk'";

    mysqli_query($koneksi, $query) or die("gagal delete" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
