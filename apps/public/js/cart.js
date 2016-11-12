window.Cart = {
	CartPage : function(cartPage){
		//Lấy tất cả danh mục
		var page = cartPage;
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

	//////////////////////////////////////////////////////

	GetCart : function(cartPage){
		var base = $('head base').attr('href');
		if(cartPage!=0){
			//Lấy dữ liệu trang 1 mặc định
			var pageActive = $('.page-active').children('li').text();
			var url = base+'/admin/Cart/GetCart';
			SendPage(pageActive,url);
			$('.pagination').on('click',function(){
				var pageActive = $('.page-active').children('li').text();
				$('tbody').empty();
				SendPage(pageActive,url,base);
			})//
		}
		//gửi ajax
		function SendPage(pageActive,url,base){
			$.ajax({
				url : url,
				type: 'post',
				dataType : 'json',
				data : {
					page : pageActive
				},
				success : function(rs){
					for (var i = 0; i < rs.length; i++) {
						Cart.ShowCart(rs[i],i,base);
					}
					$('tbody').append("<input type='hidden' value='"+rs.length+"' id='limit'>");
				}
			});
		}
	},

	ShowCart : function(cart,i,base){
		var html="";
		html+="<tr>";
		html+="<td>"+cart[11][2]+" "+cart[11][1]+"</td>";
		html+="<td>"+cart[4]+"</td>";
		html+="<td>"+cart[8]+"</td>";
		html+="<td>"+cart[9]+"</td>";
		html+="<td>"+cart[5]+" &#36;</td>";
		html+="<td>"+cart[3]+"</td>";
		html+="<td>"+cart[6]+"</td>";
		html+="<td>"+cart[7]+"</td>";
		if(cart[10]==0){//Chưa giao
			html+="<td><input type='radio' name='"+cart[0]+"' cartId='"+cart[0]+"' value='0' checked class='status"+i+"'>Chưa giao</td>";
			html+="<td><input type='radio' name='"+cart[0]+"' cartId='"+cart[0]+"' value='1' class='status"+i+"'>Đã giao</td>";
		}else{
			html+="<td colspan='2'><input type='radio' cartId='"+cart[0]+"' value='1' checked class='status"+i+"'>Đã giao</td>";
		}
		html+="</tr>";
		$('tbody').append(html);
	},		
	//Upadte

	Update : function(){
		$('#cart-update').on('click',function(){
			var limit = $('#limit').val();
	//Lấy ra toàn bộ id và status
	var arr = [];
		for (var i = 0; i < limit; i++) {
			var name = '.status'+i;
			var id = $(name+":checked").attr('cartId');
			var status =  $(name+":checked").val();
			var arrTmp = [];
			arrTmp.push(id);
			arrTmp.push(status);
			arr.push(arrTmp);
		}
		var base = $('head base').attr('href');

		//Gửi ajax để cập nhật
		$.ajax({
			url : base+"/admin/Cart/Update",
			type : 'post',
			dataType : 'json',
			data : {
				arr : arr
			},
			success : function(rs){
				if(rs){
					//console.log(rs);
					location.reload();
				}
				else{
					alert('Đã xảy ra lỗi!');
					location.reload();
				}
			}
		});
	});
	}
}