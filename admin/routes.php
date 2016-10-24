<?php
//Route chính
function Call($ctr, $act , $tmp = null){
	require_once("../apps/models/admin/" . $ctr . "Model.php");
	require_once("../apps/controllers/admin/" . $ctr . "Controller.php");
	$class = $ctr.'Controller';
	switch ($ctr) {
		case 'Category':
			if(isset($_GET['act1'])){//Nếu tồn tại biến cate riêng
				$act1 = $_GET['act1'];
				$tmp = $class::$act($act1);				
			}
			else{
				$tmp= $class::$act();
			}
			break;

			break;
		//Hết Categories
			case 'Product':
					require_once("../apps/models/admin/ImageModel.php");
					require_once("../apps/controllers/admin/ImageController.php");
			switch ($act) {
				case 'GetLimitByCate':
					return  $class::$act($tmp);
					break;
				case 'Update':
					if(isset($_GET['act1'])){
						$tmp = $_GET['act1'];
						return  $class::$act($tmp);
					}
					break;
				case 'Del':
					return  $class::$act($tmp);
					break;	
				case 'Save':
					$tmp = $class::$act();
					break;
				default :	
				$tmp = $class::$act();
				break;	
			}
			break;
		//Hết Product	
		//Liên hệ
		case 'Contact':
			$tmp = $class::$act();
			break;	
			default:
			$tmp = $class::$act();
			break;
		}
	}
//Route phụ


// Tap hop cac controller va cac ham cua he thong
// Su dung de check 2 bien $ctr, $action tren url xem co hop le khong

	$listCtr = [
	"Home" => ["Index", "NotFound"],
	"User"=>['SignOut'],
	"Category"=>['Index',"GetCate","Add","CheckName","Save","Name","GetAll","Update","Del"],
	"Product"=>['GetLimitByCate',"GetProduct","Add","Check","Save","Update","DelOne"],
	"Contact"=>['Index',"Update"]
	];
// Loc thong tin tu bien $ctr, $action khoi tao tai index.php
if(array_key_exists($ctr ,$listCtr)){ // Check gia tri cua $ctr co trong tap key cua listCtr hay khong
	if(in_array($act, $listCtr[$ctr])){ // Check gia tri cua $action co trong tap value cua listCtr hay khong 
		Call($ctr,$act);
	}else{
		$ctr = "Home";
		$act = "NotFound";
		Call($ctr, $act);
	}
}else{
	$ctr = "Home";
	$act = "NotFound";
	Call($ctr, $act);
}
?>