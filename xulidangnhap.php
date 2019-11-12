<?php
//bat dau session
session_start();
include 'ketnoidb.php';
if(isset($_SESSION['user_id']))
    header("Location: /phptest1/sanpham.php");
else
    echo "nguoi dung chua dang nhap";
$email = "abc";
$matkhau = "123";
//$stmt = $conn->prepare("SELECT u_id, u_matkhau FROM dbphp_user");
$stmt = $conn->prepare("SELECT u_id, u_matkhau FROM dbphp_user where u_id='".$email."' and u_matkhau='".$matkhau."'");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

foreach ($result as $nguoidung){
    echo $nguoidung['u_id']." ".$nguoidung['u_matkhau'];
}

//kiem tra xem neu ko phai trung voi thong tin trong db thi se thong bao sai
$thongbaodangnhapsai = "";
if(!empty($_POST['login'])){
    //select cac thong tin voi email va mat khau vua nhap
    $stmt = $conn->prepare("SELECT u_id, u_matkhau FROM dbphp_user where u_id='".$_POST['email']."' and u_matkhau='".$_POST['matkhau']."'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    //kiem tra xem result tra ve co phai la 1 mang ko neu la 1 mang thi dat session id = u_id
    //neu ko thi thong bao loi
    if(!empty($result)){

        foreach ($result as $nguoidung){
            echo $nguoidung['u_id']." ".$nguoidung['u_matkhau'];
            $_SESSION['user_id']= $nguoidung['u_id'];
            header("Location: /phptest1/sanpham.php");
        }

    } else {
        $thongbaodangnhapsai = "Email hoac mat khau sai";
    }

}
?>

