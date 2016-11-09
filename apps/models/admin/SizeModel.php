<?php 
	class SizeModel{
		public static function Save($productId,$size){
			$db = Db::GetDb();
			$stmt = $db->prepare('insert into size (size,product_id) 
									values(:size,:productId)');
			$stmt->bindParam(':size',$size,PDO::PARAM_STR);
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			}
		}

		public static function GetAll($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select size from size
									where product_id = :productId');
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			if($stmt->execute()){
				return $stmt->fetchAll();
			}
		}

		public static function GetId($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id from size
									where product_id = :productId');
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			if($stmt->execute()){
				return $stmt->fetchAll();
			}
		}

		public static function Update($productId,$color,$id){
			$db = Db::GetDb();
			$stmt = $db->prepare('update size set size=:color
									where id = :id');
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		}

		public static function Del($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('delete from size
									where product_id = :productId');
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			}
		}
	}
?>