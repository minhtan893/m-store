$(document).ready(function(){
///////////////////////////////////////////////////////////////////////////////////////////////
// Hàm chạy Menu	
window.Menu = {
	menu : function(){
		$('#responsive-menu').on('click',function(e){
			$('#menu').stop().slideToggle();		
		});
		$(window).resize(function(){
			var w = $(window).width();
			if(w > 480 && $('#menu').is(':hidden')) {
				$('#menu').removeAttr('style');
			}
		});
		$('#menu li').on('click',function(){
			$('a',this).removeClass('#menu-link').addClass('active-menu');
			$(this).siblings('li').children('a').removeClass('active-menu').addClass('Home-Nav-Link');
		});
		$('.navr').on('click',function(){
			$('.dropdown-menu').stop().slideToggle();
		})
	}
};
/////////////////////////////////////////////////////////////////////////////////////////////
// Hàm xử lý Client User
window.ClientUser = {
	//Hàm tạo ạo ajax thêm mới thành viên
	Save : function(username,email,password){
		//Gửi ajax dữ liệu lên để save
		$.ajax({
			url : 'http://localhost/m-store/User/AddNew',
			type : 'post',
			dataType : 'json',
			data : {
				username : username,
				email : email,
				password : password
			},
			success : function(rs){
				if(rs['status']){
					alert('Bạn đã đăng ký thành công , mời đăng nhập để tiếp tục!');
					//Chuyển về trang chủ
					window.location.href = 'http://localhost/m-store/User/Login';
				}
				else{
					alert('Đã xảy ra lỗi!');
					delay(800);
					location.reload();
				}
			}
		});
	},
	//Hàm kiểm tra password
	CheckPassword(password,rePassword){
		if(rePassword!=password){
			$('#re-pass-error').text('Xác nhận lại mật khẩu!');
			return false;
		}
		else{
			$('#re-pass-error').text('');
			return true;
		}
	},
	//Hàm  Kiểm tra và submit form Register
	Register : function(username,email,password,rePassword){
	 	//Kiểm tra đã xác nhận đúng password không
	 	if(ClientUser.CheckPassword(password,rePassword)){
	 		//Kiểm tra email đã đúng định dạng chưa và đã tồn tại chưa
	 		$.ajax({
	 			url : 'http://localhost/m-store/User/EmailExist',
	 			type: 'post',
	 			dataType : 'json',
	 			data : {
	 				email : email
	 			},
	 			success : function(rs){
	 				if(rs['status']==true){
	 					$('#email-error').text('Email đã tồn tại, mời nhập lại!');
	 				}else{
	 					$('#email-error').text('');
	 					ClientUser.Save(username,email,password);
	 				}
	 			}
	 		});
	 	}
	 }

	//
};
/////////////////////////////////////////////////////////////////////////////////////////////


})
