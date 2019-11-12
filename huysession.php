<?php
session_start();
unset($_SESSION["giohang"]);
header("Location: http://localhost/phptest1/sanpham.php");