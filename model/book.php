<?php
class Book {
    private $id;
    private $title;
    private $price;
    private $author;
    private $image;

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
                $book = new Book($row["Id"], $row["Title"], $row["Price"], $row["Author"], $row["Image"]);
                break;
            }
        }
        //Bước3: Đóng kết nối
        $con->close();
        return $book;
    }

}

?>
