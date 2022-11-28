<?php
include "admin/handle/database.php";
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

	<!-- //for-mobile-apps -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap">

</head>



<body>

	<!-- header -->
	<?php include "assets/layout/header.php"; ?>
	<!-- //header -->
	<!-- banner -->
	<div class="banner">
		<!--categroy navbar-->
		<?php include "assets/layout/navbar.php"; ?>
		<!--//categroy navbar-->
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Stay home & get
									<span>your daily</span> need's</h3>
								<div class="more">
									<a href="all-products" class="button--saqui button--round-l button--text-thick"
										data-text="Mua Ngay">Mua Ngay</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="all-products" class="button--saqui button--round-l button--text-thick"
										data-text="Mua Ngay">Mua Ngay</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>Compare & Save <i>30% Money</i> </h3>
								<div class="more">
									<a href="all-products" class="button--saqui button--round-l button--text-thick"
										data-text="Mua Ngay">Mua Ngay</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- banner -->
	<div class="container-fluid mx-lg-0">
		<div class="banner_bottom">
			<div class="wthree_banner_bottom_left_grid_sub">
			</div>
			<div class="row wthree_banner_bottom_left_grid_sub1">
				<div class="col-lg-4 col-md-6 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="assets/images/4.jpg" alt=" " class="img-fluid radius-image" />
						<div class="wthree_banner_bottom_left_grid_pos">
							<h4>Giảm giá <span>25%</span></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="assets/images/5.jpg" alt=" " class="img-fluid radius-image" />
						<div class="wthree_banner_btm_pos">
							<h3>cửa hàng <span>tạp hóa</span> tốt <i>nhất</i></h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 wthree_banner_bottom_left mt-lg-0 mt-5">
					<div class="wthree_banner_bottom_left_grid">
						<img src="assets/images/6.jpg" alt=" " class="img-fluid radius-image" />
						<div class="wthree_banner_btm_pos1">
							<h3>Tiết kiệm <span>tới</span> $10</h3>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Sản Phẩm Bán Chạy</h3>
			<div class="row agile_top_brands_grids">
				<?php
				$new_product = "SELECT `product_id`, `product_name`, `product_price`, `product_image_path` FROM `products` ORDER BY `product_id` DESC LIMIT 4;";
				$result_new_product = $con->query($new_product);
				if ($result_new_product->num_rows > 0) {
					while ($product = $result_new_product->fetch_assoc()) {
				?>
				<div class="col-lg-3 col-sm-6 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="tag"><img src="assets/images/tag.png" alt=" " class="img-fluid" /></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single?id=<?php echo $product['product_id']?>"><img title=" " alt=" " src="admin/uploads/<?php echo $product['product_image_path']?>"
													class="img-fluid" /></a>
											<p><?php echo $product['product_name']?></p>
											<h4><?php echo number_format($product['product_price']);?> VNĐ</h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
										<form class="quick-buy-form" action="#" method="post">
												<fieldset>
													<input type="hidden" value="1" name="quantity[<?php echo $product['product_id']?>]">
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
				
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //top-brands -->
	<!-- fresh-vegetables -->
	<div class="fresh-vegetables">
		<div class="container">
			<h3>Sản Phẩm Hàng Đầu</h3>
			<div class="row w3l_fresh_vegetables_grids">
				<div class="col-lg-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left pl-lg-0">
					<div class="w3l_fresh_vegetables_grid2">
						<ul>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="all-products">Tất cả sản phẩm</a>
							</li>
							<?php
							$sql_category = "SELECT `category_id`, `category_name` FROM `categories` ORDER by `category_id` ASC";
							$result_category = $con->query($sql_category);
							if ($result_category->num_rows > 0) {
								while ($category = $result_category->fetch_assoc()) {
							?>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products?category=<?php echo $category['category_id']?>"><?php echo $category['category_name']?></a>
							</li>
							<?php } }
							?>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-9 w3l_fresh_vegetables_grid_right mt-lg-0 mt-5">
					<div class="row">
						<div class="col-lg-4 w3l_fresh_vegetables_grid">
							<div class="w3l_fresh_vegetables_grid1">
								<img src="assets/images/8.jpg" alt=" " class="img-fluid radius-image" />
							</div>
						</div>
						<div class="col-lg-4 w3l_fresh_vegetables_grid">
							<div class="w3l_fresh_vegetables_grid1">
								<div class="w3l_fresh_vegetables_grid1_rel">
									<img src="assets/images/7.jpg" alt=" " class="img-fluid radius-image" />
									<div class="w3l_fresh_vegetables_grid1_rel_pos">
										<div class="more m1">
											<a href="all-products"
												class="button--saqui button--round-l button--text-thick"
												data-text="Mua Ngay">Mua Ngay</a>
										</div>
									</div>
								</div>
							</div>
							<div class="w3l_fresh_vegetables_grid1_bottom">
								<img src="assets/images/10.jpg" alt=" " class="img-fluid radius-image" />
								<div class="w3l_fresh_vegetables_grid1_bottom_pos">
									<h5>Ưu đãi<br>đặc biệt</h5>
								</div>
							</div>
						</div>
						<div class="col-lg-4 w3l_fresh_vegetables_grid mt-lg-0 mt-5">
							<div class="w3l_fresh_vegetables_grid1">
								<img src="assets/images/9.jpg" alt=" " class="img-fluid radius-image" />
							</div>
							<div class="w3l_fresh_vegetables_grid1_bottom">
								<img src="assets/images/11.jpg" alt=" " class="img-fluid radius-image" />
							</div>
						</div>

					</div>
					<div class="agileinfo_move_text">
						<div class="agileinfo_marquee">
							<h4>Được <span class="blink_me">giảm giá 25%</span> cho đơn hàng đầu tiên và cũng nhận được phiếu quà tặng</h4>
						</div>
						<div class="agileinfo_breaking_news">
							<span> </span>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
	<?php include "assets/layout/footer.php";?>
	<!--//footer-->

	<!-- flexSlider -->
	<link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" property="" />
	<script defer src="assets/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!-- //flexSlider -->
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