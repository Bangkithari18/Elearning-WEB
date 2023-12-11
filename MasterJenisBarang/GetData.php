<?php
include "../koneksi.php";
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tb_jenis_barang Order By Id_Jenis desc") or die(mysqli_error($koneksi));

while ($result = mysqli_fetch_array($query)) {
?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $result['Id_Jenis'] ?></td>
        <td><?php echo $result['Jenis'] ?></td>
        <td>
            <button class="btn btn-sm btn-warning" onclick="EditJenisBrang('<?php echo $result['Id_Jenis'] ?>')" value="<?php echo $result['Id_Jenis'] ?>">Edit</button>
            &nbsp;<button class="btn btn-sm btn-danger" onclick="DeleteJenisBrang('<?php echo $result['Id_Jenis'] ?>')" value="<?php echo $result['Id_Jenis'] ?>">Delete</button>
        </td>
    </tr>
<?php } ?>