<?php
class User {
    private $id;
    private $username;
    private $password;
    private $name;
    private $role;

    public function __construct($id, $username, $password, $name, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->role = $role;
    }

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

    static function connect()
    {
        $con = new mysqli("localhost", "root", "", "bookshop");
        $con->set_charset("utf8");
        if ($con->connect_error)
            die("Kết nốt thất bại. Chi tiết: " . $con->connect_error);
        //echo "<h1>Kết nối thành công</h1>";
        return $con;
    }

    public static function getUser($username, $password){
        //Bước1: tạo kếtCRUD
        $con = User::connect();
        //Bước2: Thao tác với CSDL: CRUD
        $sql = "SELECT * FROM `user` where `Username`='$username' and `Password`='$password'";
        $result = $con->query($sql);
        $user = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                # code...
                $user = new User($row["Id"], $row["Username"], $row["Password"], $row["Name"], $row["Role"]);
                break;
            }
        }
        //Bước3: Đóng kết nối
        $con->close();
        return $user;
    }

}

?>
