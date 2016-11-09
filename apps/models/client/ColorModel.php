<?php 
	class ColorModel{
		public static function Save($productId,$color){
			$db = Db::GetDb();
			$stmt = $db->prepare('insert into colors (color,product_id) 
									values(:color,:productId)');
			$stmt->bindParam(':color',$color,PDO::PARAM_STR);
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			}
		}

		public static function GetAll($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select color from colors
									where product_id = :productId');
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			if($stmt->execute()){
				return $stmt->fetchAll();
			}
		}

		public static function GetId($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id from colors
									where product_id = :productId');
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			if($stmt->execute()){
				return $stmt->fetchAll();
			}
		}

		public static function Update($productId,$color,$id){
			$db = Db::GetDb();
			$stmt = $db->prepare('update colors set color=:color
									where id = id');
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		}
	}
?>