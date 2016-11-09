<?php 
	
	class HomeController{
		public static function Index(){//Load trang chủ
			//lấy ra slider
			$sliders = HomeModel::GetSlider();

			//lấy ra 3 sản phẩm bán chạy nhất
			$pageLimit = CaLL("Product","GetPageLimit");
			require_once('apps/views/client/index.php');
		}
		
	}
?>