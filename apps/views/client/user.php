<section class="container">
	<section class="user">
		<h2>Các đơn hàng đã đặt</h2>
		<input type="hidden" value="<?=$id; ?>" id="userId"><!--id user-->
		<input type="hidden" value="<?=$page; ?>" id="page"><!--Số trang đơn hàng-->
		<section class="cart-list">
			<section class="user-cart">
				
			</section>
		</section>	
	</section>
	<section class="add-more-cate">
		<button id="load-more">Xem Thêm</button>
	</section>
</section>
<script>
	$(document).ready(function(){
		var pageLimit =$('#page').val();//Lấy số trang sản phẩm
		var userId = $('#userId').val();
		if(pageLimit>=1){
			var page=1;
			User.GetCart(userId,page);
		}
		if(pageLimit>=2){//nếu số trang lớn hơn 1 thì hiện thị nút load more
			$('.add-more-cate').css({
				display: 'block'
			});
		}
		$('#load-more').on('click',function(){//xủ lý hiện thêm trang khi ấn vào phiến load more
			page++;
			User.GetCart(userId,page);
			if(page==pageLimit){
				$('.add-more-cate').css({
					display: 'none'
				});
			}
		});

		
	})
</script>