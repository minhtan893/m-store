<section class="container">
		<section id="cart-info">
				<article class="product-detail">  
					<a href="" class="img-product">
					<img src="./apps/public/upload/thumb/<?=$product[14]['url']; ?>" alt="">
					</a>
					<p class="product-name"><?=$product[2]; ?></p>
					<p class="price"><?=$product[4]; ?><span> $</span></p>
				</article>
		</section>

		<section id="cart-form">
			<form action="Cart/Buy" class='user-form' method="POST">
					<input type="hidden" value="<?=$product[4]; ?>" id="price" name="price">
			<input type="hidden" value="<?=$productId; ?>" name="productId">
				<h1>Khách hàng</h1>
				<label>Họ Tên</label><br/>
				<input type="text" placeholder="Họ Tên" autofocus="autofocus" name="customer" required /></br>
				<label>Tỉnh/Thành Phô</label><br/>
				<input type="text" name="city" required>
				<br/>
				<label>Quận/Huyện</label><br/>
				<input type="text" name="district" required>
				<br/>
				<label>Phường/Xã</label><br/>
				<input type="text" name="town" required>
				<br/>
				<label >Địa chỉ</label><br/>
				<input type="text" placeholder="Địa chỉ" name="home" required /></br>
				<label for="">Số lượng</label>
				<input type="number" max="<?=$product[8]; ?>" name="num" required>
				<button type="submit" >ĐẶT MUA</button>
				<p>Giao Hàng trong 2 ngày!</p>
			</form>	
		</section>	
	</section>