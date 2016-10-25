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
		var pageLimit  =$('#pageLimit').val();
		var page =1;
		if(pageLimit>=2){
			Home.Index(page,pageLimit);
			$('.add-more-cate').css({
				display: 'block'
			});
		}
		$('#load-more').on('click',function(){
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