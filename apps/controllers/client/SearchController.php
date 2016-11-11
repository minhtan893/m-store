<?php 
class SearchController{
	public static function Query(){
			//Xóa các biến session về tìm kiếm
		unset($_SESSION['productSearch']);
		unset($_SESSION['cateId']);
		unset($_SESSION['productIdSearch']);
		unset($_SESSION['result-error']);
			//Kiểm tra tồn tại biến tìm kiếm khong
		if(isset($_POST['query'])){
			$query = strtolower($_POST['query']);
			$arr = explode(" ",  $query);
			//duyệt từ cuối mảng arr đẻ tìm kiếm
			$count = count($arr);//số từ
			//Nếu chỉ có 1 từ khóa
			if($count<2){
				//tìm kiếm ở danh mục
				$cateId = CategoryController::Search($arr[0]);
				if($cateId!=null){//Nếu tìm thấy danh mục
					//tạo biến session 
					$_SESSION['cateId'] = $cateId;
					header("location: ../Search/Result");
				}
				else{//Nếu không tìm thấy danh mục-chuyển sang tìm kiếm ở sản phẩm
					$productId = ProductController::Search(null,$arr[0]);
					if($productId!=null){//Tìm kiếm sản phẩm
						//nếu tìm thấy đúng sản phẩm
						$_SESSION['productSearch'] = $productId;
						header("location: ../Search/Result");
					}
					else{//Nếu không tìm thấy gì cả
						$_SESSION['result-error'] = 'Không tìm thấy!';
						header("location: ../Search/Result");
					}
					}
				}
				else{//Nếu từ 2 từ khóa trở lên
					//gọi hàm kiểm tra
					$cateSearch = self::SearchCate($arr);
					//Kiểm tra xem có tìm thấy danh mục không
					if($cateSearch[0]==-1){//không tìm thấy
						//gọi hàm tìm kiếm sản phẩm
						$productSearch = self::SearchProduct(null,$arr);
					}
					else{//Nếu tìm thấy , kiểm tra xem còn từ khóa không
						if($cateSearch[0]<$count-1){
							//tạo mảng mới
							$arrTmp=[]; 
							for ($i=$cateSearch[0]+1; $i < $count; $i++) { 
								array_push($arrTmp, $arr[$i]);
							}
							//Gọi hàm tìm kiếm sản phẩm với cateId đã biết
							$productSearch = self::SearchProduct($cateSearch[1],$arrTmp);
						}
						else{//Nếu không còn từ khóa
							$_SESSION['cateId'] = $cateSearch[1];
							header("location: ..//Search/Result");
						}
					}
				}
			}
		}

		//Hàm tìm kiếm danh mục
		public static function SearchCate($arr){
			$count = count($arr);
			$arrTmp = [0 => -1];
			//duyệt toàn mảng để tìm ra danh mục
			$query=[0 => $arr[0]];
			$newQuery = implode(' ', $query); 
			$id = CategoryController::Search($newQuery);
			if($id!=null){//nếu tìm thấy
				//trả về stt từ khóa và id cate;
				$arrTmp[0] = 0;
				array_push($arrTmp, $id);
			}
			else{
				for ($j=1; $j < $count ; $j++) { 
					//Biến từ khóa
					array_push($query, $arr[$j]);
					$newQuery = implode(' ', $query); 
					$id = CategoryController::Search($newQuery);
					if($id!=null){//nếu tìm thấy
						//trả về stt từ khóa và id cate;
						$arrTmp[0]=$j;
						array_push($arrTmp, $id);
						break;
					}	
				}
			}	
			return $arrTmp;
		}

		//Hàm tìm kiếm sản phẩm
		public static function SearchProduct($cateId,$arr){
			$query = implode(' ', $arr);
			$count = count($arr);
			//tìm kiếm danh mục với từ khóa query
			$product = ProductController::Search($cateId,$query);

			if($product==null){
				$_SESSION['result-error'] = 'Không tìm thấy!';
				header("location: ../Search/Result");
			}
			else{	
				if(!is_array($product[0])){//tìm thấy duy nhất 1 sản phẩm
					$_SESSION['productIdSearch'] = $product[0];
					header("location: ..//Search/Result");
				}
				else{//tìm thấy nhiều sản phẩm
					$_SESSION['productSearch'] = $product;
					header("location: ../Search/Result");
					}
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
				$product=$_SESSION['productSearch'];
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
			require_once('./apps/views/client/result.php');
			}
		}
?>


