<section class="container">
		<form class='user-form' method="POST">
			<h1>Đăng Ký</h1>
			<label>UserName</label><br/>
			<input type="text" placeholder="Họ Tên" autofocus="autofocus" required="required" id="username" name="username" /></br>
			<label>Email</label><br/>
			<input type="email" placeholder="Email"  id="email" name="email" required="required" /></br>
			<p id="email-error" class="form-error"></p>
			<label>Password</label><br/>
			<input type="password" placeholder="Password" id="password" minslength="8" required="required" /></br>
			<p class="form-error" id='pass-error'></p>
			<label>Xác nhận Password</label><br/>
			<input type="password" placeholder="Re-Password" name="pass" id="re-pass" required /></br>
			<p class="form-error" id='re-pass-error'></p>
			<button type="submit" >ĐĂNG KÝ</button>
		</form>
</section>
<script>
	$(document).ready(function(){
		$('.user-form').submit(function(){//bawrt sự kiện khi form submit
		//Lấy các giá trị 
			var username = $('#username').val();			
			var email = $('#email').val();			
			var password = $('#password').val();			
			var rePassword = $('#re-pass').val();
		//Chay hàm Kiểm tra và submit form Register
			ClientUser.Register(username,email,password,rePassword);	
		return false;				
		})
	})
</script>