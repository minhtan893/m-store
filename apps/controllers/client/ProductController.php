<?php 
	class ProductController{
		public static function HomeShow($cateId){
			//lấy ra 4 sản phẩm mới nhất trong danh mục
			$product = array_values(ProductModel::Get($cateId));
			$count = count($product);
			for ($i=0; $i < $count; $i++) { 
					array_values($product[$i]);
				}
			//duyệt qua từng sản phẩm để lấy ra hình ảnh
			for ($i=0; $i < $count; $i++) { 
						$image = ImageController::HomeShow($product[$i][0]);
						array_push($product[$i], $image['url']);
					}
			return $product;				
		}
	}
?>