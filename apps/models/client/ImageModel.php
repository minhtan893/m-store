<?php
class ImageModel{
	public static function Get($productId,$status){
		$db = Db::GetDb();
			if($status==1){//Chỉ lấy ra thumb
				$stmt = $db->prepare('select url from images  
					where product_id =:productId and status_thumb=1');
				$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetch();
			}
			else{//lấy ra tất cả
				$stmt = $db->prepare('select url from images  
					where product_id =:productId and status_thumb=0');
				$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}
	}	
	?>