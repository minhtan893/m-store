/////////////////////////////////////////////////////////////////////////////////////////
//trang chủ client
Home = {
	//Hiển thị danh sách danh mục và sản phẩm nổi bật trên trang chủ
	Index : function(page,pageLimit){
		//gửi ajax lấy về trang danh mục/ mỗi trang 4 danh mục
		$.ajax({
			url : 'http://localhost/m-store/Category/GetHomeCate',
			type : 'post',
			dataType : 'json',
			data : {
				page : page,
				pageLimit : pageLimit
			},
			success : function(cate){
				var count = cate.length;
				for(i=0;i<count;i++){
					Home.ShowCate(cate[i]);
				}
			}
		});
	},
		//Đổ dữ liệu ra html danh mục
		ShowCate : function(cate){
			console.log(cate);
			var html = "<section class='home-category'>";
			html+="<h2 class='category-name'><a href='#'>";
			html+=cate[1];
			html+="</a></h2>";
			html+="<section class='category-product'>";
			var productLimit = cate[2].length;
			for(j=0;j<productLimit;j++){
				html+="<section class='home-product'>";
				html+="<article class='product-detail'>";
				html+="<img class='img-product' src='apps/public/upload/thumb/";
				html+=cate[2][j][3]+"'></a>";
				html+="<p class='product-name'>";
				html+=cate[2][j][1];
				html+="</p>";
				html+="<p class='price'>";
				html+=cate[2][j][2];
				html+="<span>$</span></p>";
				html+="<section class='cart'><a href='Product/Id/"+cate[2][j][0]+"' class='add-cart'>mua</a></section>";
				html+="</article>";
				html+="</section>";
			}
			html+="<a class='open-cate' href ='Category/Id/";
			html+=cate[0]+"'>Xem Thêm</a>";	
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
			url : 'http://localhost/m-store/Product/GetOneCate',
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
			html+="<img class='img-product' src='apps/public/upload/thumb/";
			html+=product[3]+"'></a>";
			html+="<p class='price'>";
			html+=product[2];
			html+="<span>$</span></p>";
			html+="<p class='product-name'>";
			html+=product[1];
			html+="</p><section class='cart'><a href='Product/Id/"+product[0]+"' class='add-cart'>mua</a></section>";
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
			url : 'http://localhost/m-store/Product/GetSame',
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
			html+="<img class='img-product' src='apps/public/upload/thumb/";
			html+=product[3]+"'></a>";
			html+="<p class='price'>";
			html+=product[2];
			html+="<span>$</span></p>";
			html+="<p class='product-name'>";
			html+=product[1];
			html+="</p><section class='cart'><a href='Product/Id/"+product[0]+"' class='add-cart'> mua</a></section>";
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
			url : 'http://localhost/m-store/Cart/GetCart',
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
			html+="<img class='cart-img' src='apps/public/upload/thumb/";
			html+=cartList[8][14]+"'></a>";
			html+="<section class='cart-info'>";
			html+="<label>Tên sản phẩm:</label><span>";
			html+=cartList[8][10]+" "+cartList[8][2];
			html+="</span><br/>";
			html+="<label>Tổng tiền:&#36; </label><span>";
			html+=cartList[4];
			html+="</span><br/>";
			html+="<label>Mua lúc:  </label><span>";
			html+=cartList[6];
			html+="</span><br/>";
			html+="<label>Số lượng:  </label><span>";
			html+=cartList[3];
			html+="</span><br/>";
			html+="<label>Tên người mua:  </label><span>";
			html+=cartList[1];
			html+="</span><br/>";
			html+="<label>Địa chỉ:  </label><span>";
			html+=cartList[5];
			html+="</span><br/>";
			html+="<label>Trạng thái:  </label><span>";
			if(cartList[7]!=0){
				html+="Đã giao";
			}
			else{
				html+="Chưa giao";
			}
			html+="</span><br/>";
			html+="</p><section class='cart'><a href='javascript:void(0)' cartId = '"+cartList[0]+"' class='add-cart del'> Xóa</a></section>";
			html+="</article>";
			//console.log(html);
			$('.user-cart').append(html);
		},

		//Xóa đơn hàng
		Del : function(id){
			$.ajax({
			url : 'http://localhost/m-store/Cart/Del',
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