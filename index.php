<?php 
	session_start();
	require_once('apps/commons/connection.php');
	
	if(isset($_GET['ctr']) && isset($_GET['act'])){
		$ctr = $_GET['ctr'];
		$act = $_GET['act'];
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