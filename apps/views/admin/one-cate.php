<section class="container">
	<section class="admin-content">
		<section class="admin-cate">
			<h2><?=$cateName;?></h2>
			<input id = "cateId" type="hidden" value='<?=$cate['id'];?>'>
			<input id = "proPage" type="hidden" value='<?=$productPage;?>'>
			<h5>tổng số : <?=$productLimit; ?></h5>
			<a href="admin/Product/Add" class="AddProduct">Thêm sản phẩm</a>
			<table class='admin-table'>
				<thead>
					<tr>
						<th>tên sản phẩm</th>
						<th>số lượng</th>
						<th>mô tả</th>
						<th>giá tiền</th>
						<th><a href="#">Sửa</a></th>
						<th><a href="#">Xóa</a></th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
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
		var cateId = $('#cateId').val();
		var productLimit = $('#proPage').val();
		Category.ProductLimit(productLimit);
		Category.GetProduct(cateId);

	})
</script>
