<?php 
	class ImageController{

		//luu anh
		public static function Upload($productId){
			//upload anh 
			//lưu thumbnail
			$folderThumb = '../apps/public/upload/thumb/';
			$folderImg = '../apps/public/upload/';
			$thumbFileType = pathinfo($_FILES['thumb']['name'],PATHINFO_EXTENSION);
			$_FILES['thumb']['name'] = $productId."-thumb.".$thumbFileType;
			move_uploaded_file($_FILES['thumb']['tmp_name'],$folderThumb.$_FILES['thumb']['name']);

			///lưu anh
			for ($i=0; $i < 3; $i++) { 
				$img = "img".$i;
				$fileType = pathinfo($_FILES[$img]['name'],PATHINFO_EXTENSION);
				$_FILES[$img]['name'] = $productId."-img".$i.".".$fileType;
				move_uploaded_file($_FILES[$img]['tmp_name'], $folderImg.$_FILES[$img]['name']);
			}
			
			//Luu DB
			$image = new ImageModel(
				$_FILES['thumb']['name'],
				$_FILES['img0']['name'],
				$_FILES['img1']['name'],
				$_FILES['img2']['name'],
				$productId
				);

			if($image->Save($image)){
				return true;
			}
			else{
				return false;
			}
		}

		//Xóa Ảnh
		public static function Del($productId){
			//lấy id ảnh trong sản phẩm
			$imageList = ImageModel::GetId($productId);
			//Xóa Ảnh trong thư mục
			$folderThumb = '../apps/public/upload/thumb/';
			$folderImg = '../apps/public/upload/';
			foreach ($imageList as $key ) {
				if($key['status_thumb']==1){
					//Kiểm tra có ảnh thumb không
					if(file_exists($folderThumb.$key['url'])){
						unlink($folderThumb.$key['url']);
					}
				}
				else{//Xóa ảnh thường
					if(file_exists($folderImg.$key['url'])){
						unlink($folderImg.$key['url']);
					}
				}
			}

			//Xóa DB
			if(ImageModel::Del($productId)){
				return true;
			}
		}

		//lấy ra dữ liệu của một sản phẩm
		public static function GetImage(){
			$db = Db::GetDb();
			$stmt = $db->prepare('select p.id as id , p.name as name , p.price as price,
									p.des as des, p.detail as detail from products as p 
						where p.id = :id');
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}

		//Update
		public static function Update($productId){
			//upload anh 
			//lưu thumbnail
			if($_FILES['thumb']['name']!=null){
				$folderThumb = '../apps/public/upload/thumb/';
				$thumbFileType = pathinfo($_FILES['thumb']['name'],PATHINFO_EXTENSION);
				$_FILES['thumb']['name'] = $productId."-thumb.".$thumbFileType;
				move_uploaded_file($_FILES['thumb']['tmp_name'],$folderThumb.$_FILES['thumb']['name']);	
			}
			
			///lưu anh
			for ($i=0; $i < 3; $i++) { 
				$folderImg = '../apps/public/upload/';
				$img = "img".$i;
				if($_FILES[$img]['name']!=null){
					$fileType = pathinfo($_FILES[$img]['name'],PATHINFO_EXTENSION);
					$_FILES[$img]['name'] = $productId."-img".$i.".".$fileType;
					move_uploaded_file($_FILES[$img]['tmp_name'], $folderImg.$_FILES[$img]['name']);
				}
			}
			
			//Luu DB
			$image = new ImageModel(
				$_FILES['thumb']['name'],
				$_FILES['img0']['name'],
				$_FILES['img1']['name'],
				$_FILES['img2']['name'],
				$productId
									);
			if($image->Update($image)){
				return true;
			}
			else{
				return false;
			}
		}
		
		//Lấy ra hình ảnh của từng sản phẩm
		public static function Show($productId,$status){
			//lấy ra thumb sản phẩm 
			$image = ImageModel::Get($productId,$status);
			return $image;
		}

		//Lấy ra thumb
		public static function GetThumb($productId){
			//lấy ra thumb sản phẩm 
			$image = ImageModel::Get($productId,1);
			return $image;
		}
	}
?>