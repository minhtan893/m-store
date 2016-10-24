<?php 
	class ImageModel{
		public $thumb;
		public $img1;
		public $img2;
		public $img3;
		public $productId;

		function __construct($thumb,$img1,$img2,$img3,$productId){
			$this->thumb=$thumb;
			$this->img1=$img1;
			$this->img2=$img2;
			$this->img3=$img3;
			$this->productId = $productId;
		}

		//Lưu ảnh
		public function Save($ImageModel){
			$db = Db::GetDb();
			$stmt = $db->prepare('insert into images
						(url,status_thumb,product_id)
						values(:url,1,:productId)
					');
			$stmt->bindParam(':url',$ImageModel->thumb,PDO::PARAM_STR);
			$stmt->bindParam(':productId',$ImageModel->productId,PDO::PARAM_INT);
			$stmt->execute();
				$stmt = $db->prepare('insert into images
						(url,product_id)
						values(:url,:productId)
					');
			$stmt->bindParam(':url',$ImageModel->img1,PDO::PARAM_STR);
			$stmt->bindParam(':productId',$ImageModel->productId,PDO::PARAM_INT);

			$stmt->execute();
			$stmt = $db->prepare('insert into images
						(url,product_id)
						values(:url,:productId)
					');
			$stmt->bindParam(':url',$ImageModel->img2,PDO::PARAM_STR);
			$stmt->bindParam(':productId',$ImageModel->productId,PDO::PARAM_INT);

			$stmt->execute();
			$stmt = $db->prepare('insert into images
						(url,product_id)
						values(:url,:productId)
					');
			$stmt->bindParam(':url',$ImageModel->img3,PDO::PARAM_STR);
			$stmt->bindParam(':productId',$ImageModel->productId,PDO::PARAM_INT);
			$stmt->execute();
			return true;
		}

		//Lấy ra số danh sách anh trong 1 san pham
		public static function GetId($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id ,url ,status_thumb from images
									where product_id = :productId');
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		//Xóa Db
		public static function Del($productId){
			$db = Db::GetDb();
			$stmt = $db->prepare('delete from images
									where product_id = :productId');
			$stmt->bindParam(':productId',$productId,PDO::PARAM_INT);
			if($stmt->execute()){
				return true;
			}
		}
		//lấy ra dữ liệu của một sản phẩm
		public static function GetImage($id){
			$db = Db::GetDb();
			$stmt = $db->prepare('select id, url ,status_thumb from images  
						where product_id = :id');
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		//Update
		public static function Update($ImageModel){
			$db = Db::GetDb();
			$image = self::GetImage($ImageModel->productId);
			$arr = [];
			foreach ($image as $key ) {
				
					array_push($arr, $key['id']);
			}
			if($ImageModel->thumb!=null){
				$stmt = $db->prepare('update images
						set url = :url where id=:id
					');
			$stmt->bindParam(':url',$ImageModel->thumb,PDO::PARAM_STR);
			$stmt->bindParam(':id',$arr[0],PDO::PARAM_INT);
			$stmt->execute();
			}
			
			if($ImageModel->img1!=null){
				$stmt = $db->prepare('update images
						set url = :url where id=:id
					');
			$stmt->bindParam(':url',$ImageModel->img1,PDO::PARAM_STR);
			$stmt->bindParam(':id',$arr[1],PDO::PARAM_INT);
			$stmt->execute();
			}
		if($ImageModel->img2!=null){
				$stmt = $db->prepare('update images
						set url = :url where id=:id
					');
			$stmt->bindParam(':url',$ImageModel->img2,PDO::PARAM_STR);
			$stmt->bindParam(':id',$arr[2],PDO::PARAM_INT);
			$stmt->execute();
			}
			if($ImageModel->img3!=null){
				$stmt = $db->prepare('update images
						set url = :url where id=:id
					');
			$stmt->bindParam(':url',$ImageModel->img3,PDO::PARAM_STR);
			$stmt->bindParam(':id',$arr[3],PDO::PARAM_INT);
			$stmt->execute();
			}
				
		}
	}
?>