<?php 
class CategoryModel{
	public $id;
	public $name;
	public $cateLimit;
	public $cateList = [];

		//Khởi tạo giá trị ban đầu cho Model
	function __construct($id=null,$name=null){
		$this->id = $id;
		$this->name = $name;
	}
		//Lấy tổng số danh mục
	public static function GetLimit(){
		$db = Db::GetDb();
		$stmt= $db->prepare('select id  from categories');
		$stmt->execute();
		return $stmt->rowCount();
	}

		//Lấy ra tất cả id và name
	public function GetCate($startIndex){
		$db = Db::GetDb();
		if($startIndex==-1){//lấy ra tất cả
			$stmt= $db->prepare('select id ,name from categories order by id DESC');
		}
		else{
			$stmt= $db->prepare('select id,name from categories
				order by id DESC
			limit :startIndex,8');
			$stmt->bindParam(':startIndex',$startIndex,PDO::PARAM_INT);
		}
		$stmt->execute();
		if($stmt->rowCount()>0){
			$cateLimit = $stmt->rowCount();
			$cateList = $stmt->fetchAll();
			$cate = new CategoryModel();
			$cate->cateList = $cateList;
			$cate->cateLimit = $cateLimit;
			return $cate;
		}
		else{
			return false;
		}
	}
	//Lấy ra 1 danh mục
	public static function GetOne($cateName){
		$db = Db::GetDb();
		$stmt= $db->prepare('select id  from categories
							where name=:cateName');
		$stmt->bindParam(':cateName',$cateName,PDO::PARAM_STR);
		$stmt->execute();
		if($stmt->rowCount()>0){
			return $stmt->fetch();
		}
		else{
			return null;	
		}
	}
	//Kiểm tra xem tên danh mục đã tồn tại chưa
	public static function CheckName($cateName){
		$db = Db::GetDb();
		$stmt= $db->prepare('select id ,name from categories
			where name=:cateName');
		$stmt->bindParam(':cateName',$cateName,PDO::PARAM_STR);
		$stmt->execute();
		if($stmt->rowCount()>0){
			return true;
		}
		else{
			return false;
		}
	}

	//lưu Danh Mục
	public static function Save($cateName,$cateId){
		$db = Db::GetDb();
		if($cateId==null){//thực hiện thêm mới
			$stmt = $db->prepare('insert into categories (name) values(:cateName)');
			$stmt->bindParam(':cateName',$cateName,PDO::PARAM_STR);
		}
		else{//update
			$stmt= $db->prepare('update  categories
								set name=:cateName
							where id=:cateId');
		$stmt->bindParam(':cateName',$cateName,PDO::PARAM_STR);
		$stmt->bindParam(':cateId',$cateId,PDO::PARAM_INT);
		}
		if($stmt->execute()){
			return true;
		}
		else{
			print_r($db->errorInfo()) ;
		}
	}
	//Kiểm trâ Id

	public static function CheckId($cateId){
		$db = Db::GetDb();
		$stmt= $db->prepare('select id, name from categories
			where id=:id');
		$stmt->bindParam(':id',$cateId,PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->rowCount()>0){
			return $stmt->fetch();
		}
		else{
			return false;
		}
	}
	//Xoa Danh Muc
	public static function Del($cateId){
			$db = Db::GetDb();
			$stmt = $db->prepare('delete from categories
									where id = :cateId');
			$stmt->bindParam(':cateId',$cateId,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			}
		}
}
?>