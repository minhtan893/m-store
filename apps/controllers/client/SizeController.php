<?php 
	class SizeController{
		public static function Save($productId,$size){
			//duyệt qua mảng size để lưu từng file
			$count = count($size);
			for ($i=0; $i < $count; $i++) {
				SizeModel::Save($productId,$size[$i]);
			}
			return true;
		}

		public static function GetAll($productId){
			return SizeModel::GetAll($productId);
		}

		
		public static function Update($productId,$color){
			//lấy ra id 
			$id = array_values(self::GetAll($productId));
			//duyệt qua mảng size để lưu từng file
			$count = count($id);
			for ($i=0; $i < $count; $i++) { 
				SizeModel::Update($productId,$id,$color);
			}
			return true;
		}
	}
?>