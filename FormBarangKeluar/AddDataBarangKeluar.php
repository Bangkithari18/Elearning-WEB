<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../koneksi.php";
$id_keluar = $_POST['id_keluar'];
$tanggal_keluar = $_POST['tanggal_keluar'];
$barang_id = $_POST['barang_id'];
$jumlah_keluar = $_POST['jumlah_keluar'];
$create_date = date('Y-m-d H:i:s');
$update_by = $_SESSION['username'];

if (empty($data['error'])) {
    $query = " INSERT INTO tb_barang_keluar set id_keluar='$id_keluar', tanggal_keluar='$tanggal_keluar', 
    barang_id='$barang_id', jumlah_keluar='$jumlah_keluar', create_date= '$create_date', update_by='$update_by'";

    mysqli_query($koneksi, $query) or die("gagal insert" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = empty($data['error']);
}
echo json_encode($data);
