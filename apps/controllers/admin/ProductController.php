<?php
	class ProductController{

		//Lấy ra số lượng sản phẩm
		public static function GetLimitByCate($cateId){
			$product = new ProductModel(null,null,null,null,null,null,$cateId);
			$productLimit = ProductModel::GetCount($product);
			return $productLimit;
		}

		//Lấy ra tất cả sản phẩm trong 1 danh mục
		public static function GetProduct(){
			if(isset($_POST['productPage']) && isset($_POST['cateId'])){//Kiểm tra biến post gửi bằng ajax để lây số trang
				$productPage = $_POST['productPage'];
				$cateId = $_POST['cateId'];
				$startIndex = $productPage*8-8;
				//Gọi Model để lấy ra số sản phẩm có bắt đầu từ startIndex. Giới hạn 8 sản phẩm
				$productList = ProductModel::GetAllByOneCate($startIndex,$cateId);
				//kiểm tra $product
				if($productList!=null){
					echo json_encode($productList);
				}
			}
		}

		//Thêm sản phẩm
		public static function Add(){
			//lấy ra thông tin các Danh mục
			$cate = Call('Category',"GetAll");
		} 

		//Kiểm tra sản phẩm đã tồn tại chưa
		public static function Check(){
			if(isset($_POST['name']) && isset($_POST['cateId'])){
				$productName = strtolower($_POST['name']);
				$cateId = $_POST['cateId'];
				//gọi Model để kiểm tra
				$check = ProductModel::CheckName($productName,$cateId);
				if($check){
					echo json_encode(['status'=>true]);
				}
				else{
					echo json_encode(['status'=>false]);
				}
			}
		}

		//Lưu SẢn phẩm
		public static function Save(){
			//Lưu thông tin sản phẩm
				$id = null;
				$name = $_POST['name'];
				$des = $_POST['des'];
				$num = $_POST['num'];
				$detail = $_POST['detail'];
				$price = $_POST['price'];
				$cateId = $_POST['cateId'];
				if(isset($_POST['id'])){
					$id = $_POST['id'];
				}
				//Kiểm tra 
					//session_destroy($_SESSION['form-error']);
					$product = new ProductModel($id,$name,$num,$des,$detail,$price,$cateId);
					$productId = $product->Save($product);
						//lưu ảnh
					if($id!=null){//update
							ImageController::Update($id);
							echo json_encode(['status'=>true]);

						}
						else{
							if($upload = ImageController::Upload((int)$productId)){
							echo json_encode(['status'=>true]);
						}	
						else{
						echo json_encode(['status'=>false]);
					}
						}
		
					

				}
		//Xóa Sản phẩm theo danh muc
		public static function Del($cateId){
					//Lấy danh sách các sản phẩm trong danh mục
					$idList = ProductModel::GetId($cateId);
					//duyệt qua từng Id xóa ảnh
					foreach ($idList as $key ) {
						ImageController::Del($key['id']);	
					}
					//Xóa sản phẩm
					if(ProductModel::Del($cateId)){
						return true;
					}
		}

		//Xóa một sản phẩm
		public static function DelOne(){
			if(isset($_POST['id'])){
				$id = $_POST['id'];
				//Kiểm tra id sản phẩm có tồn tại hay không
			if(ProductModel::IdExist($id)){
				//Nếu tồn tại
				if(ImageController::Del($id)){
					if(ProductModel::DelOne($id)){
						echo json_encode(['status'=>true]);
					}
					else{
						echo json_encode(['status'=>false]);
					}
				}
				else{
					echo json_encode(['status'=>false]);
				}				
			}
			else{
				echo json_encode(['status'=>false]);
				}
			}
		}

		//Cập nhật sản phẩm
		public static function Update($id){
					if(isset($id)){
						//kIểm tra id có tồn tại không
						if(ProductModel::IdExist($id)){
							//lấy thông tin và hình ảnh
							$product = ProductModel::GetAll($id);
							$image = ImageModel::GetImage($id);
							require_once('../apps/views/admin/update-product.php');
						}
						else{
							header('location: http://localhost/m-store/admin');
						}
					}
		}
		}
?>