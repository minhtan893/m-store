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
			//lấy ra id 
			$id = array_values(self::GetAll($productId));
			//duyệt qua mảng size để lưu từng file
			$count = count($id);
			for ($i=0; $i < $count; $i++) { 
				ColorModel::Update($productId,$id,$color);
			}
			return true;
		}
	}
?>