<?php
    session_start();
    session_unset(); // clear all session variables
    session_destroy(); // destroy the session
    header('location:../login.php');
    exit(); // ensure no further code is executed after the redirection
?>
