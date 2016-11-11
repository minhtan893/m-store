<?php 
	
	class HomeController{
		public  function Index(){//Load trang chủ

		
			//lấy ra slider
			$sliders = HomeModel::GetSlider();

			//lấy ra 3 sản phẩm bán chạy nhất
			$pageLimit = CaLL("Product","GetPageLimit",null);
			require_once('apps/views/client/index.php');
		}
		
	}
?>