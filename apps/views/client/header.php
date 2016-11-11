<header>

	<!--start-top-header-->
	<section id="top-header">
		<section class="container">
			<section class="user-action">
				<?php 
				if(isset($_SESSION['userName'])) { ?>
				<a href="m-store/User/Id/<?=$_SESSION['userId']; ?>" class="user-action-link"><?php echo $_SESSION['userName'];?></a>
				<a href="m-store/User/SignOut" class="user-action-link">Đăng Xuất</a>			
				<?php }
				else{ ?>
				<a href="m-store/User/Login" class="user-action-link">Đăng nhập</a>
				<a href="m-store/User/Register" class="user-action-link">Đăng ký</a>
				<?php }
				?>
			</section>
		</section>
	</section>
	<!--end-top-header-->
	
	<!--start-logo-->
	<section id="logo">
		<section class="container">
			<h1><a href="m-store/">R Store</a></h1>
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
					<li><a href="m-store/" class="active-menu menu-link">Home</a></li>
					<li><a href="javascript:void(0)" class="menu-link navr">Danh mục</a>
						<ul class="dropdown-menu">
							<?php 
							require_once("./apps/models/client/CategoryModel.php");
							require_once("./apps/controllers/client/CategoryController.php");
							$cateList = CategoryController::GetCateMenu();
							foreach ($cateList as $key ) { ?>
								<li><a href="m-store/Category/Id/<?=$key['id'];?>"><?=$key['name']; ?></a></li>
							<?php }
							?>
						</ul>
					</li>
					<li><a href="m-store/Contact/Index" class="menu-link">Liên Hệ</a></li>
				</ul>
				
			</nav>
			<!--end-nav-->
			<section id="search-bar">
				<form action="m-store/Search/Query" method="POST" class="search-form">
					<input type="text" placeholder="Search" id="search-bar-text" name="query"/>
					<button id="search-bar-button" type="submit"><img src="m-store/apps/public/images/search.png" alt=""></button>
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