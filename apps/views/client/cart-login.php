<section class="container">
		<form action="" class='user-form' method="post">
			<h1>Đăng Nhập</h1>
				<?php 
					if(isset($_SESSION['login_error'])){
						echo "<p>Email hoặc mật khẩu không đúng!!</p>";
					}
				?>
			<label>Tên đăng nhập</label><br/>
			<input type="email" placeholder="Email" autofocus="autofocus" name="email" required="requried" /></br>
			<label>Password</label><br/>
			<input type="password" placeholder="Password" required="requried" name="pass" /></br>
			<button type="submit" >ĐĂNG NHẬP</button>
		</form>
</section>
<script>
	$(document).ready(function(){
		var base = $('head base').attr('href');
		$('.user-form').attr('action', base+'/Cart/Login/<?=$productId ?>')
	})
</script>