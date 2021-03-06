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
	}
};
//////////////////////////////////////////////////////////////////////////////////////////////
//Xử lý trang CATEGORY
window.Category={
	//xử lý phân trang
	CatePage : function(catePage){

		//Lấy tất cả danh mục
		var page = catePage;
		var pageArray = LoadArray(page,0);
		if(page<=1){
			$('#next-page').css({
				display: 'none'
			});
		}
		else{
			$('#next-page').css({
				display: 'block'
			});
		}
		ShowLink(pageArray);
		ShowButton(page);
		var startIndex = 0;
				//Sự kiện khi link page thay doi
				$('.linkPage').on('click',function(){
					$(this).addClass('page-active');
					$(this).siblings('a').removeClass('page-active');
					var pageActive = $('.page-active').children('li').text();
					if(pageActive == pageArray[2] && pageActive<page){
						startIndex++;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);
					}
					if(pageActive == pageArray[0] && pageActive>1){
						startIndex--;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);
					}
					
				});
				//Sự kiện khi button thay đổi
				$('#next-page').on('click',function(){
					var pageActive = $('.page-active').children('li').text();
					if( pageActive < page ){
						var newPageActive = Number(pageActive)+1;
						$('a[link='+newPageActive+']').addClass('page-active');
						$('a[link='+newPageActive+']').siblings('a').removeClass('page-active');
						CheckButton(page);
					}
					if(newPageActive == pageArray[2] && newPageActive<page){
						startIndex++;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);

					}
				});
				//Previous
				$('#previous-page').on('click',function(){
					var pageActive = $('.page-active').children('li').text();
					if( pageActive >1 ){
						var newPageActive = Number(pageActive)-1;
						$('a[link='+newPageActive+']').addClass('page-active');
						$('a[link='+newPageActive+']').siblings('a').removeClass('page-active');
						CheckButton(page);
					}
					if(newPageActive == pageArray[0] && newPageActive>1){
						startIndex--;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);

					}
				});
		///////////////////////////////////////////////////////////////////////////////
		function LoadArray(page,startIndex){//Tạo mảng để lưu số phân trang trong 1 lần
			if(page<3){
				var arr = [];
				for(var x = 0;x<page;x++){
					arr[x] = x+1;
				}
				return arr;						
			}else{
				var arr = [];
				var y=0;
				for(var x = startIndex;x<startIndex+3;x++){
					if(x<=page){
						arr[y] = x+1;
						y++;	
					}
				}
				return arr;
			}
		}
		//Tạo Pagination
		function ShowLink(pageArray){
			for(var x=0;x<pageArray.length;x++){
				var y = x+1;
				var a = '<a href="javascript:void(0)" class="linkPage" link="'+pageArray[x]+'"id="linkPage'+y+'"><li>'+pageArray[x]+'</li></a>';
				$('.page-link').append(a);
				$('#linkPage1').addClass('page-active');
			}
		}
		
		//Hiển thị button điều hướng
		function ShowButton(page){
			$('.page-link').on('click',function() {
				CheckButton(page);
			});
		}
		//Chuyển page bằng button
		
		//checkButton
		function CheckButton(page){
			var pageActive = $('.page-active').children('li').text();
				//Hiện thị nút Previous
				if(pageActive>1){
					$('#previous-page').css({
						display: 'block'
					});
				}
				else{
					$('#previous-page').css({
						display: 'none'
					});
				}
				//hiển thị nút Next
				if(pageActive<page){
					$('#next-page').css({
						display: 'block'
					});
				}
				else{
					$('#next-page').css({
						display: 'none'
					});
				}
				
			}
		//Load Array Link Moi
		function LoadNewArray(page,pageArray,startIndex){
			var pageActive = $('.page-active').children('li').text();
			if(pageActive == pageArray[2]){
				startIndex++;
				var array = LoadArray(page,startIndex);
				return array;
				//LoadNewLink(pageArray);
			}
		}

		//Thay đổi link mới
		function LoadNewLink(pageArray){
			for(var x =0;x<pageArray.length;x++){
				var y = x+1;
				$('#linkPage'+y).children('li').text(pageArray[x]);
				$('#linkPage'+y).attr({
					link: pageArray[x]
				});
				$('#linkPage2').addClass('page-active');
				$('#linkPage2').siblings('a').removeClass('page-active');
			}
		}
	},
	//Load Cate////////////////////////////////////////////////////////////////////
	GetCate : function(catePage){
		var base = $('head base').attr('href');
		if(catePage!=0){
			//Lấy dữ liệu trang 1 mặc định
			var pageActive = $('.page-active').children('li').text();
			var url = base+'/admin/Category/GetCate';
			SendPage(pageActive,url);
			$('.pagination').on('click',function(){
				var pageActive = $('.page-active').children('li').text();
				$('tbody').empty();
				SendPage(pageActive,url,base);
			})//
		}
		//gửi ajax
		function SendPage(pageActive,url){
		var base = $('head base').attr('href');

			var arr = [];
			$.ajax({
				url : url,
				type: 'post',
				dataType : 'json',
				data : {
					page : pageActive
				},
				success : function(rs){

					for (var i = 0; i < rs.length; i++) {
						var html = "<tr tr='"+rs[i][0]+"'>";
						html+="<td><a href='javascript:void(0)' class='admin-cate-name' cateId="+rs[i][0]+" >"+rs[i][1]+"</a></td>";
						html+="<td>"+rs[i][2]+"</td>";
						html+="<td><a href='javascript:void(0)' class='admin-update-link update' cateId="+rs[i][0]+">Sửa</a></td>";
						html+="<td><a href='javascript:void(0)' class='admin-del-link del' cateId="+rs[i][0]+">Xóa</a></td>";
						$('tbody').append(html);		
					}	

				}
			}).always(function(){
				CateAction();
			});
		}
		//sử lý sự kiện khi bấm vào hành động trên danh mục
		function CateAction(){
			var base = $('head base').attr('href');
			//Gọi link đến từng category
			$('.admin-cate-name').on('click',function(){
				var cateId = $(this).attr('cateId');
				var url = base+'/admin/Category/Id/';
				url +=cateId; 
				window.location.href=url;
			});
			//Xóa Categories
			$('.del').on('click',function(){
				var con = confirm('Bạn có muốn xóa Danh mục không ?');
				if(con==true){
					var cateId = $(this).attr('cateId');
					var url = base+'/admin/Category/Del';
					$.ajax({
						url : url,
						type : 'post',
						dataType : 'json',
						data : {
							cateId : cateId,
						},
						success : function(rs){
							if(rs['status']){
								location.reload();
							}
						}
					});
				}
			});
			//Sửa danh mục
			$('.update').on('click',function(){
				var cateId = $(this).attr('cateId');
				var url = base+'/admin/Category/Update/'+cateId;
				window.location.href=url;
			});

		}

		//////////////////

	},

	/////////////////////////////
	//Xử lý form upadte hoặc thêm mới danh mục
	CateExits: function(cateName=null,cateId=null){
		var base = $('head base').attr('href');
		$.ajax({
			url : base+'/admin/Category/CheckName',
			type: 'post',
			dataType : 'json',
			data : {
				cateName : cateName
			},
			success : function(rs){
				if(rs['status']==true){
					$('#cateName-error').text('Tên danh mục đã tồn tại, mời nhập lại!');
				}else{
					$('#cateName-error').text('');
						Category.Save(cateName,cateId);
				}
			}
		});
	},

	//Lưu Danh mục/////////////////////////
	Save: function(cateName,cateId){
		var base = $('head base').attr('href');

		$.ajax({
			url : base+'/admin/Category/Save',
			type: 'post',
			dataType : 'json',
			data : {
				cateName : cateName,
				cateId : cateId
			},
			success : function(rs){
				if(rs['status']==false){
					$('#cateName-error').text('Đã xảy ra lỗi, mời nhập lại!');
				}else{
						var url =base+"/admin/Category/Id/";
						url+= rs['status'];
						window.location.href= url;
				}
			}
		});
	},
