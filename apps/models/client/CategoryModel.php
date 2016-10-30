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
		public static function CheckName($id){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id ,name from categories 
								where id= :id');
			$stmt->bindParam(':id',$id,PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount()>0){
				return $stmt->fetch();
			}
			else{
				return false;
			}
		}
	//search
	public static function Search($query){
		$db = Db::GetDb();
			$stmt = $db->prepare('select id from categories
									where name like :query');
			$stmt->bindParam(":query",$query,PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount()>0){
				return $stmt->fetch();
			}
			else{
				return null;
			}
	}

	//GEt name
	public static function GetName($id){
		$db = Db::GetDb();
			$stmt = $db->prepare('select name from categories
									where id =:id');
			$stmt->bindParam(":id",$id,PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount()>0){
				return $stmt->fetch();
			}
			else{
				return null;
			}
	}
	}
?>