<?php 

	/*
	
	author : nguyen minh tan
	email : nguyenminhtan893@gmail.com
	
	*/ 
session_start();
if(isset($_SESSION['userId'])){//Kiểm tra level User
	$userId = $_SESSION['userId'];
	require_once('../apps/commons/environment.php');
	require_once('../apps/commons/connection.php');
	if(CheckLevel($userId)){
		if(isset($_GET['ctr']) && isset($_GET['act'])){
			$ctr = $_GET['ctr'];
			$act = $_GET['act'];
		}
		else{
			$ctr = "Home";
			$act = "Index";
		}

		if($_SERVER['REQUEST_METHOD'] == "GET"){
			require_once('../apps/views/admin/layout.php');
		}
		else{
			require_once('routes.php');
			}
		}
	else{
		header('location: http://localhost/m-store/');
	}
}
function CheckLevel($userId){
	require_once('../apps/models/admin/UserModel.php');
	require_once('../apps/controllers/admin/UserController.php');
	$newUser = UserController::CheckLevel($userId);
	return $newUser;
	if($newUser){
		return true;
	}
	else{
		return false;
	}
}
?>