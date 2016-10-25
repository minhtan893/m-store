<?php
	class ProductModel{
		public static function Get($cateId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id ,name, price from products  where cate_id =:cateId
				order by id DESC limit 0,4');
			$stmt->bindParam(':cateId',$cateId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}	
?>