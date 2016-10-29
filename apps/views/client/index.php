<section class="container">
	<input type="hidden" value="<?=$pageLimit; ?>" id="pageLimit">
	<section class="home-index">
	</section>
	<section class="add-more-cate">
		<button id="load-more">Xem Thêm</button>
	</section>
</section>
<script>
	$(document).ready(function(){
		var pageLimit  =$('#pageLimit').val();//Lấy số trang sản phẩm
		var page =1;
			Home.Index(page,pageLimit);
		
		if(pageLimit>=2){//nếu số trang lớn hơn 1 thì hiện thị nút load more
			$('.add-more-cate').css({
				display: 'block'
			});
		}
		$('#load-more').on('click',function(){//xủ lý hiện thêm trang khi ấn vào phiến load more
			page++;
			Home.Index(page,pageLimit);
			if(page==pageLimit){
				$('.add-more-cate').css({
					display: 'none'
				});
			}
		})
		
	})
</script>