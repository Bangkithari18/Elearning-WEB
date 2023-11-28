<?php
include "../koneksi.php";
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tb_satuan Order By id_satuan desc") or die(mysqli_error($koneksi));

while ($result = mysqli_fetch_array($query)) {
?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $result['id_satuan'] ?></td>
        <td><?php echo $result['satuan'] ?></td>
        <td>
            <button class="btn btn-sm btn-warning" onclick="EditDataSatuan('<?php echo $result['id_satuan'] ?>')" value="<?php echo $result['id_satuan'] ?>">Edit</button>
            &nbsp;<button class="btn btn-sm btn-danger" onclick="DeleteDataSatuan('<?php echo $result['id_satuan'] ?>')" value="<?php echo $result['id_satuan'] ?>">Delete</button>
        </td>
    </tr>
<?php } ?>