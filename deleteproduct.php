<?php 
include_once('./model/book.php');
Book::deleteBook($_REQUEST["id"]);
header('Location: '.'adminupdate.php');
?>