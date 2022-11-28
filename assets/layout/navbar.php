<div class="w3l_banner_nav_left">
	<nav class="navbar navbar-expand-lg navbar-light p-lg-0">
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa icon-expand fa-bars"></span>
			<span class="fa icon-close fa-times"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav nav_1">
				<?php
				$sql_menu = "SELECT `category_id`, `category_name` FROM `categories` ORDER by `category_id` DESC";
				$result_menu = $con->query($sql_menu);
				if ($result_menu->num_rows > 0) {
					while ($menu = $result_menu->fetch_assoc()) {
				?>
					<li class="nav-item"><a class="nav-link" href="products?category=<?php echo $menu['category_id']?>"><?php echo $menu['category_name']?></a></li>
				<?php } } ?>
			</ul>
		</div>
	</nav>
</div>