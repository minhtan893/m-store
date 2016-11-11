<section class="container">
	<section class='category-dir'>
		<a href="m-store/">Home/</a>
		<a href="javascript:void(0)" class="cateName"><?=$check['name'];?></a>
	</section>
	<input type="hidden" value="<?=$pageLimit; ?>" id="pageLimit">
	<input type="hidden" value="<?=$id;?>" class="cateId">
	<section class="one-category">
		
		</section>
	</section>
	<section class="add-more-cate">
		<button id="load-more">Xem Thêm</button>
	</section>	
</section>
<script  type="text/javascript" charset="utf-8" async defer>
	$(document).ready(function(){
		var pageLimit =$('#pageLimit').val();//Lấy số trang sản phẩm
		var page =1;
		var id = $('.cateId').val();
		Category.OneCate(page,pageLimit,id);

		if(pageLimit>=2){//nếu số trang lớn hơn 1 thì hiện thị nút load more
			$('.add-more-cate').css({
				display: 'block'
			});
		}
		$('#load-more').on('click',function(){//xủ lý hiện thêm trang khi ấn vào phiến load more
			page++;
			Category.OneCate(page,pageLimit,id);
			if(page==pageLimit){
				$('.add-more-cate').css({
					display: 'none'
				});
			}
		})
	})
</script>