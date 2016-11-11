<?php
class ProductController{

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
	//Lấy ra số lượng sản phẩm một danh m
	public static function GetLimitByCate($cateId){
		$product = new ProductModel(null,null,null,null,null,null,$cateId);
		$productLimit = ProductModel::GetCount($product);
		return $productLimit;
	}
	//lấy ra so trang chu
		public static function GetPageLimit(){
			//lấy ra tất cả id;
			$idArray = ProductModel::GetLimit();
			if(count($idArray) % 16==0){
				$page = count($idArray)/16;
				return $page;
			}else{
				$page = count($idArray)/16;
				return ((int)$page)+1;
			}
		}
	//Lấy ra tất cả sản phẩm trong 1 danh mục
	public static function GetProduct(){
		if(isset($_POST['productPage']) && isset($_POST['cateId'])){//Kiểm tra biến post gửi bằng ajax để lây số trang
			$productPage = $_POST['productPage'];
			$cateId = $_POST['cateId'];
			$startIndex = $productPage*8-8;
			//Gọi Model để lấy ra số sản phẩm có bắt đầu từ startIndex. Giới hạn 8 sản phẩm
			$productList = array_values(ProductModel::GetAllByOneCate($startIndex,$cateId));
			//kiểm tra $product
			//Lấy ra thumb để hiển thị
			$count = count($productList);
			for ($i=0; $i < $count; $i++) { 
				$thumb = ImageController::GetThumb($productList[$i][0]);
				array_push($productList[$i], $thumb['url']);
			}
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
		$color = $_POST['color'];
		$size = $_POST['size'];
		$des = $_POST['des'];
		$feature = $_POST['feature'];
		$num = $_POST['num'];
		$price = $_POST['price'];
		$cateId = $_POST['cateId'];
		if(isset($_POST['id'])){
			$id = $_POST['id'];
		}
		//Kiểm tra 
		$product = new ProductModel($id,$name,$num,$des,$feature,$price,$cateId);
		$productId = $product->Save($product);
		if($id!=null){//update
			//lưu ảnh
			ImageController::Update($id);
			//lưu size và màu
			ColorController::Update($id,$color);
			SizeController::Update($id,$size);
			echo json_encode(['status'=>true]);
		}
		else{//Thêm mới
			if($upload = ImageController::Upload((int)$productId) 
				&& ColorController::Save($productId,$color) 
				&& SizeController::Save($productId,$size)){
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
			ColorController::Del($key['id']);
			SizeController::Del($key['id']);
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
				if(ImageController::Del($id) && ColorController::Del($id) && SizeController::Del($id)){
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
				$color = ColorController::GetAll($id);
				$size = SizeController::GetAll($id);
				require_once('../apps/views/admin/update-product.php');
			}
			else{
				header("location: ../../");
			}
		}
	}
       
     //Lấy ra tên sản phẩm và tên danh mục
	public static function GetCart($productId){
		$product = array_values(ProductModel::GetCart($productId));
		return $product;
	}

    //search
	public static function Search($cateId=null,$query){
		$id = ProductModel::Search($cateId,$query);
		if($id!=null){
			return array_values($id);
		}
		else{
			return null;
		}
	}

	//Get name
	public static function GetName($id){
		$product =  array_values(ProductModel::GetResult($id));
		$image = ImageController::Show($id,1);
		array_push($product, $image);
		return $product;
	}
	

	//lấy ra tổng sô sản phẩm
	public static function GetAllLimit(){
		$product = ProductModel::GetAllLimit();
		return $product;
	}
	//Lấy ra thông tin tất cả sản phẩm
	public static function GetAllProduct(){
		if(isset($_POST['productPage'])){//Kiểm tra biến post gửi bằng ajax để lây số trang
			$productPage = $_POST['productPage'];
			$startIndex = $productPage*8-8;
			//Gọi Model để lấy ra số sản phẩm có bắt đầu từ startIndex. Giới hạn 8 sản phẩm
			$productList = array_values(ProductModel::GetAllForHome($startIndex));
			//kiểm tra $product
			//Lấy ra thumb để hiển thị
			$count = count($productList);
			for ($i=0; $i < $count; $i++) { 
				$thumb = ImageController::GetThumb($productList[$i][0]);
				array_push($productList[$i], $thumb['url']);
			}
			if($productList!=null){
				echo json_encode($productList);
			}
		}
	}
}
?>
