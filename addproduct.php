<?php 
include_once('./model/book.php');
if(isset($_REQUEST["action"])){
    $editor_data = $_POST['product-content'];
    
    #region Upload Image and get image link
    $target_dir = "image_sach/";
    $target_file = $target_dir . basename($_FILES["product-image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file);
    #endregion

    Book::addBook($_REQUEST["product-name"],$_REQUEST["product-price"], $_REQUEST["product-author"], $target_file, $editor_data);
    header('Location: '.'adminadd.php');
} else {
    echo 'Sai';
    echo $_REQUEST["product-name"]. " ";
    echo $_REQUEST["product-price"]. " ";
    echo $_REQUEST["editor"]. " ";
    echo $_REQUEST["product-image"]. " ";
    echo $_REQUEST["product-author"]. " ";

}
?>