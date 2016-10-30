<section class="container">
	<section class="admin-content">
		<section class="admin-cate">
			<h2 class="sexTitle">Đơn hàng</h2>
			<h5 class="index">Tổng số: <?=$cartLimit; ?></h5>
			<input type="hidden" id="Page" value="<?=$cartPage; ?>">	
			<table class="admin-table">
				<thead>
					<tr>
						<th>Tên đơn hàng</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
						<th>Người nhận</th>
						<th>Địa chỉ</th>
						<th>Thời gian đặt</th>
						<th colspan="2">Trạng thái</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<section class="cart-update">
				<button id="cart-update">Cập nhật</button>
			</section>
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
	var cartPage = $('#Page').val();
	Cart.CartPage(cartPage);
	Cart.GetCart(cartPage);
	Cart.Update();
})
</script>
