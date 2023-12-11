<?php
include "../koneksi.php";
$jenis_id = $_POST['id_jenis'];
$satuan_jenis = $_POST['satuan_jenis'];
if (empty($data['error'])) {
    $query = " INSERT INTO tb_jenis_barang set Id_Jenis='$jenis_id', Jenis='$satuan_jenis'";

    mysqli_query($koneksi, $query) or die("gagal insert" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
