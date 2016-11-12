
<section class="container">
<section class="product-option">
	<form method="POST"  action="" enctype="multipart/form-data" class="product-form" id="add-product-form">
		<label>Mô tả</label></br>
		<textarea name="des"  id="des"  row="10"></textarea></br>
		<label>Thông số kỹ thuật</label></br>
		<textarea name="feature"  id="feature" row="10"></textarea></br>
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
		<label>Giá tiền</label></br>
		<input type="number" id ="price" name="price" placeholder="Giá tiền" required></br>
		<label>Màu sắc</label></br>
		<section id="color-select">
			<input type="text" name="color[]" required></br>
		</section>
		<button type="button" id="add-color">Thêm màu</button>
		<label>Kích thước</label></br>
		<input type="checkbox" name="size[]"  value='45mm' >45mm</br>
		<input type="checkbox" name="size[]"  value='35mm' >35mm</br>
		<input type="checkbox" name="size[]"  value='25mm' >25mm</br>
		<label>Số Lượng</label></br>
		<input type="number" id ="num" name="num" placeholder="Số Lượng" required></br>
		<input type="hidden" id="cateName" name= "cateName">
		<input type="submit" value="update">	
	</form>
</section>
</section>
<script>
	 CKEDITOR.replace('des');
	CKEDITOR.replace('feature');
	
	$(document).ready(function(){
		var base=$('head base').attr('href')+"/admin/Product/Save";
		$('#add-product-form').attr('action',base);
		$('.product-form').submit(function(){
			var cateId = $('#cateId option:selected').val();
			var cateName = $('#cateId option:selected').text();
			for ( instance in CKEDITOR.instances )
   			 CKEDITOR.instances[instance].updateElement();
			var data = new FormData(this);
			Product.AddProduct(data,cateName,cateId);
			return false;
		});
		$('#add-color').on('click',function(){
			var x = "<input type='text'  name='color[]' required></br>"
			$('#color-select').append(x);
		})
	})
</script>
