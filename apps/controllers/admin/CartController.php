<?php 
class CartController{

		public static function Index(){//Hiển thị danh mục giỏ hàng
			$cart  = new CartModel(null,null,null,null,null,null,null,null,null);
			$cartLimit = $cart->GetLimit();
			//Lấy ra sô lượng sản phẩm đã bán đươc
			$product = $cart->GetProductSell();
			//duyệt để tính tống sô hàng
			$productSell = 0;
			foreach($product as $prod){ 
				$productSell =$productSell+(int)$prod['num']; 
			}
			//Trả ra views số trang và tổng số đơn hàng
			if($cartLimit % 8==0){
				$cartPage = $cartLimit/8;
			}
			else{
				$cartPage = ((int)($cartLimit/8)) +1;
			}
		//gọi view
			require_once('../apps/views/admin/all-cart.php');
		}

		//Phân trang 
		public static function GetCart(){
			$cart  = new CartModel(null,null,null,null,null,null,null,null,null);
			//Tổng số trang
			$cartLimit = $cart->GetLimit();
			if($cartLimit % 8==0){
				$cartPage = $cartLimit/8;
			}
			else{
				$cartPage = (int)($cartLimit/8) +1;
			}
			if(isset($_POST['page'])){
				$page = $_POST['page'];
				//Lấy sản phẩm bắt đẩu của trang
				$startIndex =$page*8-8;
				//Lấy ra thông tin đơn hàng trên 1 trang
				$cart = $cart->GetCate($startIndex);
				//Lấy số lượng sản phẩm của 1 danh mục
				$cartList = array_values($cart[0]);
				//duyệt qua id sản phẩm đẻ lấy tên sản phẩm và danh mục
				$cartLimit = $cart[1];
				for ($i=0; $i < $cartLimit; $i++) { 
					$product = Call("Product","GetCart",$cartList[$i][1]);	
					array_push($cartList[$i], $product);
				}
			}	
				echo json_encode($cartList);
		}
		//Update
		public static function Update(){
			if(isset($_POST['arr'])){
				$arr = $_POST['arr'];
				//Duyệt mảng cập nhật
				for ($i=0; $i <count($arr) ; $i++) { 
					$cart  = new CartModel($arr[$i][0],null,null,null,null,null,null,null,$arr[$i][1]);
					$cart->Update($cart);
				}
				echo json_encode(['rs'=>true]);
			}
		}
	}
	?>