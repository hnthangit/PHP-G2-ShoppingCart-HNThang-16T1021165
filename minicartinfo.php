<?php
include_once './model/book.php';
include_once './model/cart.php';
session_start();

//Khởi tạo giỏ hàng rỗng
$cart = array();

//Lấy giỏ hàng từ session ra
if(isset($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
}

$temp = 0;
foreach ($cart as $item) {
    # code...
    if($_REQUEST["id"]==$item->id){
        $item->quantity+=$_REQUEST["quantity"];
        $item->sum= $item->quantity * $item->price;
        $temp++;
        break;
    }

}

if($temp==0){
    $book = new Cart($_REQUEST["id"], $_REQUEST["title"], $_REQUEST["price"], $_REQUEST["quantity"], $_REQUEST["price"], $_REQUEST["image"]);
    //Thêm vào giỏ hàng
    array_push($cart, $book);
}

$sum = 0;
foreach ($cart as $item) {
	# code...
	$sum += $item->sum;
}


//Thêm giỏ hàng vào session
$_SESSION['cart'] = $cart;

?>
        <div class="micart__close">
            <span>close</span>
        </div>
        <div class="items-total d-flex justify-content-between">
            <span><?php echo sizeof($cart)?> items</span>
            <span>Cart Subtotal</span>
        </div>
        <div class="total_amount text-right">
            <span><?php echo $sum ?></span>
        </div>
        <div class="mini_action checkout">
            <a class="checkout__btn" href="cart.html">Go to Checkout</a>
        </div>
        <div class="single__items" style="overflow-y: scroll; height:150px;">
            <div class="miniproduct">
                <?php foreach ($cart as $item) {
                    # code...
                    ?>
                    <div class="item01 d-flex mt--20">
                        <div class="thumb">
                            <a href="product-details.html"><img src="<?php echo $item->image?>" alt="product images"></a>
                        </div>
                        <div class="content">
                            <h6><a href="product-details.html"><?php echo $item->title?></a></h6>
                            <span class="prize"><?php echo $item->price ?>đ</span>
                            <div class="product_prize d-flex justify-content-between">
                                <span class="qun">Qty: <?php echo $item->quantity?></span>
                                <ul class="d-flex justify-content-end">
                                    <li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
                                    <li><a href="#"><i data-id="<?php echo $item->id?>" class="zmdi zmdi-delete"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
        <div class="mini_action cart">
            <a class="cart__btn" href="cart.php">View and edit cart</a>
        </div>