/////////////////////////////////////////////////////////////////////////////
	//lấy số trang sản phẩm trên 1 danh mục
	ProductLimit : function(productLimit){
		//Lấy tất cả danh mục
		var page = productLimit;
		var pageArray = LoadArray(page,0);
		if(page<=1){
			$('#next-page').css({
				display: 'none'
			});
		}
		else{
			$('#next-page').css({
				display: 'block'
			});
		}
		ShowLink(pageArray);
		ShowButton(page);
		var startIndex = 0;
				//Sự kiện khi link page thay doi
				$('.linkPage').on('click',function(){
					$(this).addClass('page-active');
					$(this).siblings('a').removeClass('page-active');
					var pageActive = $('.page-active').children('li').text();
					if(pageActive == pageArray[2] && pageActive<page){
						startIndex++;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);
					}
					if(pageActive == pageArray[0] && pageActive>1){
						startIndex--;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);
					}
					
				});
				//Sự kiện khi button thay đổi
				$('#next-page').on('click',function(){
					var pageActive = $('.page-active').children('li').text();
					if( pageActive < page ){
						var newPageActive = Number(pageActive)+1;
						$('a[link='+newPageActive+']').addClass('page-active');
						$('a[link='+newPageActive+']').siblings('a').removeClass('page-active');
						CheckButton(page);
					}
					if(newPageActive == pageArray[2] && newPageActive<page){
						startIndex++;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);

					}
				});
				//Previous
				$('#previous-page').on('click',function(){
					var pageActive = $('.page-active').children('li').text();
					if( pageActive >1 ){
						var newPageActive = Number(pageActive)-1;
						$('a[link='+newPageActive+']').addClass('page-active');
						$('a[link='+newPageActive+']').siblings('a').removeClass('page-active');
						CheckButton(page);
					}
					if(newPageActive == pageArray[0] && newPageActive>1){
						startIndex--;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);

					}
				});
		///////////////////////////////////////////////////////////////////////////////
		function LoadArray(page,startIndex){//Tạo mảng để lưu số phân trang trong 1 lần
			if(page<3){
				var arr = [];
				for(var x = 0;x<page;x++){
					arr[x] = x+1;
				}
				return arr;						
			}else{
				var arr = [];
				var y=0;
				for(var x = startIndex;x<startIndex+3;x++){
					if(x<=page){
						arr[y] = x+1;
						y++;	
					}
				}
				return arr;
			}
		}
		//Tạo Pagination
		function ShowLink(pageArray){
			for(var x=0;x<pageArray.length;x++){
				var y = x+1;
				var a = '<a href="javascript:void(0)" class="linkPage" link="'+pageArray[x]+'"id="linkPage'+y+'"><li>'+pageArray[x]+'</li></a>';
				$('.page-link').append(a);
				$('#linkPage1').addClass('page-active');
			}
		}
		
		//Hiển thị button điều hướng
		function ShowButton(page){
			$('.page-link').on('click',function() {
				CheckButton(page);
			});
		}
		//Chuyển page bằng button
		
		//checkButton
		function CheckButton(page){
			var pageActive = $('.page-active').children('li').text();
				//Hiện thị nút Previous
				if(pageActive>1){
					$('#previous-page').css({
						display: 'block'
					});
				}
				else{
					$('#previous-page').css({
						display: 'none'
					});
				}
				//hiển thị nút Next
				if(pageActive<page){
					$('#next-page').css({
						display: 'block'
					});
				}
				else{
					$('#next-page').css({
						display: 'none'
					});
				}
				
			}
		//Load Array Link Moi
		function LoadNewArray(page,pageArray,startIndex){
			var pageActive = $('.page-active').children('li').text();
			if(pageActive == pageArray[2]){
				startIndex++;
				var array = LoadArray(page,startIndex);
				return array;
				//LoadNewLink(pageArray);
			}
		}

		//Thay đổi link mới
		function LoadNewLink(pageArray){
			for(var x =0;x<pageArray.length;x++){
				var y = x+1;
				$('#linkPage'+y).children('li').text(pageArray[x]);
				$('#linkPage'+y).attr({
					link: pageArray[x]
				});
				$('#linkPage2').addClass('page-active');
				$('#linkPage2').siblings('a').removeClass('page-active');
			}
		}
	},	
		//Laays thông tin của tất cả sản phẩm trên 1 danh mục	
		GetProduct : function(cateId){
			var base = $('head base').attr('href');
			if(proPage!=0){
			//Lấy dữ liệu trang 1 mặc định
			var pageActive = $('.page-active').children('li').text();
			var url = base+'/admin/Product/GetProduct';
			SendPage(pageActive,url);
			$('.pagination').on('click',function(){
				var pageActive = $('.page-active').children('li').text();
				$('.cate-content').empty();
				SendPage(pageActive,url);
			})//
		}
		//gửi ajax lấy về sản phẩm
		function SendPage(pageActive,url){
			var base = $('head base').attr('href');
			var arr = [];
			$.ajax({
				url : url,
				type: 'post',
				dataType : 'json',
				data : {
					productPage : pageActive,
					cateId : cateId
				},
			success : function(rs){//Lấy về json sản phẩm
				$.each(rs,function(index, item) {
					var html ="<li>";
					html+="<img src='"+base+"/apps/public/upload/thumb/";
					html+=item[4]+"' class='admin-product-thumb'>";
					html+="<section class='admin-product-info'>"
					html+="<a href='"+base+"/admin/Product/Update/";
					html+=item[0]
					html+="' class='admin-product-name'>";
					html+=item[1]+"</a>"
					html+="<p class='admin-product-price'> ";
					html+=item[3]+" &#36</p>"
					html+="<p class='admin-product-num'>";
					html+=item[2]+" chiếc</p>";
					html+="<button class='product-del-link ' proId="+item['id']+">X</button></li>";
					$('.cate-content').append(html);
				});
				
			}
			}).always(function(){
				ProductAction();
			});
		}
		//sử lý sự kiện 
		function ProductAction(){
		var base = $('head base').attr('href');
			
			$('.product-update-link').on('click',function(){//Update sản phẩm	
				var productId = $(this).attr('proId');
				var url = base+'/admin/Product/Update/';
				url+=productId; 
				window.location.href=url;
			});
			//Xóa sản phẩm
			$('.product-del-link').on('click',function(){
				var productId = $(this).attr('proId');
				//Xác nhân xóa
				if(confirm('Bạn có muốn xóa sản phẩm không ? ')){
					//Gửi ajax xóa sản phẩm
					$.ajax({
						url : base+'/admin/Product/DelOne',
						type : "post",
						dataType : "json",
						data : {
							id : productId
						},
						success : function(rs){
							if(rs['status']==true){
								location.reload(); 
							}
							else{
								alert('Đã xảy ra lỗi');
							}
						}
					});
				}
			})
		}

	}
	//

};

