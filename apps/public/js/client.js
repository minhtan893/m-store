/////////////////////////////////////////////////////////////////////////////////////////
//trang chủ client
window.Home = {
	//Hiển thị danh sách danh mục và sản phẩm nổi bật trên trang chủ
	Index : function(page){
		var base = $('head base').attr('href');
		//gửi ajax lấy về trang danh mục/ mỗi trang 4 danh mục
		$.ajax({
			url : base+"/Product/GetHomeProduct",
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
				$('.price').priceFormat({
					prefix: '$ ',
					centsSeparator: ',',
					thousandsSeparator: ',',
					centsLimit: 0,
					suffix: ''
				});
			}
		});
	},
		//Đổ dữ liệu ra html danh mục
		ShowProduct : function(product){
			var base = $('head base').attr('href');
			var html="";
			html+="<section class='home-product'>";
			html+="<article class='product-detail'>";
			html+="<a href='"+base+"/Product/Id/"+product[0]+"' class=''><img class='img-product' src='"+base+"/apps/public/upload/thumb/";
			html+=product[4]+"'></a>";
			html+="<a href='"+base+"/Product/Id/"+product[0]+"' class='product-name'>";
			html+=product[3]+" "+product[1];
			html+="</a>";
			html+="<p class='price'>";
			html+=product[2];
			html+="</p>";
			html+="</article>";
			html+="</section>";
			$('.home-index').append(html);	
		},
		
		/*=============================================================================*/
	};
	window.Category = {
	//Dữ liệu trên 1 danh mục
	OneCate : function(page,pageLimit,id){
		var base = $('head base').attr('href');
		//gửi ajax lấy về trang danh mục/ mỗi trang 4 danh mục
		$.ajax({
			url : base+'/Product/GetOneCate',
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
				$('.price').priceFormat({
					prefix: '$ ',
					centsSeparator: ',',
					thousandsSeparator: ',',
					centsLimit: 0,
					suffix: ''
				});
			}
		});
	},
		//Đổ dữ liệu ra html danh mục
		ShowProduct : function(product){
			var base = $('head base').attr('href');

			var html="";
			html+="<section class='home-product'>";
			html+="<article class='product-detail'>";
			html+="<a href='"+base+"/Product/Id/"+product[0]+"' ><img class='img-product' src='"+base+"/apps/public/upload/thumb/";
			html+=product[3]+"'></a>";
			html+="<a href='"+base+"/Product/Id/"+product[0]+"' class='product-name'>";
			html+=product[1]+"</a>";
			html+="<p class='price'>&#36; ";
			html+=product[2];
			html+="</p>";
			html+="</article>";
			html+="</section>";
			$('.one-category').append(html);	
		},
		
	};

//////////////////////////////////////////////////////////////////////////////////////////
//Xử lý Product
window.Product = {
	SamProduct : function(cateId){
		var base = $('head base').attr('href');
		$.ajax({
			url : base+'/Product/GetSame',
			type : 'post',
			dataType : 'json',
			data : {
				id: cateId,
			},
			success : function(product){
				var count = product.length;
				for(i=0;i<count;i++){
					Product.ShowProduct(product[i]);
				}
				$('.price').priceFormat({
					prefix: '$ ',
					centsSeparator: ',',
					thousandsSeparator: ',',
					centsLimit: 0,
					suffix: ''
				});	
			}
		});
	},
	ShowProduct : function(product){
		var base = $('head base').attr('href');

		var html="";
		html+="<li>";
		html+="<article class='product-detail'>";
		html+="<a href='"+base+"/Product/Id/"+product[0]+"' ><img class='img-product' src='"+base+"/apps/public/upload/thumb/";
		html+=product[3]+"'></a>";
		html+="<a href='"+base+"/Product/Id/"+product[0]+"' class='product-name'>";
		html+=product[1];
		html+="</a>";
		html+="<p class='price'>";
		html+=product[2];
		html+="</p>";
		html+="</article>";
		html+="</li>";
		$('.sidebar-content').append(html);
	}
};



//////////////////////////////////////////////////////////////////////////////////////////
// Khách hàng
window.User={
	//Hiển thị đơn hàng đã đặt
	GetCart : function(userId,page){
		var base = $('head base').attr('href');
		//gửi ajax để lấy đơn hàng
		$.ajax({
			url : base+'/Cart/GetCart',
			type : 'post',
			dataType : 'json',
			data : {
				userId: userId,
				page : page,
			},
			success : function(cartList){
				var count = cartList.length;
				for(i=0;i<count;i++){
					User.ShowCart(cartList[i],base);
				}
				$('.price').priceFormat({
					prefix: '$ ',
					centsSeparator: ',',
					thousandsSeparator: '.'
				});
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
		var base = $('head base').attr('href');

		var html="";
		html+="<article class='cart-detail'>";
		html+="<img class='cart-img' src='"+base+"/apps/public/upload/thumb/";
		html+=cartList[10][16]+"'></a>";
		html+="<section class='cart-info'>";
		html+="<p class='cart-p'>Tên sản phẩm: "+cartList[10][12]+" "+cartList[10][2]+"</p><br/>";
		html+="<p class='cart-p price'>Tổng tiền:&#36; "+cartList[4]+"</p><br/>";
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
			var base = $('head base').attr('href');
			var base  = $('head base').attr('href');
			$.ajax({
				url : base+'/Cart/Del',
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