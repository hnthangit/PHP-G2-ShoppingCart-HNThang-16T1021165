<?php 
$target_dir = "image_sach/";
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
	//echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
  $function_number = $_GET['CKEditorFuncNum'];
  $url = $target_file;
  $message = '';
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>