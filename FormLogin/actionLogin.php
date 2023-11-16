<?php
    include "../koneksi.php";
    $username = $_POST['username'];    
    $password = $_POST['password'];    

    $response = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' and password='$password' and status='1'");
    $login = mysqli_num_rows($response);
    if($login > 0){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'active';
        header('location:../index.php');
    }
    else{
        echo '<script>alert("Username atau Password Salah !!!"); window.location.href="../login.php"</script>';
    }
?>