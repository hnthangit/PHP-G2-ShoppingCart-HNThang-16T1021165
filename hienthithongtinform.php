<html>
<body>

<h1>
    Chao mung cac ban den voi trang web php
</h1>
    <br>
    <br>
<br>
<br>
<h3>
    Ten vua nhap la:
</h3>
<h4 style="color: red">
    <?php
    echo $_POST["ten"];
    ?>
</h4>
<h3>
    Email vua nhap la:
</h3>
<h4 style="color: red">
    <?php
       echo $_POST["email"];
    ?>
</h4>
    <br>
    <br>
<h3>
    Mat khau vua nhap la:
</h3>
<h4 style="color: red">
    <?php
       echo $_POST["matkhau"];
    ?>
</h4>
<br>
<br>
<h3>
    Chu thich vua nhap la:
</h3>
<h4 style="color: red">
    <?php
    echo $_POST["chuthich"];
    ?>
</h4>
<br>
<br>
<h3>
    Gioi tinh vua nhap la:
</h3>
<h4 style="color: red">
    <?php
    echo $_POST["gioitinh"];
    ?>
</h4>



</body>
</html>