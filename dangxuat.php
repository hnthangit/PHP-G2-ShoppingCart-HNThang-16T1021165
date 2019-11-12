<?php
if(!empty($_POST["logout"])) {
    $_SESSION["user_id"] = "";
    session_destroy();
    header("Location: /phptest1/dangnhap.php");
}
?>
