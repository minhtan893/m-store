	<?php 
class ProductController{
//lấy ra so trang chu
		public static function GetPageLimit(){
			//lấy ra tất cả id;
			$idArray = ProductModel::GetLimit();
			if($idArray % 16 ==0){
				$page = $idArray/16;
				return (int)$page;
			}else{
				$page = $idArray/16;
				return ((int)$page)+1;
			}

		}
		//lấy dữ liệu các category để show trang chủ
		public static function GetHomeProduct(){
			if(isset($_POST['page'])){
				$page = $_POST['page'];
				$startIndex = ((int)$page*16)-16;
				$product = self::HomeShow($startIndex);
				echo json_encode($product);	
			}
		}

	public static function HomeShow($startIndex){
		$product = array_values(ProductModel::GetProduct($startIndex));
		$count = count($product);
		for ($i=0; $i < $count; $i++) { 
			array_values($product[$i]);
		}
			//duyệt qua từng sản phẩm để lấy ra hình ảnh
		for ($i=0; $i < $count; $i++) { 
			$image = ImageController::Show($product[$i][0],1);
			array_push($product[$i], $image['url']);
		}
		return $product;				
	}

		//trả về số trang trên 1 danh mục
	public static function GetLimit($id){
		$db = Db::GetDb();
		$stmt= $db->prepare('select id from products where cate_id =:id');
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
		$limit =$stmt->rowCount();
		if($limit>0){
			if($limit%8==0){
				return $limit/8;
			}
			else{
				return (int)($limit/8) +1;
			}
		}
	}

	//Trả về sản phẩm của 1 danh mục dựa trên số trang
	public static function GetOneCate(){
		if(isset($_POST['id']) && isset($_POST['page']) ){
			$id = $_POST['id']; 
			$page = $_POST['page']; 
			$startIndex = $page*8-8;

			//lấy ra 8 sản phẩm mới nhất trong danh mục
			$product = array_values(ProductModel::Get($id,8,$startIndex));

			$count = count($product);
			for ($i=0; $i < $count; $i++) { 
				array_values($product[$i]);
			}
			//duyệt qua từng sản phẩm để lấy ra hình ảnh
			for ($i=0; $i < $count; $i++) { 
				$image = ImageController::Show($product[$i][0],1);
				array_push($product[$i], $image['url']);
			}
			echo json_encode($product);			
		}
	}

	//Hiển thị 1 sản phẩm
	public static function Id($id){
			//Kiểm tra id có tồn tại không
		if(ProductModel::CheckId($id)){
				//Lấy ra thông tin sản phẩm
			$product =  array_values(ProductModel::GetOne($id));
			$color = ColorController::GetAll($id);
			$size = SizeController::GetAll($id);
			$image = ImageController::Show($id,0);
				//Đổ ra views
			$fisrtImage = $image;
			array_values($fisrtImage);
			$productEmpty =null;
			if($product[10]==0){
				$productEmpty = "Hết hàng!";
			}
				require_once('./apps/views/client/product.php');
			}
			else{
				header("location: m-store/");
			}
		}

		//Lấy ra sản phẩm tương tự 
		public static function GetSame(){
			if(isset($_POST['id'])){
				$cateId = $_POST['id'];
				//lấy ra 4 sản phẩm mới nhất trong danh mục
				$product = array_values(ProductModel::Get($cateId,4,0));
				$count = count($product);
				for ($i=0; $i < $count; $i++) { 
					array_values($product[$i]);
					}
			//duyệt qua từng sản phẩm để lấy ra hình ảnh
				for ($i=0; $i < $count; $i++) { 
						$image = ImageController::Show($product[$i][0],1);
						array_push($product[$i], $image['url']);
					}
					echo json_encode($product);	
					}
				}
	

	//HIển thị sản phẩm đẻ mua
	public static function Cart($id){
			//Kiểm tra id có tồn tại không
	if(ProductModel::CheckId($id)){
				//Lấy ra thông tin sản phẩm
		$product =  array_values(ProductModel::GetOne($id));
		$image = ImageController::Show($id,1);	
		$color = ColorController::GetAll($id);
		$size = SizeController::GetAll($id);
			//Đổ ra views
		array_push($product, $image);
		array_push($product, $color);
		array_push($product, $size);
		return $product;
		}
	}	
	//Cập nhật số lượng sản phẩm
	public static function UpdateNum($num,$productId,$status=null){
		//Lấy ra sô lượng sản phẩm
		$oldNum = ProductModel::GetNum($productId);
		if($status==1){//mua
		$newNum =$oldNum['num']-$num;
		}
		else{
		
		$newNum =$oldNum['num']+$num;

		}
		ProductModel::UpdateNum($newNum,$productId,$status); 
	}

	//Lấy ra hình ảnh và giá
	public static function GetCart($id){
		if(ProductModel::CheckId($id)){
				//Lấy ra thông tin sản phẩm
			$product =  array_values(ProductModel::GetOne($id));
			$image = ImageController::Show($id,1);
			array_push($product, $image['url']);
			return $product;
		}
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

	//GEtName
	//GEt name
	public static function GetName($id){
		$product =  array_values(ProductModel::GetResult($id));
		$image = ImageController::Show($id,1);
		array_push($product, $image);
		return $product;
	}
}
?>