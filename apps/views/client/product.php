<section class="container">
	<section class="category-dir">
		<a href="./">Home/</a>
		<span><a href="Category/Id/<?=$product[14]; ?>"><?=$product[12];?> </a></span>
		<span>/<?=$product[3];?></span>
	</section>	
	<input type="hidden" id='cateId' value='<?=$product[14]; ?>'>
	<section id="product-page">
		<section id="product">
			<section id="product-image">
				<section id="zoom">
					<img src="./apps/public/upload/<?=$fisrtImage[0][0]; ?>" alt="" id="zoomclass">
				</section>
				<ul id="zoom-array">
					<?php
					foreach ($image as $key ) { ?>
					<section class="product-img">
						<li>
						<img src="./apps/public/upload/<?=$key['url'	]; ?>" alt="">
						</li>
					</section>
					<?php	}
					?>
					
				</ul>
			</section>
			<section id="product-info">
				<h2><?=$product[3];  ?></h2>
				<p id='product-review'>
					<?php 
					foreach ($color as $key ) { ?>
						<article class="color" style="background-color:<?=$key['color'] ?>"></article>
					<?php }
					?>
				</p>
				<p id='product-price' >$ <?=number_format($product[5],2);  ?></p>
				<?php if($productEmpty!=null){ 
						echo "<p id='product-price'>Hết hàng</p>";
					}
				?>	
				<p id="product-price" style="display:none">Số lượng : <?=$product[10]; ?></p>
				<section class='ad'>
					<p>Bảo hành 10 năm Các thương hiệu khác thuộc hệ thống M-Store</p>
					<p>Đặt online hoặc gọi 0123456789 để có cơ hội nhận :</p>
					<ul>
						<li>voucher 500.000 khi mua phụ kiện tại cửa hàng.</li>
						<li>voucher spa.</li>
					</ul>

				</section>
				<p id="support">Hỗ trợ trực tuyến: 0123456789</p>
				<section id="add-cart">	
					<?php 
					if($productEmpty!=null){
					}
					else{ ?>
							<section class="pay-option">
								<?php 
									if(!isset($_SESSION['userId'])){ ?><!--Chưa đăng nhập-->
										<a href="Cart/Login/<?=$product[0];?>" class="cart-action">Mua Ngay<p>(đăng nhập)</p></a>
										<a href="Cart/CartNoRegister/<?=$product[0]; ?>" class="cart-action no-register">Đặt Mua Không Cần Đăng Ký</a>
								<?php	}
								else{ ?>
									<a href="Cart/Id/<?=$product[0]; ?>" class="cart-action">Mua Ngay</a><!--Đã đăng nhập-->
								 <?php }
								?>
							</section>
					<?php }
					?>
				</section>
			</section>
			<ul class="discription">
				<li class="discription-link" id="chitiet-link"><a href="javascript:void(0)" id="active">Chi tiết sản phẩm</a>
					
				</li>
				<li class="discription-link" id='thongso-link'><a href="javascript:void(0)">Thông số kỹ thuật</a>	
					
				</li>
				<article class="product-detail-kt open" id="chitiet">
						<?=$product[6] ?>
					</article>
				<article class="product-detail-kt" id="thongso">
						<?=$product[8] ?>
				</article>
			</ul>
		</section>
		
		<section class="sidebar">
			<ul class="sidebar-content">
				<h4>Sản phẩm tương tự</h4>
			</ul>
		</section>
		
	</section>
	</section>
	<script>
		$(document).ready(function(){
			//Zoom Hinhf Anhr
			$('#zoom').zoom();
			$('.product-img').on('click',function(){
				var img = $(this).find('img').attr('src');
				$('#zoom').find('img').remove();
				var imgtag = "<img src ='";
				imgtag+=img+"'id='zoomclass'>";
				$('#zoom').append(imgtag);
				$('#zoom').zoom();
			});
			$('#chitiet-link').on('click',function(){
				$(this).children('a').attr('id', 'active');
				$('#thongso').removeClass('open');
				$('#chitiet').addClass('open')
				$(this).siblings('li').children('a').attr('id','');
			});
			$('#thongso-link').on('click',function(){
				$(this).children('a').attr('id', 'active');
				$('#chitiet').removeClass('open');
				$('#thongso').addClass('open')
				$(this).siblings('li').children('a').attr('id','');
			})
			//Lấy sản phẩm tương tự
			var cateId = $('#cateId').val();
			Product.SamProduct(cateId);
		})
	</script>
	