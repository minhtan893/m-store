<section class="container">
	<section class="admin-content">
		<form action= "#" class='admin-form'>
			<input type="hidden" id= "cateId" value=<?php  if(isset($cate)){echo $cate['id'];} ?>>
			<label>Tên danh mục</label></br>
			<input type="text" placeholder="Tên sản phẩm" autofocus required id="cateName" name="cateName" value="<?php if(isset($cate)){echo $cate['name'];} ?>"></br>
			<p class="form-error" id="cateName-error"></p>
			<input type="submit" value="update" id="submit">	
		</form>
	</section>
</section>
<script>
	$(document).ready(function(){
		$('.admin-form').submit(function(){
			var cateId = $('#cateId').val();
			var cateName = $('#cateName').val();
			Category.CateExits(cateName,cateId);
			return false;
		})
	})
</script>
