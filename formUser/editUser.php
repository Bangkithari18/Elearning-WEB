<?php
    include "../koneksi.php";
    $user_id = $_POST['user_id'];    
    $username = $_POST['username'];    
    $password = $_POST['password'];    
    $status = $_POST['status'];    
    $create_date = date('Y-m-d H:i:s');    

    if(empty($data['error'])){
        $query = " UPDATE tb_user set username='$username', password='$password', status='$status', create_date= '$create_date' WHERE user_id='$user_id'";

        mysqli_query($koneksi, $query) or die("gagal insert".mysqli_error($koneksi));
        $data = 1;
    }
    else{
        $data = 'gagal';
    }
    echo json_encode($data);
?>