<?php
include "../koneksi.php";
$no = 1;
$query = "SELECT *, b.nama_barang AS nama_barang FROM tb_barang_keluar a INNER JOIN tb_barang b on a.barang_id = b.id_barang";
$exec = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

while ($result = mysqli_fetch_array($exec)) {
?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $result['id_keluar'] ?></td>
        <td><?php echo $result['tanggal_keluar'] ?></td>
        <td><?php echo $result['barang_id'] ?></td>
        <td><?php echo $result['nama_barang'] ?></td>
        <td><?php echo $result['jumlah_keluar'] ?></td>
        <td>
            <button class="btn btn-sm btn-warning" onclick="EditBarangkeluar('<?php echo $result['id_keluar'] ?>')" value="<?php echo $result['id_keluar'] ?>">Edit</button>
            &nbsp;<button class="btn btn-sm btn-danger" onclick="DeleteBarangKeluar('<?php echo $result['id_keluar'] ?>')" value="<?php echo $result['id_keluar'] ?>">Delete</button>
        </td>
    </tr>
<?php } ?>