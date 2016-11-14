<section class="container">
	<section class="category-dir">
		<a href="">Home/</a>
		<span>Danh mục</span>
	</section>
	<section class="admin-content">
		<section class="admin-cate">
			<h5 class="index">Tổng số: <?=$cateLimit; ?></h5>
			<input type="hidden" id="Page" value="<?=$catePage; ?>">	
			<table class="admin-table">
				<thead>
					<tr>
						<th>Tên Danh Mục</th>
						<th>Số Lượng Mẫu Mã</th>
						<th colspan="5"><a href=""><a href="javascript:void(0)" class="admin-add-link" id="add-cate">Thêm Danh Mục</a></a></th>
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
	var base = $('head base').attr('href');
	$('.category-dir a').attr('href',base+"/admin/");
	$('#add-cate').on('click',function(){
		window.location.href = base+"/admin/Category/Add";
	})
	var catePage = $('#Page').val();
	Category.CatePage(catePage);
	Category.GetCate(catePage);
})
</script>
