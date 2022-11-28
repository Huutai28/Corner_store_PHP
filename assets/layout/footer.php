<!---728x90--->
</div>
<!-- newsletter -->
<div class="newsletter">
	<div class="container">
		<div class="w3agile_newsletter_left">
			<h3>Đăng ký nhận tin tức mới</h3>
		</div>
		<div class="w3agile_newsletter_right">
			<form action="#" method="post">
				<input type="email" name="Email" required="">
				<input type="submit" value="Đăng ký ngay">
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //newsletter -->
<!---728x90--->
</div>
<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-sm-6 w3_footer_grid">
				<h3>Thông tin</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="#"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i> Về chúng tôi</a></li>
					<li><a href="#"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i> Liên hệ</a></li>
					<li><a href="#"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i> Khuyến mại</a></li>
					<li><a href="#"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i> Giỏ hàng</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-sm-6 w3_footer_grid">
				<h3>Chính Sách</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="#"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i> Câu hỏi thường gặp</a></li>
					<li><a href="#"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i> Chính sách bảo mật</a></li>
					<li><a href="#"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i> Điều khoản sử dụng</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-sm-6 w3_footer_grid">
				<h3>Sản Phẩm</h3>
				<ul class="w3_footer_grid_list">
					<?php
					$sql_list = "SELECT `category_id`, `category_name` FROM `categories` ORDER by `category_id` DESC LiMIT 5";
					$result_list = $con->query($sql_list);
					if ($result_list->num_rows > 0) {
						while($list = $result_list->fetch_assoc()){
					?>
					<li><a href="products?category=<?php echo $list['category_id']?>"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i> <?php echo $list['category_name']?></a></li>
					<?php } } ?>
					
					
				</ul>
			</div>
			<div class="col-lg-3 col-sm-6 w3_footer_grid">
				<h3>Bài viết TWITTER</h3>
				<ul class="w3_footer_grid_list1">
					<li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Non numquam
							<a href="#">http://sd.ds/13jklf#</a>
							eius modi tempora incidunt ut labore et
							<a href="#">http://sd.ds/1389kjklf#</a>quo nulla.</span></li>
					<li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>Con numquam
							<a href="#">http://fd.uf/56hfg#</a>
							eius modi tempora incidunt ut labore et
							<a href="#">http://fd.uf/56hfg#</a>quo nulla.</span></li>
				</ul>
			</div>
		</div>
		<div class="row agile_footer_grids">
			<div class="col-lg-3 col-sm-6 w3_footer_grid agile_footer_grids_w3_footer">
				<div class="w3_footer_grid_bottom">
					<h4>Thanh toán an toàn 100%</h4>
					<img src="assets/images/card.png" alt=" " class="img-fluid" />
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 w3_footer_grid agile_footer_grids_w3_footer">
				<div class="w3_footer_grid_bottom">
					<h5>Theo dõi với cửa hàng</h5>
					<ul class="agileits_social_icons">
						<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</li>
						<li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="wthree_footer_copy">
			<p>© 2021 Corner Store. Đã đăng ký Bản quyền | Thiết kế bởi <a href="http://w3layouts.com/">W3layouts</a>
			</p>
		</div>
	</div>
</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/theme-change.js"></script>
<script>
	$(document).ready(function () {
		$(".dropdown").hover(
			function () {
				$('.dropdown-menu', this).stop(true, true).slideDown("fast");
				$(this).toggleClass('open');
			},
			function () {
				$('.dropdown-menu', this).stop(true, true).slideUp("fast");
				$(this).toggleClass('open');
			}
		);
	});
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function () {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/

		$().UItoTop({
			easingType: 'easeOutQuart'
		});

	});
</script>
<!-- //here ends scrolling icon -->
<!-- js -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- script-for sticky-nav -->
<script>
	$(document).ready(function () {
		var navoffeset = $(".agileits_header").offset().top;
		$(window).scroll(function () {
			var scrollpos = $(window).scrollTop();
			if (scrollpos >= navoffeset) {
				$(".agileits_header").addClass("fixed");
			} else {
				$(".agileits_header").removeClass("fixed");
			}
		});
	});
</script>
<!-- //script-for sticky-nav -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="assets/js/move-top.js"></script>
<script type="text/javascript" src="assets/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$(".scroll").click(function (event) {
			event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- sweetalert -->