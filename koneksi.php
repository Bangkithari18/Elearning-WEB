<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "db_project_web";

    $koneksi = mysqli_connect($server, $user, $pass, $dbname);

    if(mysqli_connect_error()){
        echo "Koneksi database error : " .mysqli_connect_error();
    }
?>