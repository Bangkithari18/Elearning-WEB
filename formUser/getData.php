<?php
    include "../koneksi.php";
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM tb_user Order By user_id asc") or die(mysqli_error($koneksi));

    while($result = mysqli_fetch_array($query)){
        ?>
    <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $result['user_id']?></td>
        <td><?php echo $result['username']?></td>
        <td><?php echo $result['password']?></td>
        <td><?php if($result['status'] == 1) {echo "Aktif";}else{echo "Tidak Aktif";}?></td>
        <td><button class="btn btn-sm btn-warning">Edit</button>&nbsp;<button class="btn btn-sm btn-danger">Delete</button></td>
    </tr>
<?php }?>