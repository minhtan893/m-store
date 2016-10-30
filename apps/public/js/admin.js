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
		if(catePage!=0){
			//Lấy dữ liệu trang 1 mặc định
			var pageActive = $('.page-active').children('li').text();
			var url = 'http://localhost/m-store/admin/Category/GetCate';
			SendPage(pageActive,url);
			$('.pagination').on('click',function(){
				var pageActive = $('.page-active').children('li').text();
				$('tbody').empty();
				SendPage(pageActive,url);
			})//
		}
		//gửi ajax
		function SendPage(pageActive,url){
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
			//Gọi link đến từng category
			$('.admin-cate-name').on('click',function(){
				var cateId = $(this).attr('cateId');
				var url = 'http://localhost/m-store/admin/Category/Id/';
				url +=cateId; 
				window.location.href=url;
			});
			//Xóa Categories
			$('.del').on('click',function(){
				var con = confirm('Bạn có muốn xóa Danh mục không ?');
				if(con==true){
					var cateId = $(this).attr('cateId');
					var url = 'http://localhost/m-store/admin/Category/Del';
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
				var url = 'http://localhost/m-store/admin/Category/Update/'+cateId;
				window.location.href=url;
			});

		}

		//////////////////

	},

	/////////////////////////////
	//Xử lý form upadte hoặc thêm mới danh mục
	CateExits: function(cateName=null,cateId=null){
		$.ajax({
			url : 'http://localhost/m-store/admin/Category/CheckName',
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
		$.ajax({
			url : 'http://localhost/m-store/admin/Category/Save',
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
					if(rs['status']==false){
						if(rs['status']==true)
					var url ="http://localhost/m-store/admin/Category/Id/";
					url+= cateId;
					window.location.href= url;
					}
					else{
					var url ="http://localhost/m-store/admin/Category/Id/";
					url+= rs['status'];
					window.location.href= url;
					}
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
			if(proPage!=0){
			//Lấy dữ liệu trang 1 mặc định
			var pageActive = $('.page-active').children('li').text();
			var url = 'http://localhost/m-store/admin/Product/GetProduct';
			SendPage(pageActive,url);
			$('.pagination').on('click',function(){
				var pageActive = $('.page-active').children('li').text();
				$('tbody').empty();
				SendPage(pageActive,url);
			})//
		}
		//gửi ajax lấy về sản phẩm
		function SendPage(pageActive,url){
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
					var html = "<tr link="+item['id']+">";
					html+="<td><a href='javascript:void(0)' class='product-name' proId="+item['id']+" >"+item['name']+"</a></td>";
					html+="<td>"+item['num']+"</td>"
					html+="<td>"+item['des']+"</td>"
					html+="<td>"+item['price']+"</td>"
					html+="<td><a href='javascript:void(0)' class='product-update-link' proId="+item['id']+">Sửa</a></td>";
					html+="<td><a href='javascript:void(0)' class='product-del-link ' proId="+item['id']+">Xóa</a></td>";
					$('tbody').append(html);
				});
				
			}
			}).always(function(){
				ProductAction();
			});
		}
		//sử lý sự kiện 
		function ProductAction(){
			//
			$('.product-update-link').on('click',function(){//Update sản phẩm	
				var productId = $(this).attr('proId');
				var url = 'http://localhost/m-store/admin/Product/Update/';
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
						url : 'http://localhost/m-store/admin/Product/DelOne',
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
		$.ajax({
				url : 'http://localhost/m-store/admin/Product/Check',
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
							url : 'http://localhost/m-store/admin/Product/Save',
							type : 'POST',
							dataType : 'json',
							data : data,
							contentType: false,
							cache: false,
							processData:false,
							success : function(rs){
								if(rs['status']==true){
									var url = 'http://localhost/m-store/admin/Category/Id/'+cateId;
									window.location.href=url;
								}
								else{
									alert('Đã xảy ra lỗi');
									delay(800);
									window.location.href ='http://localhost/m-store/admin/Product/Add'; 
								}
							}
						});
						
					}
				}
			});
	},
	///////////////////////////////////////////////////////////////
	UpdateProduct: function(data,cateName,name){
		if(name==data.get('name')){
			$.ajax({
							url : 'http://localhost/m-store/admin/Product/Save',
							type : 'POST',
							dataType : 'json',
							data : data,
							contentType: false,
							cache: false,
							processData:false,
							success : function(rs){
								if(rs['status']==true){
									var url = 'http://localhost/m-store/admin/Category/Name/'+cateName;
									window.location.href=url;
								}
								else{
									alert('Đã xảy ra lỗi');
									delay(800);
									window.location.href ='http://localhost/m-store/admin/Product/Add'; 
								}
							}
						});
						
	
		}else{
			$.ajax({
				url : 'http://localhost/m-store/admin/Product/Check',
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
							url : 'http://localhost/m-store/admin/Product/Save',
							type : 'POST',
							dataType : 'json',
							data : data,
							contentType: false,
							cache: false,
							processData:false,
							success : function(rs){
								if(rs['status']==true){
									var url = 'http://localhost/m-store/admin/Category/Name/'+cateName;
									window.location.href=url;
								}
								else{
									alert('Đã xảy ra lỗi');
									delay(800);
									window.location.href ='http://localhost/m-store/admin/Product/Add'; 
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
//Xử lý trang CATEGORY

	//Lưu Danh mục/////////////////////////
	
})