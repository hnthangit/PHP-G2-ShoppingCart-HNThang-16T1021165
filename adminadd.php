<?php 
include_once("model/user.php");
session_start();
if(isset($_SESSION["user"])){
  $user = $_SESSION["user"];
  if($user->role==0)
    header("location:index.php");
}else {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Trang Admin</div>
      <div class="list-group list-group-flush">
      <a href="addproduct.php" class="list-group-item list-group-item-action bg-light">Thêm thông tin sản phẩm</a>
        <a href="adminupdate.php" class="list-group-item list-group-item-action bg-light">Sửa thông tin sản phẩm</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Thu gọn menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Đăng xuất</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <form method="post" action="addproduct.php" enctype="multipart/form-data">
          <h1 class="mt-4">Thêm sản phẩm</h1>
          <code>Tên sản phẩm</code> <br>
          <input type="text" name="product-name"> <br>
          <code>Giá sản phẩm</code> <br>
          <input type="number" name="product-price"> <br>
          <code>Tác giả</code> <br>
          <input type="text" name="product-author"> <br>
          <code>Mô tả sản phẩm</code> <br>
          <textarea name="product-content" id="editor"></textarea> <br>
          <code>Ảnh sản phẩm</code> <br>
          <input type="file" name="product-image" /> <br> <br>
          <input name="action" class="btn btn-outline-primary" type="submit" value="Đăng thông tin">
        </form>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('editor', {
        filebrowserUploadUrl: 'upload.php',
        filebrowserUploadMethod: 'form',
      });
    </script>

</body>
</html>