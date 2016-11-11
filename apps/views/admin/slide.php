<section class="container">
	<section class="admin-slider">
	
		<?php 
			if($sliders!=null){
				foreach ($sliders as $key ) { ?>
				<section class="img-slider-show">
					<img src="m-store/apps/public/upload/slider/<?=$key['url'] ?>" >
				</section>

				<?php }
			}
		?>
		<section class="slider-upload">
			<form action="<?php if($sliders==null){
					echo"m-store/admin/Slider/Add";
				}else{
					echo "m-store/admin/Slider/Update";
					} ?>" method="POST" enctype="multipart/form-data">
				<?php 
					for ($i=0; $i < 3; $i++) { ?> 
							<input type="file" name="silder<?=$i ?>">
					<?php }
				?>
				<input type="submit" value="Update">
			</form>
		</section>
	</section>
</section>