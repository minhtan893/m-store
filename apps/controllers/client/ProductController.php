<?php 
class ProductController{
	public static function HomeShow($cateId){
			//lấy ra 4 sản phẩm mới nhất trong danh mục
		$product = array_values(ProductModel::Get($cateId,4,null));
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
				//lấy ra 4 sản phẩm mới nhất trong danh mục
			$product = array_values(ProductModel::Get($id,8));
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
			$image = ImageController::Show($id,0);
				//Thêm mảng image vào mảng product
				/*
					mảng product có key: 0 : id
										1 : name
										2 : price
										3 :des
										4:cateName
										5 : mảng hình ảnh
				*/
				//Đổ ra views
										$fisrtImage = $image;
										array_values($fisrtImage);
										$productEmpty =null;
										if($product[8]==0){
											$productEmpty = "Hết hàng!";
										}
										require_once('./apps/views/client/product.php');
									}
									else{
										header('location: http://localhost/m-store');
									}
								}

		//Lấy ra sản phẩm tương tự 
		public static function GetSame(){
			if(isset($_POST['id'])){
				$cateId = $_POST['id'];
				//lấy ra 4 sản phẩm mới nhất trong danh mục
				$product = array_values(ProductModel::Get($cateId,4));
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
			//Đổ ra views
			array_push($product, $image);
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
}
?>