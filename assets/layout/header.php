<div class="agileits_header" id="home">
		<div class="w3l_offers">
			<a href="#">Ưu đãi đặc biệt!</a>
		</div>
		<div class="w3l_search">
			<form action="search" method="GET" class="d-flex">
				<input type="search" placeholder="Tìm kiếm.." name="keyWord" required="required" autofocus="">
				<button type="submit"><span class="fa fa-search"></span></button>

			</form>
		</div>
		<div class="w3l_header_right w3-two-three-grids">
			<div class="product_list_header mx-lg-4">
				<a href="checkout" class="button">Xem giỏ hàng</a>
			</div>
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle text-center" data-toggle="dropdown"><i class="fa fa-user mr-2"
							aria-hidden="true"></i><span class="fa fa-angle-down"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="#">Đăng Nhập</a></li>
								<li><a href="#">Đăng Ký</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
			<div class="w3l_header_right1 contact-bantbtn ml-lg-4">
				<h2><a href="#">Liên hệ</a></h2>
			</div>
		</div>
	</div>
	<div class="logo_products">
		<header id="site-header">
			<section class="w3l-header-4 sec-part-4">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light p-lg-0">
						<h1> <a class="navbar-brand" href="home">
								<span class="capw3">B</span>ách <span class="subcap">Hóa</span>
							</a></h1>
						<ul class="navbar-nav mx-lg-auto mt-lg-0 mt-3">
							<li class="nav-item">
								<a class="nav-link" href="#">Khuyến Mại</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Về Chúng Tôi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="checkout">Giỏ Hàng</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#">Liên Hệ</a>
							</li>


						</ul>
						<ul class="navbar-nav search-right mt-lg-0 mt-2 w3ls_logo_products_left1 mr-lg-3">
							<ul class="phone_email">
								<?php
								$sql_contact = "SELECT `user_email`, `user_phone` FROM `user` LIMIT 1";
								$result_contact = $con->query($sql_contact);
								if($result_contact->num_rows == 1){
									$contact = $result_contact->fetch_assoc();
								}
								?>
								<li><a href="tel:<?php echo $contact['user_phone']?>" class=""><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $contact['user_phone']?></li>
								<li><a href="mailto:<?php echo $contact['user_email']?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $contact['user_email']?></a></li>
							</ul>
						</ul>

						<!-- //toggle switch for light and dark theme -->

						<!-- toggle switch for light and dark theme -->
						<div class="mobile-position">
							<nav class="navigation">
								<div class="theme-switch-wrapper">
									<label class="theme-switch" for="checkbox">
										<input type="checkbox" id="checkbox">
										<div class="mode-container">
											<i class="gg-sun"></i>
											<i class="gg-moon"></i>
										</div>
									</label>
								</div>
							</nav>
						</div>
					</nav>
				</div>
			</section>
		</header>
		<!--//header-->
	</div>