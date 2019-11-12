<?php
//include 'classSanPham.php';
$stmt = $conn->prepare("SELECT * FROM dbphp_sanpham");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

$listsanpham = array();

    foreach ($result as $thongtin){

        $sanpham = new SanPham();

        $sanpham->setMasanpham($thongtin['sp_id']);
        $sanpham->setTensanpham($thongtin['sp_ten']);
        $sanpham->setSoluongsanpham($thongtin['sp_soluong']);
        $sanpham->setAnhsanpham($thongtin['sp_anh']);
        $sanpham->setGiasanpham($thongtin['sp_gia']);

        array_push($listsanpham,$sanpham);
    }


?>
