<?php 
include_once './model/book.php';
include_once './model/cart.php';
session_start();
$cart = array();
if (isset($_SESSION["cart"])) {
	$cart = $_SESSION["cart"];
}
echo sizeof($cart);
?>