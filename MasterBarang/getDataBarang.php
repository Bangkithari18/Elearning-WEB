<?php
include "../koneksi.php";
$no = 1;
$query = "SELECT *, b.satuan AS nama_satuan, c.jenis AS jenis_satuan FROM tb_barang a INNER JOIN tb_satuan b on a.satuan_barang = b.id_satuan INNER JOIN tb_jenis_barang c on a.jenis_barang = c.Id_Jenis";
$exec = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

while ($result = mysqli_fetch_array($exec)) {
?>
    <tr>
        <td><input type="checkbox" name="chk_barang" id="selected_barang" class="chk_barang" value="<?php echo $result['id_barang'] ?>"></td>
        <td><?php echo $result['id_barang'] ?></td>
        <td><?php echo $result['nama_barang'] ?></td>
        <td><?php echo $result['jenis_satuan'] ?></td>
        <td><?php echo $result['nama_satuan'] ?></td>
        <td><?php echo $result['stok_awal'] ?></td>
        <td><?php echo $result['harga'] ?></td>
    </tr>
<?php } ?>