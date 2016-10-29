<?php 
	class ProductModel{
		public $id;
		public $name;
		public $num;
		public $des;
		public $price;
		public $cateId;

		function __construct($id=null,$name=null,$num=null,$des=null,$price=null,$cateId=null){
			$this->id = $id;
			$this->name = $name;
			$this->num = $num;
			$this->des = $des;
			$this->price = $price;
			$this->cateId = $cateId;
		}
		//Lấy ra số lượng sản phẩm
		public static function GetCount($ProductModel){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id from products
									where cate_id = :cateId');
			$stmt->bindParam(':cateId',$ProductModel->cateId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->rowCount();
		}

		//Lấy ra tất cả sản phẩm trên 1 danh mục
		public static function GetAllByOneCate($startIndex,$cateId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id ,name , num , price , des from products
									where cate_id = :cateId
									limit :startIndex , 8');
			$stmt->bindParam(':cateId',$cateId,PDO::PARAM_INT);
			$stmt->bindParam(':startIndex',$startIndex,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		//Kiểm tra tên sản phẩm 
		public static function CheckName($productName,$cateId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id  from products
									where cate_id = :cateId and name =:productName
									');
			$stmt->bindParam(':cateId',$cateId,PDO::PARAM_INT);
			$stmt->bindParam(':productName',$productName,PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount()>0){
				return true;
			}
			else{
				return false;
			}
		}

		//Lưu Sản Phẩm
		public function Save($ProductModel){
			$db = Db::GetDb();
			if($ProductModel->id==null){//them moi
				$stmt = $db->prepare('insert into products
						(id,name,num,price,cate_id,des)
						values(:id,:name,:num,:price,:cateId,:des)				
					');
			}
			else{
				$stmt = $db->prepare('update products
						set name = :name,num=:num,price=:price,des=:des,cate_id=:cateId
						where id = :id				
					');
			}
			$stmt->bindParam(':id',$ProductModel->id,PDO::PARAM_INT);
			$stmt->bindParam(':name',$ProductModel->name,PDO::PARAM_STR);
			$stmt->bindParam(':num',$ProductModel->num,PDO::PARAM_INT);
			$stmt->bindParam(':price',$ProductModel->price,PDO::PARAM_INT);
			$stmt->bindParam(':cateId',$ProductModel->cateId,PDO::PARAM_INT);
			$stmt->bindParam(':des',$ProductModel->des,PDO::PARAM_STR);
			if($stmt->execute()){
				if($ProductModel->id==null){
					return $db->lastInsertId();
				}
				else{
					return $ProductModel->id;
				}
			}
			else{
				print_r($db->errorInfo());
			}
		}
		//Lấy ra số danh sách sản phẩm trong 1 danh mục
		public static function GetId($cateId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id from products
									where cate_id = :cateId');
			$stmt->bindParam(':cateId',$cateId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		//xoa sản phẩm trong 1 danh mục
		public static function Del($cateId){
			$db = Db::GetDb();
			$stmt = $db->prepare('delete from products
									where cate_id = :cateId');
			$stmt->bindParam(':cateId',$cateId,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			}
		}

		//Kiểm tra id có tồn tại không
		public static function IdExist($id){
			$db = Db::GetDb();
			$stmt = $db->prepare('select name from products
									where id = :id');
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->execute();
			if($stmt->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}

		//lấy thông tin  sản phẩm
		public static function GetAll($id){
			$db = Db::GetDb();
			$stmt = $db->prepare('select p.id as id , p.name as name , p.price as price,
									p.des as des,p.num, c.name as cateName ,c.id as cateId  from categories as c
									left join products as p 
									on p.cate_id=c.id
									where p.id = :id');
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}

		//Xoá một sản phẩm
		public static function DelOne($id){
			$db = Db::GetDb();
			$stmt = $db->prepare('delete from products
									where id = :id');
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		//
	}
?>