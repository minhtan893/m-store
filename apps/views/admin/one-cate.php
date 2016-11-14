<section class="container">
	<section class="category-dir">
				<a href="">Danh mục/</a>
				<span><?=$_SESSION['Cate'];?></span>
	</section>	
	<section class="admin-content">
		<section class="admin-cate">
			<input id = "cateId" type="hidden" value='<?=$cate['id'];?>'>
			<input id = "proPage" type="hidden" value='<?=(int)($productPage);?>'>
			<h5>tổng số : <?=$productLimit; ?></h5>
			<a href="javascript:void(0)" class="AddProdsuct" id="add-product">Thêm sản phẩm</a>
			<ul class="cate-content">

			</ul>
			<section class="page">
				<ul class="pagination">
					<a href="javascript:void(0)" id="previous-page"><li><<</li></a>
					<section class="page-link">
					</section>
					<a href="javascript:void(0)" id="next-page"><li>>></li></a>
				</ul>
			</section>
		</section>
	</section>
</section>
<script>
	$(document).ready(function(){
		var base = $('head base').attr('href');
		$('.category-dir a').attr('href', base+"/admin/Category");
		$('#add-product').on('click',function(){
		window.location.href = base+"/admin/Product/Add";
	})
		var cateId = $('#cateId').val();
		var productLimit = $('#proPage').val();
		console.log(cateId);
		console.log(productLimit);
		Category.ProductLimit(productLimit);
		Category.GetProduct(cateId);

	})
</script>
