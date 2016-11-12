
<section class="container">
	<section class="category-dir">
		<a href="<?=$url ?>admin">Home/</a>
		<span><a href="<?=$url ?>/admin/Category/Id/<?=$product['cateId']; ?>"><?=$product["cateName"];?> </a></span>
		<span>/<?=$product['name'];?></span>
	</section>	
	<section class="product-option">
		<form method="POST"  action="<?=$url ?>/admin/Product/Save" enctype="multipart/form-data" class="product-form">
			<label>Tên Sản phẩm</label></br>
			<input type="text" id="name" name ="name" placeholder="Tên sản phẩm" required autofocus="autofocus" value="<?=$product['name']; ?>"></br>
			<label >Chi tiết sản phẩm</label>
			<textarea name="des" id="des"  required></textarea>
			<label >Thông số kỹ thuật</label>
			<textarea name="feature" id="feature"  required></textarea>
			<p class="form-error">
			<?php if(isset($_SESSION['form-error']) && $_SESSION['form-error']!=""){
					echo $_SESSION['form-error'];
				} ?>
			</p>
			<label for="">Danh mục</label>
			<select name="cateId" id="cateId">
				<option selected value="<?=$product['cateId'] ; ?>" ><?=$product["cateName"];?></option>
			</select>
			<label>Hình đại diện</label></br>
				<?php 
					foreach ($image as $key ) {
						if($key['status_thumb']==1){ ?>
							<img src="<?="<?=$url ?>/apps/public/upload/thumb/".$key['url']; ?>" class="thumb-update"/>
							<input type="file" name="thumb" accept="image/*"  placeholder="Chọn hình đại diện"></br>
						<?php } 
					
					else{ ?>
						<section class="image-product-wraper">
							<img src="<?="<?=$url ?>/apps/public/upload/".$key['url']; ?>" class="update-product-image"/>
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
			<label>Giá tiền</label></br>
			<input type="number" id ="price" name="price" placeholder="Giá tiền" required value="<?=$product['price']; ?>"></br>
			<label >Màu sắc</label></<br>
			<section id="color-select">
			<?php 
				foreach ($color as $key ) { ?>
					<input type="text"  name="color[]" value='<?=$key['color'] ?>'></br>
			<?php	}
			?>
			</section>
			<a href="javascript:void(0)" id="add-color">Thêm màu</a>
			<label>Kích cỡ</label><br/>
			<?php 
			foreach ($size as $key ) { ?>
				<label><?=$key['size'] ?></label><input type="checkbox" checked name='size[]' value="<?=$key['size'] ?>">
			<?php }
			?>
			<label>Số Lượng</label></br>
			<input type="number" id ="num" name="num" placeholder="Số Lượng" required value="<?=$product['num']; ?>"></br>
			<label>Mô tả</label></br>
			<input type="submit" value="update">	
			<input type="hidden" value="<?=$id?>" id="prodId" name="id">
		</form>
	</section>
</section>
<script>
		CKEDITOR.replace('des');
	 	CKEDITOR.replace('feature');
	$(document).ready(function(){
		var name = $('#name').val();
		$('.product-form').submit(function(){
			var cateId = $('#cateId option:selected').val();
			var cateName = $('#cateId option:selected').text();
			for ( instance in CKEDITOR.instances )
   			 CKEDITOR.instances[instance].updateElement();
			var data = new FormData(this);
			Product.UpdateProduct(data,cateName,name,cateId);
			return false;
		});
		$('#add-color').on('click',function(){
			
			var x = "<input type='text'  name='color[]' ></br>";
			$('#color-select').append(x);
		})
		
	})
	 
</script>
