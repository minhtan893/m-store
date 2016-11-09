<?php 
class HomeController{
	public static function Index(){
			//đổ ra số trang
		$product = Call("Product","GetAllLimit");
		$productLimit = count($product);
		if($productLimit % 8==0){
			$Page = $productLimit/8;
		}
		else{
			$Page = (int)($productLimit/8) +1;
		}
		require_once('../apps/views/admin/welcome.php');
	}
}
?>