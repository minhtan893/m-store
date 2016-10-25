<?php
	class ImageModel{
		public static function Get($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select url from images  
				where product_id =:productId and status_thumb=1');
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}
	}	
?>