<section class="container">
		<section id="cart-info">
				<article class="product-detail">  
					<a href="" class="img-product">
					<img src="./apps/public/upload/thumb/<?=$product[16]['url']; ?>" alt="">
					</a>
					<p class="product-name"><?=$product[12]." ".$product[2]; ?></p>
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
				<label >Địa chỉ</label><br/>
				<input type="text" placeholder="Địa chỉ" name="address" required /></br>
				<label for="">Số lượng</label>
				<input type="number" max="<?=$product[10]; ?>" name="num" required>
				<label for="">Màu sắc</label>
				
				<section class="color-cart">
				<select name="color" >
					<?php foreach ($product[17] as $key ){ ?>
						<option value="<?=$key['color'] ?>"><?=$key['color'] ?></option>
					<?php } ?>	
					</select>
				</section>
					
				
				<label >Kích Cỡ</label>
				<select name="size" >
				<?php 
					foreach ($product[18] as $key ) { ?>
					<option value="<?=$key['size']?>"><?=$key['size']?></option>
				<?php }
				?>
				</select>
				
				<button type="submit" >ĐẶT MUA</button>
				<p>Giao Hàng trong 2 ngày!</p>
			</form>	
		</section>	
	</section>
	