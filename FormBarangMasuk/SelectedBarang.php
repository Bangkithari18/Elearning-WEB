<?php
include "../koneksi.php";

// Validate and sanitize input
$id_barang = isset($_GET['Id']) ? $_GET['Id'] : '';

if (empty($id_barang)) {
    // Handle invalid or missing input
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

// Using prepared statements to prevent SQL injection
$query = "SELECT a.*,
    COALESCE(SUM(b.jumlah_masuk), 0) AS TotalMasuk,
    COALESCE(SUM(c.jumlah_keluar), 0) AS TotalKeluar,
    (a.stok_awal + COALESCE(SUM(b.jumlah_masuk), 0) - COALESCE(SUM(c.jumlah_keluar), 0)) AS StokSaatini
    FROM tb_barang a 
    LEFT JOIN tb_barang_masuk b ON a.id_barang = b.barang_id
    LEFT JOIN tb_barang_keluar c ON a.id_barang = c.barang_id
    WHERE a.id_barang = ?
    GROUP BY a.id_barang";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "s", $id_barang);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    // Handle query error
    echo json_encode(['error' => 'Query failed: ' . mysqli_error($koneksi)]);
    exit;
}

$arrayBarang = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($arrayBarang);

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
