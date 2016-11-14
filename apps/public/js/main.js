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

window.number = {
	format :  function(c, d, t){
		var n = this, 
		c = isNaN(c = Math.abs(c)) ? 2 : c, 
		d = d == undefined ? "." : d, 
		t = t == undefined ? "," : t, 
		s = n < 0 ? "-" : "", 
		i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
		j = (j = i.length) > 3 ? j % 3 : 0;
		return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	}	
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Hàm xử lý Client User
window.ClientUser = {
	//Hàm tạo ạo ajax thêm mới thành viên
	Save : function(username,email,password){
		var base = $('head base').attr('href');

		//Gửi ajax dữ liệu lên để save
		$.ajax({
			url : base+'/User/AddNew',
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
					window.location.href = base+'/User/Login';
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
		var base = $('head base').attr('href');

	 	//Kiểm tra đã xác nhận đúng password không
	 	if(ClientUser.CheckPassword(password,rePassword)){
	 		//Kiểm tra email đã đúng định dạng chưa và đã tồn tại chưa
	 		$.ajax({
	 			url : base+'/User/EmailExist',
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
