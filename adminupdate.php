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
<?php
include_once('./model/book.php');
$listProduct = array();
$listProduct = Book::getAllForUpdate();
$book = null;
if(isset($_REQUEST["id"])){
    $book = Book::getBookById($_REQUEST["id"]);
} else {
    $book = new Book("","","","","","");
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
                <a href="adminadd.php" class="list-group-item list-group-item-action bg-light">Thêm thông tin sản phẩm</a>
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
                <form method="post" action="updateproduct.php" enctype="multipart/form-data">
                    <h1 class="mt-4">Sửa sản phẩm</h1>
                    <code>Tên sản phẩm</code> <br>
                    <input type="text" name="product-name" value="<?php echo $book->title?>"> <br>
                    <code>Giá sản phẩm</code> <br>
                    <input type="number" name="product-price" value="<?php echo $book->price?>"> <br>
                    <code>Tác giả</code> <br>
                    <input type="text" name="product-author" value="<?php echo $book->author?>"> <br>
                    <code>Mô tả sản phẩm</code> <br>
                    <textarea name="product-content" id="editor"><?php echo $book->description?></textarea> <br>
                    <code>Ảnh sản phẩm</code> <br>
                    <img src="<?php echo $book->image?>" alt="">
                    <input type="file" name="product-image" value="<?php echo $book->image?>"/> <br> <br>
                    <input type="hidden" name="product-id" value="<?php echo $book->id?>"/>
                    <input name="action" class="btn btn-outline-primary" type="submit" value="Sửa thông tin">
                </form>
                <div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listProduct as $key => $item) {
                                # code...
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $key + 1 ?></th>
                                    <td><?php echo $item->title ?></td>
                                    <td><?php echo $item->price ?></td>
                                    <td><?php echo $item->author ?></td>
                                    <td>
                                        <img style="width:100%;" src="<?php echo $item->image ?>" alt="">
                                    </td>
                                    <td><?php echo $item->description ?></td>
                                    <td>
                                        <a href="adminupdate.php?id=<?php echo $item->id?>" class="btn btn-outline-success">Chọn</a>
                                        <a href="deleteproduct.php?id=<?php echo $item->id?>" class="btn btn-outline-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

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