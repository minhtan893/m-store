<section class="container">
	<section class="result">
		<h2>Kết quả</h2>
		<?php 
		if(isset($_SESSION['productSearch']) && $_SESSION['productSearch']!=""){
			for ($i=0; $i < $count; $i++) { ?> 
			<ul class="result-ul">
				<li>
					<img src="./apps/public/upload/thumb/<?=$product[$i][1][6]['url'] ?>" class="result-img">
					<a href="Product/Id/<?=$product[$i][1][0]?>" class='result-link'><?=$product[$i][1][4]." ".$product[$i][1][2] ?></a>
				</li>
			</ul>
			<?php } 
		}
		if(isset($_SESSION['productIdSearch'])){ ?>
		<section>
			<ul class="result-ul">
				<li>
					<img src="./apps/public/upload/thumb/<?=$product[6]['url'] ?>" class="result-img">
					<a href="Product/Id/<?=$product[0] ?>" class="result-link"><?=$product[4]." ".$product[2] ?></a>
				</li>
			</ul>			
		</section>
		<?php }
		if(isset($_SESSION['cateId'])){ ?>
			<ul class="result-ul">
				<li>
					<a href="Category/Id/<?=$cateId ?>" class="result-link"><?=$cateName['name'] ?></a>
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