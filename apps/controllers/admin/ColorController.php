<?php 
	class ColorController{
		public static function Save($productId,$color){
			//duyệt qua mảng size để lưu từng file
			$count = count($color);
			for ($i=0; $i < $count; $i++) { 
				ColorModel::Save($productId,$color[$i]);
			}
			return true;
		}

		public static function GetAll($productId){
			return ColorModel::GetAll($productId);
		}

		public static function Update($productId,$color){
			ColorModel::Del($productId);
			//lấy ra id 
			//duyệt qua mảng size để lưu từng file
			$count = count($color);
			for ($i=0; $i < $count; $i++) { 
				ColorModel::Save($productId,$color[$i]);
			}
			return true;
		}

		public static function Del($productId){
			if(ColorModel::Del($productId)){
				return true;
			}
		}
	}
?>