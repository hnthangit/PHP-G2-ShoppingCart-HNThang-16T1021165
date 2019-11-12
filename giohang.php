<?php
include_once 'classSanPham.php';
session_start();
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
if (isset($_SESSION['giohang']))
    echo "Gio hang da co";
else
    echo "Gio hang rong";
?>
<div class="container">

    <?php
    if (isset($_SESSION['giohang'])) {
    ?>
    <table class="table">
        <thead>
        <tr class="">
            <th>Ma san pham</th>
            <th>Ten san pham</th>
            <th>Anh</th>
            <th>So luong</th>
            <th>Gia</th>
        </tr>
        </thead>

        <tbody>

        <?php
        if (isset($_SESSION['giohang'])) {
            $listitem = $_SESSION['giohang'];
            foreach ($listitem as $thongtin) {
                ?>
                <tr>
                    <th><?php echo $thongtin->getMasanpham(); ?></th>
                    <th class="ten-san-pham"><?php echo $thongtin->getTensanpham(); ?></th>
                    <th><img style="height: 150px; width: 18rem;" src="<?php echo $thongtin->getAnhsanpham(); ?>"></th>
                    <th class="d-flex">
                        <button class="btn btn-primary btn-giam">-</button>
                        <input class="form-control so-luong-style" name="soluonghientai" min="1"
                               value="<?php echo $thongtin->getSoluongsanpham(); ?>">
                        <span style="display: none;" class="soluonghientai2"><?php echo $thongtin->getSoluongsanpham(); ?></span>
                        <button class="btn btn-primary btn-tang">+</button>
                    </th>
                    <th class="gia-san-pham"><?php echo $thongtin->getGiasanpham(); ?></th>
                    <th style="display: none" class="gia-san-pham2"><?php echo $thongtin->getGiasanpham(); ?></th>
                    <th>
                        <button class="btn btn-warning">Xoa</button>
                    </th>
                </tr>
                <?php
            }
        } else {
            echo "gio hang rong";
        }
        ?>

        </tbody>
    </table>
    <div style="color: red; float: right">
            <h1 class="tong-gia">
                <?php
                if (isset($_SESSION['giohang'])) {
                    $listitem = $_SESSION['giohang'];
                    $tong = 0;
                    foreach ($listitem as $thongtin) {
                        $tong += $thongtin->getGiasanpham();
                    }
                    echo $tong;
                }
                ?>
            </h1>
    </div>
    <div>
        <span class="btn btn-success">Dat mua</span>
    </div>
<?php
} else {
    echo "Gio hang rong";
}
?>


</div>

<script type="text/javascript" src="javascript/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="javascript/myscript.js"></script>
</body>
</html>