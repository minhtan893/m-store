<?php 
	class CategoryModel{
		

		//Lấy ra id tất cả danh mục
		public static function GetAllId(){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id from categories');
			$stmt->execute();
			return $stmt->fetchAll();
		}

		////Lấy ra các danh mục ứng với sô trang
		public static function Get($startIndex){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id ,name from categories  order by id DESC limit :startIndex,4');
			$stmt->bindParam(':startIndex',$startIndex,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		//Lấy dữ liệu để show menu
		public static function GetAllName(){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id ,name from categories  order by id DESC ');
			$stmt->execute();
			return $stmt->fetchAll();
		}
		//kiểm trâ id có tồn tại không
		public static function CheckName($name){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id ,name from categories 
								where name= :name');
			$stmt->bindParam(':name',$name,PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount()>0){
				return $stmt->fetch();
			}
			else{
				return false;
			}
		}
	}
?>