<section class="container">
	<section class="result">
		<h2>Kết quả</h2>
		<?php 
		if(isset($_SESSION['productSearch']) && $_SESSION['productSearch']!=""){
			for ($i=0; $i < $count; $i++) { ?> 
			<ul class="result-ul">
				<li>
					<img src="m-store/apps/public/upload/thumb/<?=$product[$i][1][4]['url'] ?>" class="result-img">
					<a href="m-store/admin/Product/Update/<?=$product[$i][0]?>" class='result-link'><?=$product[$i][1][2]." ".$product[$i][1][1] ?></a>
				</li>
			</ul>
			<?php } 
		}
		if(isset($_SESSION['productIdSearch'])){
		 ?>
		<section>
			<ul class="result-ul">
				<li>
					<img src="m-store/apps/public/upload/thumb/<?=$product[4]['url'] ?>" class="result-img">
					<a href="m-store/admin/Product/Update/<?=$_SESSION['productIdSearch'] ?>" class="result-link"><?=$product[3]." ".$product[1] ?></a>
				</li>
			</ul>			
		</section>
		<?php }
		if(isset($_SESSION['cateId'])){ ?>
			<ul class="result-ul">
				<li>
					<a href="m-store/admin/Category/Id/<?=$cateId ?>" class="result-link"><?=$cateName['name'] ?></a>
				</li>
			</ul>
	<?php	}
			if(isset($_SESSION['result-error'])){ ?>
			<ul class="result-ul">
				<li>
					<p><?=$_SESSION['result-error'] ?></p>
				</li>
			</ul>
	<?php	}
		?>
	</section>
</section>