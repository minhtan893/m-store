<?php 
	class CategoryController{
		//lấy ra so trang chu
		public static function GetPageLimit(){
			//lấy ra tất cả id;
			$idArray = CategoryModel::GetAllId();
			if(count($idArray) % 4==0){
				$page = count($idArray)/4;
				return $page;
			}else{
				$page = count($idArray)/4;
				return ((int)$page)+1;
			}
		}
		//lấy dữ liệu các category để show trang chủ
		public static function GetHomeCate(){
			if(isset($_POST['page']) && isset($_POST['page'])){
				$page = $_POST['page'];
				$pageLimit = $_POST['pageLimit'];
				$startIndex = ($page*4)-4;
				//Lấy ra các danh mục ứng với sô trang
				$cate = CategoryModel::Get($startIndex);
				/*
					mảng cate gồm key : id ,name
				*/	
				array_values($cate);
				$count = count($cate);
				for ($i=0; $i < $count; $i++) { 
						array_values($cate[$i]);
					}	
				//duyệt từng Id danh mục lấy ra 4 sản phẩm mới nhất danh mục đó
				for ($i=0; $i < $count; $i++) { 
						$product = ProductController::HomeShow($cate[$i][0]);
						array_push($cate[$i], $product);
					}
				echo json_encode($cate);	
			}
		}
	}
?>