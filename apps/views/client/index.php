<section id="slide">
	<ul id="slide-display">
	<?php 
		if($sliders!=null){
			foreach ($sliders as $key ) { ?>
				<li><a href="javascrip:void(0)"><img src="./apps/public/upload/slider/<?=$key['url']?>"></a></li>
			<?php }
		}
	?>
	</ul>
</section>	
<section class="container">
	
	<input type="hidden" value="<?=$pageLimit; ?>" id="pageLimit">
	<section class="home-index">
		
	</section>
	<section class="add-more-cate">
		<button id="load-more">Xem Thêm</button>
	</section>
</section>
<script>
	$(document).ready(function(){
		var pageLimit  =$('#pageLimit').val();//Lấy số trang sản phẩm
		var page =1;
		Home.Index(page,pageLimit);
		if(pageLimit>=2){//nếu số trang lớn hơn 1 thì hiện thị nút load more
			$('.add-more-cate').css({
				display: 'block'
			});
		}
		$('#load-more').on('click',function(){//xủ lý hiện thêm trang khi ấn vào phiến load more
			page++;
			Home.Index(page,pageLimit);
			if(page==pageLimit){
				$('.add-more-cate').css({
					display: 'none'
				});
			}
		})
		$("#slide-display").responsiveSlides({
         		auto: true,             // Boolean: Animate automatically, true or false
				  speed: 500,            // Integer: Speed of the transition, in milliseconds
				  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
				  pager: false,           // Boolean: Show pager, true or false
				  nav: false,             // Boolean: Show navigation, true or false
				  random: false,          // Boolean: Randomize the order of the slides, true or false
				  pause: false,           // Boolean: Pause on hover, true or false
				  pauseControls: false,    // Boolean: Pause when hovering controls, true or false
				  prevText: "",   // String: Text for the "previous" button
				  nextText: "",       // String: Text for the "next" button
				  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
				  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
				  manualControls: "",     // Selector: Declare custom pager navigation
				  namespace: "slides",   // String: Change the default namespace used
				  before: function(){},   // Function: Before callback
				  after: function(){}     // Function: After callback
				});
	})
</script>