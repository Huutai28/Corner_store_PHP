<?php
	include "admin/handle/database.php";
	if (isset($_GET['category'])) {
		$id = $_GET['category'];

		$sql_category = "SELECT `category_id`, `category_name`,`category_image_path`  FROM `categories` WHERE `category_id` = '{$id}'";
		$result_category = $con->query($sql_category);
		$category = $result_category->fetch_assoc();

		if (isset($_GET['num_per_page'])) {
			switch ($_GET['num_per_page']) {
				case "12":
					$num_per_page = 12;
				  break;
				case "16":
					$num_per_page = 16;
				break;
				case "20":
					$num_per_page = 20;
				break;
				case "24":
					$num_per_page = 24;
				break;
				default:
					$num_per_page = 12;
			  }
		}else{
			$num_per_page = 12;
		}
		//phân trang
		if (isset($_GET['page']) && $_GET['page'] > 0) {
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
		$total_records = $con->query("SELECT `product_id` FROM `products` WHERE `product_category`= '{$id}'")->num_rows;
		$total_pages = ceil($total_records / $num_per_page);

		if ($page > $total_pages && $total_pages > 0) {
			$page = $total_pages;
		}

		$start_from = ($page - 1)*$num_per_page;
		//end - phân trang

		if (isset($_GET['sortby'])){
			switch ($_GET['sortby']) {
				case "1":
					$sortby = "ORDER by `product_name` ASC";
					$sortby_num = 1;
				  break;
				case "2":
					$sortby = "ORDER by `product_name` DESC";
					$sortby_num = 2;
				  break;
				case "3":
					$sortby = "ORDER by `product_price` ASC";
					$sortby_num = 3;
				  break;
				case "4":
					$sortby = "ORDER by `product_price` DESC";
					$sortby_num = 4;
				break;
				default:
					$sortby = "ORDER by `product_name` ASC";
					$sortby_num = 1;
			  }
		}else{
			$sortby = "ORDER by `product_name` ASC";
			$sortby_num = 1;
		}
		
		$sql_product = "SELECT `product_id`, `product_name`, `product_price`, `product_image_path` FROM `products` WHERE `product_category` = '{$id}'". $sortby ." LIMIT $start_from,$num_per_page;";
		$result_product = $con->query($sql_product);

		$sql_new_product = "SELECT `product_id`FROM `products` WHERE `product_category`	= '{$id}' ORDER BY product_id DESC LIMIT 1";
		$result_new_product = $con->query($sql_new_product);
	}else{
		header("Location: home");
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
	<base href="http://localhost/Corner_store/"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Corner Store Responsive web template, Bootstrap Web Templates" />

	<!-- //for-mobile-apps -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

</head>

<body>
	<!-- header -->
	<?php include "assets/layout/header.php"; ?>
	<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Trang chủ</a><span>|</span></li>
				<li>Pet Food</li>
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
			<div style="background: url(admin/uploads/<?php echo $category['category_image_path'];?>) no-repeat 0px 0px;
			background-size: cover;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			-ms-background-size: cover;" class="w3l_banner_nav_right_banner3 w3l_banner_nav_right_banner_pet">
				<h4 style="color: #fff;"><?php echo $category['category_name'];?></h4>
				<p>Xem sản phẩm mới nhất</p>
				<?php
				if ($result_new_product->num_rows == 1) {
					$new = $result_new_product->fetch_assoc();
				?>
				<a href="single?id=<?php echo $new['product_id']?>">Mua ngay</a>
				<?php } ?>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
				<h3 class="w3l_fruit"><?php echo $category['category_name'];?></h3>
				<?php
				if ($result_product->num_rows > 0) {
				?>
				<div class="container">
					  <div class="col-md-12 sortby">
						<form class="form-inline" method="GET" action="products">
							<input type="hidden" name="category" value="<?php echo $category['category_id'] ?>">
							<div class="form-group mx-sm-3 mb-2">
								<select id="sortby" name="sortby" class="form-control select" onchange="this.form.submit()">
									<option value="1">Sắp xếp theo: A->Z</option>
									<option value="2">Sắp xếp theo: Z->A</option>
									<option value="3" select>Sắp xếp theo: giá thấp</option>
									<option value="4">Sắp xếp theo: giá cao</option>
								</select>
							</div>
							<div class="form-group mx-sm-3 mb-2">
								<select id="num_per_page" name="num_per_page" class="form-control select" onchange="this.form.submit()">
									<option value="12">Hiển thị 12 sản phẩm</option>
									<option value="16">Hiển thị 16 sản phẩm</option>
									<option value="20">Hiển thị 20 sản phẩm</option>
									<option value="24">Hiển thị 24 sản phẩm</option>
								</select>
							</div>
						</form>
					  </div>
				</div>
				
				<div class="container">
					<div class="row w3ls_w3l_banner_nav_right_grid1_veg">
						<?php
							while ($product = $result_product->fetch_assoc()) {
						?>
						<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd w3ls_w3l_banner_nav_right_grid1" >
							<div class="hover14 column">
							<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="assets/images/offer.png" alt=" " class="img-responsive" />
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="single?id=<?php echo $product['product_id']?>"><img src="admin/uploads/<?php echo $product['product_image_path']?>" alt=" " class="img-responsive" /></a>
												<p><?php echo $product['product_name']?></p>
												<h4><?php echo number_format($product['product_price']);?> VNĐ</h4>
											</div>
											<div class="snipcart-details">
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
						<?php } ?>
					</div>
				</div>

				<div class="container clearfix">
					  <div class="col-md-12">
						<nav>
							<ul class="pagination">
								<li <?php if ($page == 1) {
									echo 'class="disabled"';
								}?>><a href="products?category=<?php echo $category['category_id'];?>&page=<?php echo $page-1;?><?php if (isset($_GET['sortby'])) { echo '&sortby='.$sortby_num; } ?><?php if (isset($_GET['num_per_page'])) { echo '&num_per_page='.$num_per_page; } ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>

								<?php
								for ($i=1; $i <= $total_pages; $i++) { 
								?>
								<li <?php if ($i == $page) { echo 'class="active"';} ?>>
									<a href="products?category=<?php echo $category['category_id'];?>&page=<?php echo $i;?><?php if (isset($_GET['sortby'])) { echo '&sortby='.$sortby_num; } ?><?php if (isset($_GET['num_per_page'])) { echo '&num_per_page='.$num_per_page; } ?>"><?php echo $i;?></a>
								</li>
								<?php } ?>
								
								<li <?php if ($page == $total_pages) {
									echo 'class="disabled"';
								}?>><a href="products?category=<?php echo $category['category_id'];?>&page=<?php echo $page+1;?><?php if (isset($_GET['sortby'])) { echo '&sortby='.$sortby_num; } ?><?php if (isset($_GET['num_per_page'])) { echo '&num_per_page='.$num_per_page; } ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
							</ul>
						</nav>
					  </div>
				</div>
				<?php }else{?>
				<div class="container-fluid  mt-100">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body cart">
									<div class="col-sm-12 empty-cart-cls text-center">
										<img src="assets/images/box.png" class="img-fluid mb-4 mr-3">
										<h3 style="margin-bottom: 1.5rem;">Danh mục này trống</h3>
										<a href="home" class="btn_empty">Tiết Tục Mua Sắm</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				

			</div>
		</div>
	</div>
<!-- //banner -->		
<!--footer-->
	<?php include "assets/layout/footer.php";?>
<!--//footer-->
<script>
	$('#sortby').val(<?php echo $sortby_num ?>);
	$('#num_per_page').val(<?php echo $num_per_page ?>);
</script>
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
