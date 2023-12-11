<?php
include "../koneksi.php";
$Id_jenis = $_POST['id_jenis'];
$Jenis_Barang = $_POST['satuan_jenis'];
if (empty($data['error'])) {
    $query = " UPDATE tb_jenis_barang set Jenis='$Jenis_Barang' WHERE Id_Jenis='$Id_jenis'";

    mysqli_query($koneksi, $query) or die("gagal insert" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
