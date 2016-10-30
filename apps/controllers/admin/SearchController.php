<?php 
	class SearchController{
		public static function Query(){
			unset($_SESSION['productSearch']);
							unset($_SESSION['cateId']);
							unset($_SESSION['productIdSearch']);
							unset($_SESSION['result-error']);
			if(isset($_POST['query'])){
				$query = strtolower($_POST['query']);
				$arr = explode(" ",  $query);
				//duyệt từ cuối mảng arr đẻ tìm kiếm
				$count = count($arr);
				for ($i=0; $i < $count ; $i++) {
				$error = null;

					$cateId = CategoryController::Search($arr[$i]);
					if($cateId!=null){
						//lấy ra thông tin sản phẩm
						if($count>1 && $i<$count-1){
							$tmp =$arr[$i+1];
							$productId = ProductController::Search($cateId,$tmp);
							if($productId!=null){
							//nếu tìm thấy đúng sản phẩm
								$_SESSION['productIdSearch'] = $productId['id'];
								header('location: http://localhost/m-store/admin/Search/Result');
								die();
							}
						}else{//Nếu không có sản phẩm nào
							//Trả về Danh mục đã tìm được
							$_SESSION['cateId'] = $cateId;
							header('location: http://localhost/m-store/admin/Search/Result');
							die();
						}
						
						break;
					}
					else{ //Nếu không tìm thấy danh mục
						$productId = ProductController::Search(null,$arr[$i]);
						if($productId!=null){//Tìm kiếm sản phẩm
							//nếu tìm thấy đúng sản phẩm
								$_SESSION['productSearch'] = $productId;
								header('location: http://localhost/m-store/admin/Search/Result');
								die();
							break;
						}else{
							$error = "dsf";
						}
					}
				}
					$_SESSION['result-error'] = 'Không tìm thấy!';
					header('location: http://localhost/m-store/admin/Search/Result');
				
			}
		}

		//REsult

		public static function Result(){
			if(isset($_SESSION['productIdSearch'])){
				//lấy ra thông tin tên sản phẩm 
				$product = ProductController::GetName($_SESSION['productIdSearch']);
				}
			if(isset($_SESSION['productSearch'])){
				//lấy ra tất cả thông tin tên sản phẩm
				$product = array_values($_SESSION['productSearch']);
				$count = count($product);
				for ($i=0; $i < $count; $i++) { 
				 	$productOne = ProductController::GetName($product[$i][0]);
				 	array_push($product[$i], $productOne);
				 } 
			}
			 if(isset($_SESSION['cateId'])){
				//lấy ra tất cả thông tin danh mục
				$cateId = $_SESSION['cateId'];
				$cateName = CategoryController::GetName($cateId);
			}
				require_once('../apps/views/admin/result.php');
	}
}
?>