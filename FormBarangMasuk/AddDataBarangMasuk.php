<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../koneksi.php";
$id_masuk = $_POST['id_masuk'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$barang_id = $_POST['barang_id'];
$jumlah_masuk = $_POST['jumlah_masuk'];
$create_date = date('Y-m-d H:i:s');
$update_by = $_SESSION['username'];

if (empty($data['error'])) {
    $query = " INSERT INTO tb_barang_masuk set id_masuk='$id_masuk', tanggal_masuk='$tanggal_masuk', 
    barang_id='$barang_id', jumlah_masuk='$jumlah_masuk', create_date= '$create_date', update_by='$update_by'";

    mysqli_query($koneksi, $query) or die("gagal insert" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = empty($data['error']);
}
echo json_encode($data);
