<?php
class Cart {
    private $id;
    private $title;
    private $price;
    private $quantity;
    private $sum;
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
    function __construct($id, $title, $price, $quantity, $sum, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price= $price;
        $this->quantity = $quantity;
        $this->sum = $sum;
        $this->image = $image;
    }

}

?>
