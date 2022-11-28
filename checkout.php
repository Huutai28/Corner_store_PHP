<?php
include "admin/handle/database.php";
session_start();
$sql_province = "SELECT * FROM `tinhthanhpho`";
$result_province = $con->query($sql_province);
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
			<li>Checkout</li>
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
		<!-- about -->
		<div class="privacy about typo">
			<h3>Thanh Toán<span></span></h3>
			<div class="checkout-right">
				<h4>Giỏ hàng của bạn chứa: <span>3 sản phẩm</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>#</th>
							<th>Sản Phẩm</th>
							<th>Số Lượng</th>
							<th>Tên Sản Phẩm</th>

							<th>Đơn Giá</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody id="displayCart">
					</tbody>
				</table>
			</div>
			<div class="row checkout-left">
				<div class="col-md-4 checkout-left-basket">
					<h4>Tiết tục mua</h4>
					<ul id="displayOrder">
					</ul>
				</div>
				<div class="col-md-8 address_form_agile pl-lg-5">
					<h4>Thông tin giao hàng</h4>
					<form id="form-order" method="post" class="creditly-card-form agileinfo_form">
						<section class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row form-group">
									<div class="controls">
										<label class="control-label" for="name">Họ Tên: </label>
										<input class="billing-address-name form-control" type="text" name="name" id="name"
											placeholder="Nhập họ tên" required>
									</div>

									<div class="controls">
										<label class="control-label" for="phone">Số Điện Thoại:</label>
										<input class="form-control" type="number" name="phone" id="phone" oninput="check(this)" placeholder="Nhập số điện thoại" required>
										<script>
											//hàm validation trường nhập số điện thoại
											function check(input) {
												var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
												var value = document.getElementById("phone").value;
												if (isNaN(value)) {
													input.setCustomValidity('Số điện thoại phải là số.');
												}else if (vnf_regex.test(input.value) == false) {
													input.setCustomValidity('Số điện thoại không đúng.');
												} else {
													//Hết lỗi, reset message
													input.setCustomValidity('');
												}
											}
										</script>
									</div>

									<div class="controls">
										<label class="control-label">Tỉnh /Thành Phố: </label>
										<select class="form-control option-w3ls" name="province" id="province" required>
											<option value="">--Chọn tỉnh/thành phố--</option>
											<?php
											if ($result_province->num_rows > 0) {
												while ($province = $result_province->fetch_assoc()) {
											?>
											<option value="<?php echo $province['matp']?>"><?php echo $province['name']?></option>
											<?php } } ?>
										</select>
									</div>

									<div class="controls">
										<label class="control-label">Quận /Huyện: </label>
										<select class="form-control option-w3ls" name="district" id="district" required>
											<option value="">--Chọn quận/huyện--</option>
										</select>
									</div>
									<div class="controls">
										<label class="control-label">Xã /Phường: </label>
										<select class="form-control option-w3ls" name="ward" id="ward" required>
											<option value="">--Chọn xã/phường--</option>
										</select>
									</div>

									<div class="controls">
										<label class="control-label" for="address">Địa Chỉ Chi Tiết: </label>
										<input class="billing-address-name form-control" type="text" name="address" id="address"
											placeholder="Nhập địa chỉ" required>
									</div>
									<div class="controls">
										<label class="control-label" for="email">Email: </label>
										<input class="billing-address-name form-control" type="email" name="email" id="email"
											placeholder="Nhập email">
									</div>
								</div>
								
								<button type="submit" class="submit check_out">Đặt Hàng</button>
							</div>
						</section>
					</form>
					<div class="checkout-right-basket">
						<a href="payment.html">Make a Payment <span class="fa fa-chevron-right"
								aria-hidden="true"></span></a>
					</div>
				</div>
				
			</div>
		</div>
		<!-- //about -->
	</div>
</div>
<!-- //banner -->
<!--footer-->
<?php include "assets/layout/footer.php";?>
<!--//footer-->
<script>
	$( document ).ready(function() {
		function displayCart(){
			var displayData="true";
			$.ajax({
				url : "handle_cart/display_cart.php",
				type : "POST",
				data : {displayData:displayData},
				dataType : "html",
				success : function(response) {
					$('#displayCart').html(response);
				}
			});
		}
		function displayOrder(){
			var displayData="true";
			$.ajax({
				url : "handle_cart/display_order.php",
				type : "POST",
				data : {displayData:displayData},
				dataType : "html",
				success : function(response) {
					$('#displayOrder').html(response);
				}
			});
		}
		displayCart();
		displayOrder();

		$(document).on('click',".close1",function(e) {
			e.preventDefault();
			var id = $(this).val();
			swal({
				title: "Bạn có chắc không?",
				text: "Sau khi xóa, bạn sẽ không thể khôi phục như ban đầu!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				buttons: ['Thoát', 'Ok']
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url : "handle_cart/process_cart.php?action=delete",
						type : "POST",
						data : {id:id},
						dataType : "JSON",
						success : function(response) {
							swal({
							title: "Thông báo!",
							text: response.message,
							icon: response.style,
							button: "Thoát",
								}).then(() => {
									displayCart();
									displayOrder();
								});
						}
					});
				} else {
					swal({
							text: "Đã hủy xóa!",
							button: "Thoát",
						});
				}
			});
		});
		
		$(document).on('change',".value",function(e) {
			e.preventDefault();
					$.ajax({
						type: "POST",
						url: 'handle_cart/process_cart.php?action=update',
						data: $(this).serializeArray(),
						dataType : "JSON",
						success: function (response) {
							swal({
								title: "Thông báo!",
								text: response.message,
								icon: response.style,
								button: "Thoát",
							}).then(() => {
									displayCart();
									displayOrder();
								});
							}
					});
		});
	});
</script>

<script>
$(document).ready(function() {
	$(document).on('change','#province',function(){
		var province_id = this.value;
			$.ajax({
			url: "./handle_cart/district.php",
			type: "POST",
			data: {
				province_id: province_id
			},
			dataType: "html",
			success:function(result){  
				$("#district").html(result);
			}
		});
	});   

    $(document).on('change','#district',function(){
		var district_id = this.value;
			$.ajax({
			url: "./handle_cart/ward.php",
			type: "POST",
			data: {
				district_id: district_id
			},
			dataType: "html",
			success:function(result){  
				$("#ward").html(result);
			}
		});
	});
});
</script>
<script>
	$( document).on('submit', '#form-order', function(e){
		e.preventDefault();
		var data = new FormData(this);
      	data.append("submit", true);
		  $.ajax({
          url : "handle_cart/insert_order.php",
          type : "POST",
          data : data,
          processData : false,
          contentType : false,
          dataType : "JSON",
          success : function(response) {
            swal({
                  title: "Thông báo!",
                  text: response.message,
                  icon: response.style,
                  button: "Thoát",
              }).then(() => {
                window.location.replace("http://localhost/corner_store/");
              });
          }
      });
	});
</script>
</body>
</html>