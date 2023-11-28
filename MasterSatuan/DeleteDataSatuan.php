<?php
include "../koneksi.php";
$id_satuan = $_POST['id_satuan'];

if (empty($data['error'])) {
    $query = " DELETE FROM tb_satuan WHERE id_satuan='$id_satuan'";

    mysqli_query($koneksi, $query) or die("gagal delete" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
