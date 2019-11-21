<?php
include_once("./header.php")
?>
<?php
include_once './model/book.php';
include_once './model/cart.php';
$cart = array();
if (isset($_SESSION["cart"])) {
	$cart = $_SESSION["cart"];
}
$sum = 0;
foreach ($cart as $item) {
	# code...
	$sum += $item->sum;
}
?>
<!-- cart-main-area start -->
<div class="cart-main-area section-padding--lg bg--white">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 ol-lg-12">
				<form action="#">
					<div class="table-content wnro__table table-responsive">
						<table>
							<thead>
								<tr class="title-top">
									<th class="product-thumbnail">Image</th>
									<th class="product-name">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">Total</th>
									<th class="product-remove">Remove</th>
								</tr>
							</thead>
							<tbody>

								<?php foreach ($cart as $item) {
									# code...
									?>

									<tr>
										<td class="product-thumbnail"><a href="#"><img src="<?php echo $item->image ?>" alt="product img"></a></td>
										<td class="product-name"><a href="#"><?php echo $item->title ?></a></td>
										<td class="product-price"><span class="amount"><?php echo $item->price ?></span></td>
										<td class="product-quantity"><input class="quantity" data-id="<?php echo $item->id ?>" type="number" value="<?php echo $item->quantity ?>"></td>
										<td class="product-subtotal"><?php echo $item->sum ?></td>
										<td data-id="<?php echo $item->id ?>" class="product-remove"><a href="#">X</a></td>
									</tr>

								<?php } ?>

							</tbody>
						</table>
					</div>
				</form>
				<div class="cartbox__btn">
					<ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
						<li><a href="#">Coupon Code</a></li>
						<li><a href="#">Apply Code</a></li>
						<li><a href="#">Update Cart</a></li>
						<li><a href="#">Check Out</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 offset-lg-6">
				<div class="cartbox__total__area">
					<div class="cart__total__amount">
						<span>Grand Total</span>

						<span class="total"><?php echo $sum?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- cart-main-area end -->

<?php
include_once("./footer.php");
?>