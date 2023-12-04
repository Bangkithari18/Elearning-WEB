<?php
include "../koneksi.php";
$no = 1;
$query = "SELECT *, b.nama_barang AS nama_barang FROM tb_barang_masuk a INNER JOIN tb_barang b on a.barang_id = b.id_barang";
$exec = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

while ($result = mysqli_fetch_array($exec)) {
?>
    <tr>
        <td><input type="checkbox" name="chk_barang" id="selected_barang" class="chk_barang" value="<?php echo $result['id_masuk'] ?>"></td>
        <td><?php echo $no++ ?></td>
        <td><?php echo $result['id_masuk'] ?></td>
        <td><?php echo $result['tanggal_masuk'] ?></td>
        <td><?php echo $result['barang_id'] ?></td>
        <td><?php echo $result['nama_barang'] ?></td>
        <td><?php echo $result['jumlah_masuk'] ?></td>
        <td>
            <button class="btn btn-sm btn-warning" onclick="EditBarangMasuk('<?php echo $result['id_masuk'] ?>')" value="<?php echo $result['id_masuk'] ?>">Edit</button>
            &nbsp;<button class="btn btn-sm btn-danger" onclick="DeleteBarangMasuk('<?php echo $result['id_masuk'] ?>')" value="<?php echo $result['id_masuk'] ?>">Delete</button>
        </td>
    </tr>
<?php } ?>