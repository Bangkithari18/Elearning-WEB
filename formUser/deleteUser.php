<?php
    include "../koneksi.php";
    $user_id = $_POST['user_id'];    

    if(empty($data['error'])){
        $query = " DELETE FROM tb_user WHERE user_id='$user_id'";

        mysqli_query($koneksi, $query) or die("gagal delete".mysqli_error($koneksi));
        $data = 1;
    }
    else{
        $data = 'gagal';
    }
    echo json_encode($data);
?>