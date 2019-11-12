<html>
<body>
<?php
    $loitenrong = $loiemailrong = $loimatkhaurong = $loigioitinhrong = "";
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        if(empty($_POST["ten"]))
            $loitenrong = "Ten phai duoc nhap";
        if(empty($_POST["email"]))
            $loiemailrong = "Email phai duoc nhap";
        if(empty($_POST["matkhau"]))
            $loimatkhaurong = "Mat khau phai duoc nhap";
        if(empty($_POST["gioitinh"]))
            $loigioitinhrong = "Gioi tinh phai duoc chon";
    }
?>
<form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> >
<label>Ten: </label>
    <input type="text" name="ten"><?php echo $loitenrong?><br><br>
<label>Email: </label>
    <input type="text" name="email"><?php echo $loiemailrong?><br><br>
<label>Mat khau: </label>
    <input type="text" name="matkhau"><?php echo $loimatkhaurong?><br><br>
<label>Chu thich: </label>
    <textarea name="chuthich" rows="5" cols="40"></textarea><br><br>
<label>Gioi tinh: </label>
<input type="radio" name="gioitinh" value="nu">Nu
<input type="radio" name="gioitinh" value="nam">Nam<?php echo $loigioitinhrong?>
<br><br>
    <input type="submit" value="Dang ky">

</form>
</body>
</html>