//////////////////////////////////////////////////////////////////////////////////////////////	
//Xử Lý phần PRODUCT
window.Product={

	AddProduct: function(data,cateName,cateId){
		var base = $('head base').attr('href');
		for(var instanceName in CKEDITOR.instances) {
  			 console.log( CKEDITOR.instances[instanceName] );
		}
		$.ajax({
				url : base+'/admin/Product/Check',
				type : 'POST',
				dataType : 'json',
				data : data,
				contentType: false,
				cache: false,
				processData:false,
				success : function(rs){
					if(rs['status']==true){
						$('.form-error').text('Tên sản phẩm đã tồn tại!');
					}
					else{
						$('.form-error').text('');
						for ( instance in CKEDITOR.instances )
       					 CKEDITOR.instances[instance].updateElement();
						$.ajax({
							url : base+'/admin/Product/Save',
							type : 'POST',
							dataType : 'json',
							data : data,
							contentType: false,
							cache: false,
							processData:false,
							success : function(rs){
								if(rs['status']==true){
									var url = base+'/admin/Category/Id/'+cateId;
									window.location.href=url;
								}
								else{
									alert('Đã xảy ra lỗi');
									delay(800);
									window.location.href =base+'/admin/Product/Add'; 
								}
							}
						});
						
					}
				}
			});
	},
	///////////////////////////////////////////////////////////////
	UpdateProduct: function(data,cateName,name,cateId){
		var base = $('head base').attr('href');
		if(name==data.get('name')){
		$.ajax({
									
							url : base+'/admin/Product/Save',
							type : 'POST',
							dataType : 'json',
							data : data,
							contentType: false,
							cache: false,
							processData:false,
							success : function(rs){
								if(rs['status']==true){
									var url = base+'/admin/Category/Id/'+cateId;
									window.location.href=url;
								}
								else{
									alert('Đã xảy ra lỗi');
									delay(800);
									window.location.href =base+'/admin/Product/Add'; 
								}
							}
						});
		}else{
			$.ajax({
				url : base+'/admin/Product/Check',
				type : 'POST',
				dataType : 'json',
				data : data,
				contentType: false,
				cache: false,
				processData:false,
				success : function(rs){
					if(rs['status']==true){
						$('.form-error').text('Tên sản phẩm đã tồn tại!');
					}
					else{
						$('.form-error').text('');
						$.ajax({
							url : base+'/admin/Product/Save',
							type : 'POST',
							dataType : 'json',
							data : data,
							contentType: false,
							cache: false,
							processData:false,
							success : function(rs){
								if(rs['status']==true){
									var url = base+'/admin/Category/Id/'+cateId;
									window.location.href=url;
								}
								else{
									alert('Đã xảy ra lỗi');
									delay(800);
									window.location.href =base+'/admin/Product/Add'; 
								}
							}
						});
						
					}
				}
			});
		}
		
	},
};

