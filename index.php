<?php 
	session_start();
	require_once('./apps/commons/environment.php');
	require_once('./apps/commons/connection.php');
	$act_tmp = null;
	if(isset($_GET['ctr']) && isset($_GET['act'])){
		$ctr = $_GET['ctr'];
		$act = $_GET['act'];
		if(isset($_GET['act1'])){
			$act_tmp = $_GET['act1'];
		}
	}
	else{
		$ctr = "Home";
		$act = "Index";
	}
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		require_once('apps/views/client/layout.php');
	}
	else{
		require_once('routes.php');
	}
?>