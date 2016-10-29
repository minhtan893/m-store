<section class="container">
	<section class="category-dir">
		<a href="#">Home/</a>
		<span><a href="Category/Name/<?=$product[10]; ?>"><?=$product[10];?> </a></span>
		<span>/<?=$product[3];?></span>
	</section>	
	<input type="hidden" id='cateId' value='<?=$product[12]; ?>'>
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
				<h1><?=$product[3];  ?></h1>
				<p id='product-price'>$ <?=number_format($product[5],2);  ?></p>
				<p id="product-price">Số lượng : <?=$product[8]; ?></p>
				<p id='product-review'><?=$product[7];?></p>
				<section id="add-cart">	
					<?php 
					if($productEmpty!=null){
						echo "<p>Hết hàng!</p>";
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
		</section>
		
		<section class="sidebar">
			<ul class="sidebar-content">
				<h4>Sản phẩm tương tự</h4>
			</ul>
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

			//Lấy sản phẩm tương tự
			var cateId = $('#cateId').val();
			Product.SamProduct(cateId);
		})
	</script>
