<section class="container">
	<section class="admin-slider">
	
		<?php 
			if($sliders!=null){
				foreach ($sliders as $key ) { ?>
				<section class="img-slider-show">
					<img src="<?=$url ?>/apps/public/upload/slider/<?=$key['url'] ?>" >
				</section>

				<?php }
			}
		?>
		<section class="slider-upload">
			<form action="<?php if($sliders==null){
					echo"<?=$url ?>/admin/Slider/Add";
				}else{
					echo "<?=$url ?>/admin/Slider/Update";
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