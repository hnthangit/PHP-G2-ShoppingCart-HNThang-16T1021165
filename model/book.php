<?php
class Book {
    private $id;
    private $title;
    private $price;
    private $author;
    private $image;
    private $description;

    public function __set($key, $value)
    {
        //kiểm tra xem trong class có tồn tại thuộc tính không
        if (property_exists($this, $key)) {
            //tiến hành gán giá trị
            $this->$key = $value;
        } else {
            die('Không tồn tại thuộc tính');
        }
    }

    public function __get($key)
    {
        //kiểm tra xem trong class có tồn tại thuộc tính không
        if (property_exists($this, $key)) {
            //tiến hành lấy giá trị
            return $this->$key;
        } else {
            die('Không tồn tại thuộc tính');
        }
    }

    #Construct function
    function __construct($id, $title, $price, $author, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price= $price;
        $this->author = $author;
        $this->image = $image;
    }

    static function withDescription($id, $title, $price, $author, $image, $description) {
        $instance = new self($id, $title, $price, $author, $image);
        $instance->description = $description;
        return $instance;
    }



    static function connect()
    {
        $con = new mysqli("localhost", "root", "", "bookshop");
        $con->set_charset("utf8");
        if ($con->connect_error)
            die("Kết nốt thất bại. Chi tiết: " . $con->connect_error);
        //echo "<h1>Kết nối thành công</h1>";
        return $con;
    }

    static function getAll()
    {
        //Bước1: tạo kếtCRUD
        $con = Book::connect();
        //Bước2: Thao tác với CSDL: CRUD
        $sql = "SELECT * FROM `book`";
        $result = $con->query($sql);
        $lsbook = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                # code...
                $book = new Book($row["Id"], $row["Title"], $row["Price"], $row["Author"], $row["Image"]);
                array_push($lsbook, $book);
            }
        }
        //Bước3: Đóng kết nối
        $con->close();
        return $lsbook;
    }

    static function getAllForUpdate()
    {
        //Bước1: tạo kếtCRUD
        $con = Book::connect();
        //Bước2: Thao tác với CSDL: CRUD
        $sql = "SELECT * FROM `book`";
        $result = $con->query($sql);
        $lsbook = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                # code...
                $book = Book::withDescription($row["Id"], $row["Title"], $row["Price"], $row["Author"], $row["Image"], $row["Description"]);
                array_push($lsbook, $book);
            }
        }
        //Bước3: Đóng kết nối
        $con->close();
        return $lsbook;
    }

    static function getBookById($id)
    {
        //Bước1: tạo kếtCRUD
        $con = Book::connect();
        //Bước2: Thao tác với CSDL: CRUD
        $sql = "SELECT * FROM `book` where `Id`=$id";
        $result = $con->query($sql);
        $book = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                # code...
                $book = Book::withDescription($row["Id"], $row["Title"], $row["Price"], $row["Author"], $row["Image"], $row["Description"]);
                break;
            }
        }
        //Bước3: Đóng kết nối
        $con->close();
        return $book;
    }

    static function addBook($title, $price, $author, $image, $description)
    {

        $con = Book::connect();
        $sql = "INSERT INTO `book`(`Title`, `Price`, `Author`, `Image`, `Description`) VALUES ('$title', $price, '$author', '$image', '$description');";
        if ($con->query($sql) == true) {
            echo "Thêm thành công";
        } else {
            echo "Thêm thất bại";
        }
        $con->close();
    }

    static function updateBook($id, $title, $price, $author, $image, $description)
    {

        $con = Book::connect();
        $sql = "UPDATE `book` SET `Title`='$title',`Price`=$price,`Author`='$author',`Image`='$image',`Description`='$description' WHERE `Id`=$id";
        if ($con->query($sql) == true) {
            echo "update thành công";
        } else {
            echo "update thất bại";
        }
        $con->close();
    }

    static function deleteBook($id)
    {

        $con = Book::connect();
        $sql = "DELETE FROM `book` WHERE `Id`=$id";
        if ($con->query($sql) == true) {
            echo "del thành công";
        } else {
            echo "del thất bại";
        }
        $con->close();
    }

}

?>
