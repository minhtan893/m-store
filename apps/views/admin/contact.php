<section class="container">
	<section class="category-dir">
		<a href="">Home/</a>
		<span>Contact</span>
	</section>
	<section class="admin-content">
		<form action= "" class='admin-form' method='POST' id="contact">
			<label>Tên công ty</label></br>
			<input type="text" placeholder="Tên công ty" value="<?=$contact['company'];?>" autofocus required name="companyName" value=""></br>
			<label>Địa chỉ</label></br>
			<input type="text" value="<?=$contact['address'];?>" placeholder="Địa chỉ" name="address"></br>
			<label>SĐT</label></br>
			<input type="text" value="<?=$contact['phone'];?>" placeholder="Số điện thoại"  value="" name="phone"></br>
			<label>Fb</label></br>
			<input type="text" value="<?=$contact['facebook'];?>" placeholder="Facebook"  name="fb"></br>
			<label>Email</label></br>
			<input type="email" value="<?=$contact['email'];?>" placeholder="Email"  name="email"></br>
			<label for=""></label>
			<input type="submit" value="Thay đổi"></br>
		</form>
	</section>
</section>

<script>
	$(document).ready(function(){
		var base = $('head base').attr('href');	
			$('.admin-form').attr('action',base+"/admin/Contact/Update");
			$('.category-dir a').attr('href',base+"/admin/");
	})
</script>