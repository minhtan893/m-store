<?php 
	class ImageController{
		public static function HomeShow($productId){
			//lấy ra thumb sản phẩm 
			$image = ImageModel::Get($productId);
			return $image;
		}
	}
?>