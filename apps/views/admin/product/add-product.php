
<section class="container">
<section class="product-option">
	<form method="POST"  action="admin/Product/Save" enctype="multipart/form-data" class="product-form">
		<label>Tên Sản phẩm</label></br>
		<input type="text" id="name" name ="name" placeholder="Tên sản phẩm" required autofocus="autofocus"></br>
		<p class="form-error"><?php if(isset($_SESSION['form-error']) && $_SESSION['form-error']!=""){
			echo $_SESSION['form-error'];
		} ?></p>
		<label for="">Danh mục</label>
		<select name="cateId" id="cateId">
		<?php
			if($cateLimit>0){
				foreach ($cateList as $key ) { 
					if($key['name']==$_SESSION['Cate']){
						echo '<option selected value="'.$key['id'].'" >'.$key["name"].'</option>';
					}
					echo '<option value="'.$key['id'].'" >'.$key["name"].'</option>';
				}
			}
		?>
		</select>
		<label>Hình đại diện</label></br>
		<img src="" alt="">
		<input type="file" name="thumb" accept="image/*"  id="thumb" required ></br>
		<label>Hình ảnh</label></br>
		<?php 
		for($i=0;$i<3;$i++){ ?>
		<img src="" alt="">
		<?php $img = 'img'.$i; ?>
		<input type="file" id="<?=$img; ?>" name="<?=$img;?>" accept="image/*" required >
		<?php }
		?>
		<label>Mô tả</label></br>
		<input type="text" name="des" id="des" placeholder="Mô tả" required ></br>
		<label>Chi Tiết</label></br>
		<textarea name="detail"  id="detail" cols="100" rows="10" required></textarea></br>
		<label>Giá tiền</label></br>
		<input type="number" id ="price" name="price" placeholder="Giá tiền" required></br>
		<label>Số Lượng</label></br>
		<input type="number" id ="num" name="num" placeholder="Số Lượng" required></br>
		<input type="hidden" id="cateName" name= "cateName">
		<input type="submit" value="update">	
	</form>
</section>
</section>
<script>
	$(document).ready(function(){
		$('.product-form').submit(function(){
			var cateId = $('#cateId option:selected').val();
			var cateName = $('#cateId option:selected').text();
			var data = new FormData(this);
			Product.AddProduct(data,cateName);
			return false;
		});
		
	})
</script>
