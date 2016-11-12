<section class="container">
	<section class="admin-slider">

		<?php 
		if($sliders!=null){
			$i=0;
			foreach ($sliders as $key ) { ?>
			<section class="img-slider-show">
			<img src="" id="img<?=$i ?>"/>
			</section>
			<script>
				$(document).ready(function(){
					var base = $('head base').attr('href');
					$('#img<?=$i ?>').attr('src', base+'/apps/public/upload/slider/<?=$key['url'] ?>');
				})
			</script>
			<?php $i++; ?>
			<?php }
		}
		?>
		<section class="slider-upload" >
			<form action="" method="POST" enctype="multipart/form-data">
			<?php 
			for ($i=0; $i < 3; $i++) { ?> 
			<input type="file" name="slider<?=$i ?>">
			<?php }
			?>
			<input type="submit" value="Update">
		</form>
	</section>
</section>
</section>
<script>
	$(document).ready(function(){
		var base = $('head base').attr('href');
		$('#img').val();
		if($('#img0').attr('src')!='' && $('#img1').attr('src')!='' && $('#img2').attr('src')!=''){
			$('.slider-upload form').attr('action', base+"/admin/Slider/Update");
		}
		else{
			$('.slider-upload form').attr('action',base+"/admin/Slider/Add");
		}
	})
</script>