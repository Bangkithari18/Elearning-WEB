<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../koneksi.php";
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$jenis_barang = $_POST['jenis_barang'];
$satuan_barang = $_POST['satuan_barang'];
$stok_awal = $_POST['stok_awal'];
$harga = $_POST['harga'];
$create_date = date('Y-m-d H:i:s');
$update_by = $_SESSION['username'];

if (empty($data['error'])) {
    $query = " INSERT INTO tb_barang set id_barang='$id_barang', nama_barang='$nama_barang', 
    jenis_barang='$jenis_barang', satuan_barang='$satuan_barang', stok_awal='$stok_awal',
    harga='$harga', create_date= '$create_date', update_by='$update_by'";

    mysqli_query($koneksi, $query) or die("gagal insert" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = 'gagal';
}
echo json_encode($data);
