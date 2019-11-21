<?php
include_once './model/book.php';
//session_start();
//include 'dangxuat.php';
//include '../utils/ketnoidb.php';
// if(isset($_SESSION['user_id']))
//    echo "nguoi dung da dang nhap";
// else
//     echo "nguoi dung chua dang nhap"
$lsbook = array();
$lsbook = Book::getAll();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="ajax"></div>

    <div class="d-flex justify-content-around navbar">
        <?php
        if(isset($_SESSION['user_id'])){
            echo "nguoi dung da dang nhap";
            ?>
            <span>Chao mung <?php echo $_SESSION['user_id']?></span>
            <form action="" method="post">
                <input type="submit" name="logout" class="dangky-dangnhap btn btn-danger" value="Dang xuat"></input>
            </form>
            <?php
        } else {
            echo "nguoi dung chua dang nhap";
            ?>
            <a class="btn btn-primary dangky-dangnhap" href="/phptest1/dangnhap.php">Dang nhap</a>
           <a class="btn btn-success dangky-dangnhap" href="/phptest1/dangky.php">Dang ky</a>
            <?php
        }
        ?>

        <a href="giohang.php">Gio hang
            <span class="so-luong-gio-hang">
                <?php
                   if (isset($_SESSION['giohang']))
                       echo sizeof($_SESSION['giohang']);
                    else
                        echo 0;
                ?>
            </span>
        </a>
    </div>

    <div class="row">
        <?php
        include 'xulisanpham.php';
        foreach ($lsbook as $item) {
            ?>
            <div class="col-md-3 col-sm-6" >
                <div class="card" style="width: 18rem;">
                    <img style="height: 150px;" src="<?php echo $motsanpham->getAnhsanpham() ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title masanpham" data-masanpham="<?php echo $motsanpham->getMasanpham()?>"><?php echo $motsanpham->getTensanpham() ?></h5>
                        <div>
                            <span class="card-link gia-san-pham"><?php echo $motsanpham->getGiasanpham()?></span>
                            <span class="card-link">500000000</span>
                            <span class="card-link">-50%</span>
                        </div>
                        <div>
                            <a href="#" class="card-link them-vao-gio-hang">Them vao gio hang</a>
                            <a href="#" class="card-link">Them vao wishlist</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

</div>
<div>
    <a href="huysession.php">Huy session gio hang</a>
<!--    --><?php
//    if (isset($_SESSION['giohang']))
//        print_r($_SESSION['giohang']);
//    else
//        echo 0;
//    ?>
</div>
<script type="text/javascript" src="javascript/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="javascript/myscript.js"></script>

</body>
</html>


































