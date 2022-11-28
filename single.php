<?php
include "admin/handle/database.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql_product = "SELECT `product_id`, `product_name`, `product_price`, `product_image_path`, `product_description`FROM `products` WHERE `product_id` = '{$id}'";
	$result_product = $con->query($sql_product);

	$sql_other = "SELECT `product_id`, `product_name`, `product_price`, `product_image_path`FROM `products` WHERE `product_id` != '{$id}' ORDER BY RAND() LIMIT 9";
	$result_other = $con->query($sql_other);
}else{
	header("Location: index.php");
}

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html>

<head>
	<title>Bách Hóa</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Corner Store Responsive web template, Bootstrap Web Templates" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="/assets/css/font-awesome.min.css">

</head>

<body>
<!-- header -->
<?php include "assets/layout/header.php"; ?>
<!-- //header -->
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
	<div class="container">
		<ul>
			<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
			<li>Single Page</li>
		</ul>
	</div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
	<!--categroy navbar-->
	<?php include "assets/layout/navbar.php"; ?>
	<!--//categroy navbar-->
	<div class="w3l_banner_nav_right">
	<div class="w3l_banner_nav_right_banner3" style="background: url(assets/images/3.jpg) no-repeat 0px 0px;
		background-size: cover;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		-ms-background-size: cover;">
			<h3>Ưu đãi cho sản phẩm mới<span class="blink_me"></span></h3>
		</div>
		<?php
		if ($result_product->num_rows == 1) {
			$product = $result_product->fetch_assoc();
		?>
		<div class="agileinfo_single">
			<h5><?php echo $product['product_name']?></h5>
			<div class="row">
				<div class="col-md-4 agileinfo_single_left">
					<img width="100%" height="100%" src="admin/uploads/<?php echo $product['product_image_path']?>" alt=" " class="img-fluid" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Mô tả :</h4>
						<p><?php echo $product['product_description'] ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4><?php echo number_format($product['product_price']) ?>VNĐ</h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
						<form class="quick-buy-form" action="#" method="post">
							<fieldset>
								<input type="hidden" value="1" name="quantity[<?php echo $product['product_id']?>]">
								<input type="submit" name="submit" value="Thêm vào giỏ"
									class="button" />
							</fieldset>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<!-- //banner -->
<!-- brands -->
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
	<div class="container">
		<h3>Sản Phẩm Liên Quan</h3>
			<div class="row pro-grids-inn">
				<?php
				if($result_other->num_rows > 0){
					while($other = $result_other->fetch_assoc()){
				?>
				<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_nav_right_grid1">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="assets/images/offer.png" alt=" " class="img-fluid" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single?id=<?php echo $other['product_id']?>"><img src="admin/uploads/<?php echo $other['product_image_path']?>" alt=" "
													class="img-fluid" /></a>
											<p><?php echo $other['product_name'] ?></p>
											<h4><?php echo number_format($other['product_price']) ?>VNĐ</h4>
										</div>
										<div class="snipcart-details">
											<form class="quick-buy-form" action="#" method="post">
												<fieldset>
													<input type="hidden" value="1" name="quantity[<?php echo $other['product_id']?>]">
													<input type="submit" name="submit" value="Thêm vào giỏ"
														class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				<?php } } ?>
			</div>
	</div>
</div>
<!-- //brands -->
<!--footer-->
<?php include "assets/layout/footer.php";?>
<!--//footer-->	
<script>
	$(".quick-buy-form").submit(function (event) {
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: 'handle_cart/process_cart.php?action=add',
			data: $(this).serializeArray(),
			dataType : "JSON",
			success: function (response) {
				swal({
					title: "Thông báo!",
					text: response.message,
					icon: response.style,
					button: "Thoát",
				})
			}
		});
	});
</script>

</body>

</html>