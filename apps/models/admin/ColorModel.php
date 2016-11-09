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

	public static function Del($productId){
		$db = Db::GetDb();//
			//Xóa dữ liệu cũ
		$stmt = $db->prepare('delete from colors 
				where product_id = :productId');
		$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
		if($stmt->execute()){
			return true;
		}
	}
	
}
?>