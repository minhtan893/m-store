<header>

	<!--start-top-header-->
	<section id="top-header">
		<section class="container">
			<section class="user-action">
				<?php 
				if(isset($_SESSION['userName'])) { ?>
					<a href="User/Name" class="user-action-link"><?php echo $_SESSION['userName'];?></a>
					<a href="User/SignOut" class="user-action-link">Đăng Xuất</a>			
				<?php }
				else{ ?>
				<a href="User/Login" class="user-action-link">Đăng nhập</a>
				<a href="User/Register" class="user-action-link">Đăng ký</a>
				<?php }
				?>
			</section>
		</section>
	</section>
	<!--end-top-header-->
	
	<!--start-logo-->
	<section id="logo">
		<section class="container">
			<h1><a href="#">M Store</a></h1>
		</section>
	</section>
	<!--end-logo-->
	<!--start-navigation-->
	<section id="navigation">
		<section class="container">
			<!--start-nav-->
			<nav>
				<button id="responsive-menu">Menu</button>
				<ul id="menu">
					<li><a href="http://localhost/m-store/admin" class="active-menu menu-link">Home</a></li>
					<li><a href="admin/Category" class="menu-link">Danh mục</a></li>
					<li><a href="admin/Cart" class="menu-link">Giỏ hàng</a></li>
					<li><a href="admin/Contact" class="menu-link">Contact</a></li>
					<li><a href="admin/Slider" class="menu-link">Slider</a></li>
				</ul>
				
			</nav>
			<!--end-nav-->
			<section id="search-bar">
				<form action="admin/Search/Query" method="post">
					<input type="text" placeholder="Search" id="search-bar-text" name="query"/>
					<button id="search-bar-button" type="submit"><img src="apps/public/images/search.png" alt=""></button>
				</form>
			</section>
			<section class="container">
			</section>
			<!--end-navigation-->
		</header>

		<script>
			$(document).ready(function(){
				Menu.menu();
			})
		</script>