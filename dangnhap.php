    <?php
     include 'xulidangnhap.php';
    ?>

    <html>

    <body>
    <?php
        if(empty($_SESSION['user_id'])){
    ?>
    <!--noi dung form-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Email: </label>
        <input type="text" name="email">
        <br>
        <br>
        <label>Mat Khau: </label>
        <input type="text" name="matkhau">
        <br>
        <br>

        <input type="submit" value="Dang Nhap" name="login">

        <!--neu co loi thi in ra-->
        <div style="color: red">
            <?php
                if(isset($thongbaodangnhapsai))
                    echo $thongbaodangnhapsai;
            ?>
        </div>
    </form>
    <?php
    } else {
            echo "ban da dang nhap";
            ?>
            <div>
                <form action="" method="post">
                    <input type="submit" value="dang xuat" name="logout">
                </form>
            </div>

            <?php
        }
    ?>
    </body>
    </html>

