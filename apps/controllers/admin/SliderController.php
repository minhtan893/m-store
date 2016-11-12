<?php 
	class SliderController{
		//Show trang quản trị slider
		public static function Index(){
			//lấy ra hình ảnh làm slider
			$sliders = SliderModel::GetAll();
			require_once('../apps/views/admin/slide.php');
		}

		//update slider
		public static function Update(){
			echo 'fdf';die();
			///lưu anh
			//lấy ra id  
			$slider = array_values(SliderModel::GetAll());
			for ($i=0; $i < 3; $i++) { 
				$folderImg = '../apps/public/upload/slider/';
				$img = "silder".$i;
				if($_FILES[$img]['name']!=null){
					//lấy ra tên file
					$url = SliderModel::GetOne($i);
					$fileType = pathinfo($_FILES[$img]['name'],PATHINFO_EXTENSION);
					$_FILES[$img]['name'] = "slider".$i.".".$fileType;
					$old_file="../apps/public/upload/slider/".$slider[$i]['url'];
					echo $folderImg;
					echo $_FILES[$img]['name'];
					unlink($old_file);
					//move_uploaded_file($_FILES[$img]['tmp_name'], $folderImg.$_FILES[$img]['name']);
					//SliderModel::Update($_FILES[$img]['name'],$i);
				}
			}
			//header("location: ../Slider/Index");
		}

		//Thêm mới
		public static function Add(){
			///lưu anh
			for ($i=0; $i < 3; $i++) { 
				$folderImg = '../apps/public/upload/slider/';
				$img = "silder".$i;
				if($_FILES[$img]['name']!=null){
					$fileType = pathinfo($_FILES[$img]['name'],PATHINFO_EXTENSION);
					$_FILES[$img]['name'] = "slider".$i.".".$fileType;
					move_uploaded_file($_FILES[$img]['tmp_name'], $folderImg.$_FILES[$img]['name']);
					SliderModel::Add($_FILES[$img]['name']);
				}
			}
			//header("location: ../");
		}
	}
?>