//////////////////////////////////////////////////////////////////////////////////////////////
//Xử lý trang HOme
window.Home = {
	//lấy số trang sản phẩm trên 1 danh mục
	ProductLimit : function(productLimit){

		//Lấy tất cả danh mục
		var page = productLimit;
		var pageArray = LoadArray(page,0);
		if(page<=1){
			$('#next-page').css({
				display: 'none'
			});
		}
		else{
			$('#next-page').css({
				display: 'block'
			});
		}
		ShowLink(pageArray);
		ShowButton(page);
		var startIndex = 0;
				//Sự kiện khi link page thay doi
				$('.linkPage').on('click',function(){
					$(this).addClass('page-active');
					$(this).siblings('a').removeClass('page-active');
					var pageActive = $('.page-active').children('li').text();
					if(pageActive == pageArray[2] && pageActive<page){
						startIndex++;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);
					}
					if(pageActive == pageArray[0] && pageActive>1){
						startIndex--;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);
					}
					
				});
				//Sự kiện khi button thay đổi
				$('#next-page').on('click',function(){
					var pageActive = $('.page-active').children('li').text();
					if( pageActive < page ){
						var newPageActive = Number(pageActive)+1;
						$('a[link='+newPageActive+']').addClass('page-active');
						$('a[link='+newPageActive+']').siblings('a').removeClass('page-active');
						CheckButton(page);
					}
					if(newPageActive == pageArray[2] && newPageActive<page){
						startIndex++;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);

					}
				});
				//Previous
				$('#previous-page').on('click',function(){
					var pageActive = $('.page-active').children('li').text();
					if( pageActive >1 ){
						var newPageActive = Number(pageActive)-1;
						$('a[link='+newPageActive+']').addClass('page-active');
						$('a[link='+newPageActive+']').siblings('a').removeClass('page-active');
						CheckButton(page);
					}
					if(newPageActive == pageArray[0] && newPageActive>1){
						startIndex--;
						pageArray = LoadArray(page,startIndex);
						LoadNewLink(pageArray);

					}
				});
		///////////////////////////////////////////////////////////////////////////////
		function LoadArray(page,startIndex){//Tạo mảng để lưu số phân trang trong 1 lần
			if(page<3){
				var arr = [];
				for(var x = 0;x<page;x++){
					arr[x] = x+1;
				}
				return arr;						
			}else{
				var arr = [];
				var y=0;
				for(var x = startIndex;x<startIndex+3;x++){
					if(x<=page){
						arr[y] = x+1;
						y++;	
					}
				}
				return arr;
			}
		}
		//Tạo Pagination
		function ShowLink(pageArray){
			for(var x=0;x<pageArray.length;x++){
				var y = x+1;
				var a = '<a href="javascript:void(0)" class="linkPage" link="'+pageArray[x]+'"id="linkPage'+y+'"><li>'+pageArray[x]+'</li></a>';
				$('.page-link').append(a);
				$('#linkPage1').addClass('page-active');
			}
		}
		
		//Hiển thị button điều hướng
		function ShowButton(page){
			$('.page-link').on('click',function() {
				CheckButton(page);
			});
		}
		//Chuyển page bằng button
		
		//checkButton
		function CheckButton(page){
			var pageActive = $('.page-active').children('li').text();
				//Hiện thị nút Previous
				if(pageActive>1){
					$('#previous-page').css({
						display: 'block'
					});
				}
				else{
					$('#previous-page').css({
						display: 'none'
					});
				}
				//hiển thị nút Next
				if(pageActive<page){
					$('#next-page').css({
						display: 'block'
					});
				}
				else{
					$('#next-page').css({
						display: 'none'
					});
				}
				
			}
		//Load Array Link Moi
		function LoadNewArray(page,pageArray,startIndex){
			var pageActive = $('.page-active').children('li').text();
			if(pageActive == pageArray[2]){
				startIndex++;
				var array = LoadArray(page,startIndex);
				return array;
				//LoadNewLink(pageArray);
			}
		}
		//Thay đổi link mới
		function LoadNewLink(pageArray){
			for(var x =0;x<pageArray.length;x++){
				var y = x+1;
				$('#linkPage'+y).children('li').text(pageArray[x]);
				$('#linkPage'+y).attr({
					link: pageArray[x]
				});
				$('#linkPage2').addClass('page-active');
				$('#linkPage2').siblings('a').removeClass('page-active');
			}
		}
	},

	//Laays thông tin của tất cả sản phẩm trên 1 danh mục	
		GetProduct : function(){
			var base = $('head base').attr('href');
			if(proPage!=0){
			//Lấy dữ liệu trang 1 mặc định
			var pageActive = $('.page-active').children('li').text();
			var url = base+'/admin/Product/GetAllProduct';
			SendPage(pageActive,url);
			$('.pagination').on('click',function(){
				var pageActive = $('.page-active').children('li').text();
				$('.home-content').empty();
				SendPage(pageActive,url);
			})//
		}
		//gửi ajax lấy về sản phẩm
		function SendPage(pageActive,url){

			var base = $('head base').attr('href');
			var arr = [];
			$.ajax({
				url : url,
				type: 'post',
				dataType : 'json',
				data : {
					productPage : pageActive
				},
			success : function(rs){//Lấy về json sản phẩm
				$.each(rs,function(index, item) {
					var html ="<li>";
					html+="<img src='"+base+"/apps/public/upload/thumb/";
					html+=item[10]+"' class='admin-product-thumb'>";
					html+="<section class='admin-product-info'>"
					html+="<a href='"+base+"/admin/Product/Update/";
					html+=item[0]
					html+="' class='admin-product-name'>";
					html+=item[8]+" "+item[2]+"</a>"
					html+="<p class='admin-product-price'> ";
					html+=item[4]+" &#36</p>"
					html+="<p class='admin-product-num'>";
					html+=item[6]+" chiếc</p>";
					html+="<button class='product-del-link ' proId="+item['0']+">X</button></li>";
					$('.home-content').append(html);
				});
				
			}
			}).always(function(){
				ProductAction();
			});
		}

		function ProductAction(){
			var base = $('head base').attr('href');
			
			$('.product-del-link').on('click',function(){
				var productId = $(this).attr('proId');
				//Xác nhân xóa
				if(confirm('Bạn có muốn xóa sản phẩm không ? ')){
					//Gửi ajax xóa sản phẩm
					$.ajax({
						url : base+'/admin/Product/DelOne',
						type : "post",
						dataType : "json",
						data : {
							id : productId
						},
						success : function(rs){
							if(rs['status']==true){
								location.reload(); 
							}
							else{
								alert('Đã xảy ra lỗi');
							}
						}
					});
				}
			})
			
		}

	}

}
//////////////////////////////////////////////////////////////////////////////////////////////
	
})