<?php

function Call($ctr, $act ,$act1=null){
	require_once("./apps/models/client/HomeModel.php");
	require_once("./apps/controllers/client/HomeController.php");
	require_once("./apps/models/client/CategoryModel.php");
	require_once("./apps/controllers/client/CategoryController.php");
	require_once("./apps/models/client/ProductModel.php");
	require_once("./apps/controllers/client/ProductController.php");
	require_once("./apps/models/client/ImageModel.php");
	require_once("./apps/controllers/client/ImageController.php");
	require_once("./apps/models/client/UserModel.php");
	require_once("./apps/controllers/client/UserController.php");	
	require_once("./apps/models/client/CartModel.php");
	require_once("./apps/controllers/client/CartController.php");
	$class = $ctr.'Controller';
	if($act1!=null){
		return $tmp = $class::$act($act1);
	}
	else{
		return $tmp = $class::$act();		
	}
}

// Tap hop cac controller va cac ham cua he thong
// Su dung de check 2 bien $ctr, $action tren url xem co hop le khong
$listCtr = [
	"Home" => ["Index", "NotFound"],
	"User" => ["Login", "Register","SignOut","EmailExist","AddNew","CartLogin","Id"],
	"Category"=>["GetPageLimit","GetHomeCate","GetCateMenu","Name"],
	"Product"=>['GetLimit',"GetOneCate","Id","GetSame","Cart","UpdateNum"],
	"Cart"=>['Id',"Login","Buy","CartNoRegister","BuySuccess","GetCart","Del"]
];

// Loc thong tin tu bien $ctr, $action khoi tao tai index.php
if(array_key_exists($ctr ,$listCtr)){ // Check gia tri cua $ctr co trong tap key cua listCtr hay khong
	if(in_array($act, $listCtr[$ctr])){ // Check gia tri cua $action co trong tap value cua listCtr hay khong 
		switch ($ctr) {
			case 'Home':
				Call($ctr,$act,$act_tmp);
				break;
			
			default:
				Call($ctr,$act,$act_tmp);
				break;
		}
	}else{
		$ctr = "Home";
		$act = "NotFound";
		Call($ctr, $act,$act_tmp);
	}
}else{
	$ctr = "Home";
	$act = "NotFound";
	Call($ctr, $act,$act_tmp);
}
?>