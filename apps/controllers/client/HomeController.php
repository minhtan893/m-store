<?php 
	
	class HomeController{
		public static function Index(){//Load trang chủ
			$pageLimit = CaLL("Category","GetPageLimit");
			require_once('apps/views/client/index.php');
		}
		
	}
?>