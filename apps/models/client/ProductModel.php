<?php
	class ProductModel{

		//lấy ra sản phẩm trong danh mục theo số trang
		public static function Get($cateId,$limit,$startIndex=null){
			$db = Db::GetDb();
			if($startIndex==null){
				$stmt = $db->prepare('select id ,name, price from products  where cate_id =:cateId
				order by id DESC limit 0,:limit');
			}
			else{
				$stmt = $db->prepare('select id ,name, price from products  where cate_id =:cateId
				order by id DESC limit :startIndex,:limit');
			$stmt->bindParam(':startIndex',$limit,PDO::PARAM_INT);

			}
			$stmt->bindParam(':cateId',$cateId,PDO::PARAM_INT);
			$stmt->bindParam(':limit',$limit,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		//Kiểm tra ID sản phẩm có tồn tại không 
		public static function CheckId($id){
			$db = Db::GetDb();
			$stmt = $db->prepare('select name from products 
									where id=:id');
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->execute();
			if($stmt->rowCount()>0){
				return true;
			}
			else{
				return false;
			}
		}
		//Hiển thị 1 sản phẩm
		public static function GetOne($id){
			$db = Db::GetDb();
			$stmt = $db->prepare('select p.id as id, p.name as name, p.price as price, des as des,num  as num,	
									c.name as cateName,p.cate_id as cateId
								from products as p inner join categories as c
									on p.cate_id = c.id 
									where p.id=:id');
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}
		//Lấy ra số lượng sản phẩm
		public static function GetNum($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select num from products 
									where id=:id');
			$stmt->bindParam(":id",$productId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}
		
			//Cập nhật số lượng sản phẩm
		public static function UpdateNum($num,$productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('update products
									set num = :num 
									where id=:id');
			$stmt->bindParam(":num",$num,PDO::PARAM_INT);
			$stmt->bindParam(":id",$productId,PDO::PARAM_INT);
			$stmt->execute();
		}
	}	
?>