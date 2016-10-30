<?php 
	class CartController{
		public static function Id($productId=null){
			//Lấy thông tin sản phẩm
			$product = ProductController::Cart($productId);
			require_once('./apps/views/client/cart.php');
		}
		//Đăng nhập để mua hàng
		public static function Login($productId){
				if(UserController::CartLogin($productId)){
					header('location: http://localhost/m-store/Cart/Id/'.$productId);
			}		
		}

		//Lưu giỏ hàng
		public static function Buy(){
			if(isset($_POST['customer']) && isset($_POST['city']) && isset($_POST['district']) && isset($_POST['town']) && isset($_POST['home']) && isset($_POST['price'])){
				$userId = null;
				$customer = $_POST['customer'];
				$city = $_POST['city'];
				$district = $_POST['district'];
				$town = $_POST['town'];
				$home = $_POST['home'];
				$address = $home.'-'.$town."-".$district."-".$city;
				$productId = $_POST['productId'];
				$num = $_POST['num'];
				$price= $num * $_POST['price'];
				if(isset($_SESSION['userId'])){
					$userId = $_SESSION['userId'];
				}
				$cart = new CartModel(null,$customer,$address,$price,$num,$productId,$userId);
				if($cart->Save($cart)){
					//Cập nhật số lượng trong bảng product
					ProductController::UpdateNum($num,$productId,1);//1 giảm
					header('location: ./BuySuccess');
				}
			} 
		}

		//

		public static function CartNoRegister($productId){
			$product = ProductController::Cart($productId);
			require_once('./apps/views/client/cart.php');
		}

		//
		public static function BuySuccess(){
			require_once('./apps/views/client/buy-success.php');
		}

		//Lấy dữ liệu của 1 Usesr
		public static function GetCart(){
			if(isset($_POST['userId']) && $_POST['page']){
				$userId = $_POST['userId'];
				$page = $_POST['page'];
				$cart = new CartModel(null,null,null,null,null,null,$userId);
				//lấy ra danh sách đơn hàng
				$cartList = $cart->GetCart($cart,$page);
				$count = count($cartList);
				for ($i=0; $i <$count ; $i++) { 
					array_values($cartList[$i]);
				}
				//duyệt qua từng product_Id để lấy ra hình ảnh và giá
				for ($i=0; $i <$count ; $i++) { 
					$product = ProductController::GetCart($cartList[$i][2]);
					array_push($cartList[$i], $product);
				}
				echo json_encode($cartList);	
			}
		} 
		//Số trang đơn hàng
		public static function Page($userId){
			//Lấy vè tổng số đơ hàng
			$cart = new CartModel(null,null,null,null,null,null,$userId);
			$cartList = $cart->GetLimit($cart);
			if($cartList>0){
				if($cartList%8==0){
					return $cartList/8;
				}
				else{
					return (int)($cartList/8) +1;
				}
			}
		}

		//Xóa đơn hàng
		public static function Del(){
			$id = $_POST['id'];
			//Kiểm tra status
			//Lấy ra status
			$cart = new CartModel($id,null,null,null,null,null,null);
			$cartCheck = $cart->GetStatus($cart);
			if($cartCheck['status']=='0'){//Chưa giao
				//Cập nhật lại product
				ProductController::UpdateNum((int)$cartCheck['num'],(int)$cartCheck['product_id'],0);//0 tăng
				//Xóa đơn hàng
				$cart->Del($cart);
			}else{//Đã giao
				$cart->Del($cart);
			}
			echo json_encode(['status'=>true]);
 		}
	}
?>