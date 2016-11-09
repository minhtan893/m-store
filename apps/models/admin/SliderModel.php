<?php 
	class SliderModel{
		public $silder01;
		public $silder02;
		public $silder03;


		//lấy ra tất cả hình ảnh slider
		public static function GetAll(){
			$db =Db::GetDb();
			$stmt = $db->prepare('select id,url from slider');
			$stmt->execute();
			return $stmt->fetchAll();
		}
		//lấy ra tất cả hình ảnh slider
		public static function GetOne($id){
			$db =Db::GetDb();
			$stmt = $db->prepare('select url from slider where id=:id');
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}
		//hàm lưu Hinh anh
		public function Add($url){
			$db =Db::GetDb();
			$stmt = $db->prepare('insert into slider(url) values(:url)');
			$stmt->bindParam(':url',$url,PDO::PARAM_STR);
			$stmt->execute();
		}
			//hàm lưu Hinh anh
		public function Update($url,$id){
			$db =Db::GetDb();
			$stmt = $db->prepare('update slider set url=:url where id=:id');
			$stmt->bindParam(':url',$url,PDO::PARAM_STR);
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->execute();
		}
	}
?>