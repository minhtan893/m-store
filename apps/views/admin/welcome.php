<section class="container">
	<section class="category-dir">
				<a href="" id="sp">Sản phẩm</a>
	</section>	
	<section class="admin-content">
		<section class="admin-cate">
			<input id = "proPage" type="hidden" value='<?=(int)($Page);?>'>
			<h5>tổng số : <?=$productLimit; ?></h5>
			<a href="" class="AddProduct" id="add-product">Thêm sản phẩm</a>
			<ul class="home-content">

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
		$('#sp').attr('href',base+'/admin/');
		$('#add-product').attr('href',base+'/admin/Product/Add');
		var productLimit = $('#proPage').val();
		Home.ProductLimit(productLimit);
		Home.GetProduct();
	})
</script>
