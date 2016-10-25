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
					/*console.log(cate[0][0]);
					console.log(cate[0][1]);
					console.log(cate[0][2][0][0]);
					console.log(cate[0][2][0][1]);
					console.log(cate[0][2][0][2]);
					console.log(cate[0][2][0][3]);*/
					for(i=0;i<count;i++){
						Home.ShowCate(cate[i]);
					/*console.log('cateID'+cate[i][0]);
					console.log('cateName'+cate[i][1]);
					for(j=0;j<cate[i][2].length;j++){
						console.log('id san pham'+cate[i][2][j][0]);
						console.log('ten san pham: '+cate[i][2][j][1]);
						console.log('gia '+cate[i][2][j][2]);
						console.log(cate[i][2][j][3]);
					}*/
					}		
				}
			});
		},
		//Đổ dữ liệu ra html danh mục
		ShowCate : function(cate){
			var html = "<section class='home-category'>";
			html+="<h2 class='category-name'><a href='#''>";
			html+=cate[1];
			html+="</a></h2>";
			html+="<section class='category-product'>";
				var productLimit = cate[2].length;
				for(j=0;j<productLimit;j++){
					html+="<section class='home-product'>";
					html+="<article class='product-detail'>";
					html+="<img src='apps/public/upload/thumb/";
					html+=cate[2][0][3]+"'></a>";
					html+="<p class='price'>";
					html+=cate[2][0][2];
					html+="<span>$</span></p>";
					html+="<p class='product-name'>";
					html+=cate[2][0][1];
					html+="</p><section class='cart'><a href='#' class='add-cart'> mua</a></section>";
					html+="</article>";
					html+="</section>";
				}
			html+="</section>";
			$('.home-index').append(html);	
		}
	/*=============================================================================*/
}

//////////////////////////////////////////////////////////////////////////////////////////