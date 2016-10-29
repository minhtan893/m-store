
<section class="container">
	<section class="product-option">
		<form method="POST"  action="admin/Product/Save" enctype="multipart/form-data" class="product-form">
			<label>Tên Sản phẩm</label></br>
			<input type="text" id="name" name ="name" placeholder="Tên sản phẩm" required autofocus="autofocus" value="<?=$product['name']; ?>"></br>
			<p class="form-error"><?php if(isset($_SESSION['form-error']) && $_SESSION['form-error']!=""){
				echo $_SESSION['form-error'];
			} ?></p>
			<label for="">Danh mục</label>
			<select name="cateId" id="cateId">
				
				<option selected value="<?=$product['cateId'] ; ?>" ><?=$product["cateName"];?></option>
			</select>
			<label>Hình đại diện</label></br>
				<?php 
					foreach ($image as $key ) {
						if($key['status_thumb']==1){ ?>
							<img src="<?="http://localhost/m-store/apps/public/upload/thumb/".$key['url']; ?>" />
							<input type="file" name="thumb" accept="image/*"  id="thumb"  ></br>

						<?php } 
					
					else{ ?>

						<section class="image-product-wraper">
							<img src="<?="http://localhost/m-store/apps/public/upload/".$key['url']; ?>" class="product-image"/>
						</section>	
					<?php }
					}
				?>


				<?php 
					for($i=0;$i<3;$i++){ ?>
				<img src="" alt="">
				<?php $img = 'img'.$i; ?>
				<input type="file" id="<?=$img; ?>" name="<?=$img;?>" accept="image/*"  >
				<?php } ?>
			<label>Mô tả</label></br>
			<textarea name="des" rows="10"><?=$product['des']; ?></textarea>
			<label>Giá tiền</label></br>
			<input type="number" id ="price" name="price" placeholder="Giá tiền" required value="<?=$product['price']; ?>"></br>
			<label>Số Lượng</label></br>
			<input type="number" id ="num" name="num" placeholder="Số Lượng" required value="<?=$product['num']; ?>"></br>
			<input type="submit" value="update">	
			<input type="hidden" value="<?=$id?>" id="prodId" name="id">
		</form>
	</section>
</section>
<script>
	$(document).ready(function(){
		var name = $('#name').val();
		$('.product-form').submit(function(){
			var cateId = $('#cateId option:selected').val();
			var cateName = $('#cateId option:selected').text();
			var data = new FormData(this);
			Product.UpdateProduct(data,cateName,name);
			return false;
		});
		
	})
</script>
