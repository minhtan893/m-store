<?php

function Call($ctr, $act){
	require_once("./apps/models/client/" . $ctr . "Model.php");
	require_once("./apps/controllers/client/" . $ctr . "Controller.php");
	$class = $ctr.'Controller';
	$tmp = $class::$act();
}

// Tap hop cac controller va cac ham cua he thong
// Su dung de check 2 bien $ctr, $action tren url xem co hop le khong
$listCtr = [
	"Home" => ["Index", "NotFound"],
	"User" => ["Login", "Register","SignOut","EmailExist","AddNew"]
];
// Loc thong tin tu bien $ctr, $action khoi tao tai index.php
if(array_key_exists($ctr ,$listCtr)){ // Check gia tri cua $ctr co trong tap key cua listCtr hay khong
	if(in_array($act, $listCtr[$ctr])){ // Check gia tri cua $action co trong tap value cua listCtr hay khong 
		switch ($ctr) {
			case 'Home':
				Call($ctr,$act);
				break;
			
			default:
				Call($ctr,$act);
				break;
		}
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