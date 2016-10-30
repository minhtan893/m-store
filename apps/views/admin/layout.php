<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>M-Store</title>
	<base href="http://localhost/m-store/" />
	<link rel="stylesheet" href="http://localhost/m-store/apps/public/css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/m-store/apps/public/js/responsiveslides.min.js"></script>
	<script type="text/javascript" src="http://localhost/m-store/apps/public/js/slide.js"></script>
	<script type="text/javascript" src="http://localhost/m-store/apps/public/js/jquery.zoom.min.js"></script>
	<script type="text/javascript" src="http://localhost/m-store/apps/public/js/admin.js"></script>
	<script type="text/javascript" src="http://localhost/m-store/apps/public/js/cart.js"></script>
</head>
<body>
	<?php 
		require_once('../apps/views/admin/header.php');
		require_once ('routes.php');
		require_once('../apps/views/admin/footer.php');
	?>
</body>
</html>