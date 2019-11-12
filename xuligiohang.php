<?php
include_once 'classSanPham.php';
session_start();
header('Content-Type: application/json');

include 'xuligiohang2.php';

$listgiohang= array();

if(isset($_POST['masanpham'])){
    $masanpham = $_POST['masanpham'];
    $anhsanpham = $_POST['anhsanpham'];
    $giasanpham = $_POST['giasanpham'];
    if(isset($_SESSION['giohang'])){
        $listgiohang = $_SESSION['giohang'];
    } else {
        $_SESSION['giohang'] = $listgiohang;
    }
    echo json_encode(themGioHang($masanpham,$anhsanpham,$giasanpham,$listgiohang));
    $_SESSION['giohang']=$listgiohang;
}

//global $listgiohang;







?>
