/////////////////////////////////////////////////////////////////////////////////////////
//trang chủ client
Home = {
	//Hiển thị danh sách danh mục và sản phẩm nổi bật trên trang chủ
	Index : function(page){
		//gửi ajax lấy về trang danh mục/ mỗi trang 4 danh mục
		$.ajax({
			url : 'm-store/Product/GetHomeProduct',
			type : 'post',
			dataType : 'json',
			data : {
				page : page
			},
			success : function(product){
				var count = product.length;
				for(i=0;i<count;i++){
					Home.ShowProduct(product[i]);
				}
			}
		});
	},
		//Đổ dữ liệu ra html danh mục
		ShowProduct : function(product){
			var html="";
			html+="<section class='home-product'>";
				html+="<article class='product-detail'>";
				html+="<a href='m-store/Product/Id/"+product[0]+"' class=''><img class='img-product' src='m-store/apps/public/upload/thumb/";
				html+=product[4]+"'></a>";
				html+="<a href='m-store/Product/Id/"+product[0]+"' class='product-name'>";
				html+=product[3]+" "+product[1];
				html+="</a>";
				html+="<p class='price'>&#36; ";
				html+=product[2];
				html+="</p>";
				html+="</article>";
			html+="</section>";
			$('.home-index').append(html);	
		},
		
		/*=============================================================================*/
	};
	Category = {
	//Dữ liệu trên 1 danh mục
	OneCate : function(page,pageLimit,id){
		//gửi ajax lấy về trang danh mục/ mỗi trang 4 danh mục
		$.ajax({
			url : 'm-store/Product/GetOneCate',
			type : 'post',
			dataType : 'json',
			data : {
				id: id,
				page : page,
			},
			success : function(product){
					var count = product.length;
					for(i=0;i<count;i++){
						Category.ShowProduct(product[i]);
					}	
				}
			});
	},
		//Đổ dữ liệu ra html danh mục
		ShowProduct : function(product){
			var html="";
			html+="<section class='home-product'>";
			html+="<article class='product-detail'>";
			html+="<img class='img-product' src='m-store/apps/public/upload/thumb/";
			html+=product[3]+"'>";
			html+="<a href='m-store/Product/Id/"+product[0]+"' class='product-name'>";
			html+=product[1]+"</a>";
			html+="<p class='price'>&#36; ";
			html+=product[2];
			html+="</p><section class='cart'><a href='m-store/Product/Id/"+product[0]+"' class='add-cart'>mua</a></section>";
			html+="</article>";
			html+="</section>";
			$('.one-category').append(html);	
		},
		
	};

//////////////////////////////////////////////////////////////////////////////////////////
//Xử lý Product
	Product = {
		SamProduct : function(cateId){
			$.ajax({
			url : 'm-store/Product/GetSame',
			type : 'post',
			dataType : 'json',
			data : {
				id: cateId,
			},
			success : function(product){
					var count = product.length;
					console.log(product);
					for(i=0;i<count;i++){
						Product.ShowProduct(product[i]);
					}	
				}
			});
		},
		ShowProduct : function(product){
			var html="";
			html+="<li>";
			html+="<article class='product-detail'>";
			html+="<img class='img-product' src='m-store/apps/public/upload/thumb/";
			html+=product[3]+"'></a>";
			html+="<a href='m-store/Product/Id/"+product[0]+"' class='product-name'>";
			html+=product[1];
			html+="</a>";
			html+="<p class='price'>&#36;";
			html+=product[2];
			html+="</p>";
			html+="<section class='cart'><a href='m-store/Product/Id/"+product[0]+"' class='add-cart'> mua</a></section>";
			html+="</article>";
			html+="</li>";
			$('.sidebar-content').append(html);
		}
	};



//////////////////////////////////////////////////////////////////////////////////////////
// Khách hàng
User={
	//Hiển thị đơn hàng đã đặt
	GetCart : function(userId,page){
		//gửi ajax để lấy đơn hàng
		$.ajax({
			url : 'm-store/Cart/GetCart',
			type : 'post',
			dataType : 'json',
			data : {
				userId: userId,
				page : page,
			},
			success : function(cartList){
					var count = cartList.length;
					for(i=0;i<count;i++){
						User.ShowCart(cartList[i]);
					}
				}
			}).always(function(){
				$('.del').on('click',function(){
			if(confirm('Bạn có muốn xóa đơn hàng không ?')){
				var id = $(this).attr('cartId');
				User.Del(id);
			}
		})
			});
	},

	//Show Đơn hangf
	ShowCart : function(cartList){
			var html="";
			html+="<article class='cart-detail'>";
			html+="<img class='cart-img' src='m-store/apps/public/upload/thumb/";
			html+=cartList[10][16]+"'></a>";
			html+="<section class='cart-info'>";
			html+="<p class='cart-p'>Tên sản phẩm: "+cartList[10][12]+" "+cartList[10][2]+"</p><br/>";
			html+="<p class='cart-p'>Tổng tiền:&#36; "+cartList[4]+"</p><br/>";
			html+="<p class='cart-p'>Mua lúc:  "+cartList[6]+"</p><br/>";
			html+="<p class='cart-p'>Số lượng: "+cartList[3]+" </p><br/>";
			html+="<p class='cart-p'>Tên người mua:  "+cartList[1]+"</p>";
			html+="<br/>";
			html+="<p class='cart-p'>Địa chỉ: "+cartList[5]+"</p><br/>";
			html+="<p class='cart-p'>Màu sắc: "+cartList[7]+"</p><br/>";
			html+="<p class='cart-p'>Kích cỡ: "+cartList[8]+"</p><br/>";
			html+="<p class='cart-p'>Trạng thái:  ";
			if(cartList[9]!=0){
				html+="Đã giao</p>";
			}
			else{
				html+="Chưa giao</p>";
			}
			html+="<br/>";
			html+="</p><section class='cart'><a href='javascript:void(0)' cartId = '"+cartList[0]+"' class='add-cart del'> Xóa</a></section>";
			html+="</article>";
			//console.log(html);
			$('.user-cart').append(html);
		},

		//Xóa đơn hàng
		Del : function(id){
			$.ajax({
			url : 'm-store/Cart/Del',
			type : 'post',
			dataType : 'json',
			data : {
				id : id
			},
			success : function(status){
					if(status['status']==true){
						location.reload();
					}
				}
			});
		}
}
//////////////////////////////////////////////////////////////////////////////////////////