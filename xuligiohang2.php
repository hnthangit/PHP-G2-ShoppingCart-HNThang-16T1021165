<?php
//include_once 'classSanPham.php';
function getTenSanPham($masanpham){

//ket noi db va hien thi cac du lieu co trong db
    $servername = "localhost";
    $username = "root";
    $password = "1234";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=dbphp", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        //echo "Connection failed: " . $e->getMessage();
    }
    $stmt = $conn->prepare("SELECT * FROM dbphp_sanpham WHERE sp_id='".$masanpham."'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach ($result as $thongtin){
        return $thongtin['sp_ten'];
    }
}

function themGioHang ($masanpham,$anhsanpham, $giasanpham)
{
    global $listgiohang;
    //$bientrunggian = (array) $listgiohang;
    //print_r($listgiohang);
    $count = 0;
    //echo array_search($masanpham,$listgiohang);
    // array_push($listgiohang,['thongbao' => 2]);
    //print_r($listgiohang);
    foreach ($listgiohang as $itemgiohang){
        //print_r($itemgiohang);
        if ($itemgiohang->getMasanpham()==$masanpham) {
            $count = 1;
            break;
        }
    }
    if($count == 0 ){
        $sanpham = new SanPham();

            $sanpham->setMasanpham($masanpham);
            $sanpham->setTensanpham(getTenSanPham($masanpham));
            $sanpham->setSoluongsanpham(1);
            $sanpham->setAnhsanpham($anhsanpham);
            $sanpham ->setGiasanpham($giasanpham);


            //print_r($sanpham);
            // echo $sanpham->getMasanpham();

            array_push($listgiohang, $sanpham);
            //return json_encode($listgiohang);

            $giatritrave = ['thongbao' => 1];
    }else {
        $giatritrave = ['thongbao' => 2];
    }
    return $giatritrave;
}
?>