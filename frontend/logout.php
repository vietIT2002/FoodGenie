<?php
    session_start();
    session_destroy();
    unset($_SESSION['ten_dangnhap']);
    header('Location: ../index.php');
    exit();
?>