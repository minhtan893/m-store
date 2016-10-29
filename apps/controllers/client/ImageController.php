<?php 
	class ImageController{
		//Lấy ra hình ảnh của từng sản phẩm
		public static function Show($productId,$status){
			//lấy ra thumb sản phẩm 
			$image = ImageModel::Get($productId,$status);
			return $image;
		}
	}
?>