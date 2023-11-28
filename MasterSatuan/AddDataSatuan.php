<?php
include "../koneksi.php";
$satuan_id = $_POST['id_satuan'];
$satuan_barang = $_POST['satuan'];
if (empty($data['error'])) {
    $query = " INSERT INTO tb_satuan set id_satuan='$satuan_id', satuan='$satuan_barang'";

    mysqli_query($koneksi, $query) or die("gagal insert" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
