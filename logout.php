<?php 
session_start();
unset($_SESSION["cart"]);
unset($_SESSION["user"]);
header("location:login.php");
?>