<section class="container">
	<section class="result">
		<h2>Kết quả</h2>
		<?php 
		if(isset($_SESSION['productSearch']) && $_SESSION['productSearch']!=""){
			for ($i=0; $i < $count; $i++) { ?> 
			<ul class="result-ul" id="i1<?=$i ?>">
				<li>
					<img src="" class="result-img" id="result-img<?=$i ?>">
					<a href="" class='result-link' id="result-link<?=$i ?>"><?=$product[$i][1][4]." ".$product[$i][1][2] ?></a>
				</li>
			</ul>
			<script>
			$(document).ready(function(){
				var base = $('head base').attr('href');
				$('#result-img<?=$i ?>').attr('src', base+'/apps/public/upload/thumb/<?=$product[$i][1][6]['url'] ?>');
				$('#result-link<?=$i ?>').attr('href', base+'/Product/Id/<?=$product[$i][1][0]?>');
			})
			</script>
			<?php } 
		}
		if(isset($_SESSION['productIdSearch'])){ ?>
		<section>
			<ul class="result-ul" id="2">
				<li>
					<img src="" class="result-img" >
					<a href="" class="result-link"><?=$product[4]." ".$product[2] ?></a>
				</li>
			</ul>			
		</section>
		<script>
			$(document).ready(function(){
			var base = $('head base').attr('href');
				$('#2 img').attr('src', base+'/apps/public/upload/thumb/<?=$product[6]['url'] ?>');
				$('#2 a').attr('href', base+'/Product/Id/<?=$product[0] ?>');
			})
		</script>
		<?php }
		if(isset($_SESSION['cateId'])){ ?>
			<ul class="result-ul" >
				<li>
					<a href="" class="result-link" id="3"><?=$cateName['name'] ?></a>
				</li>
			</ul>
			<script>
			$(document).ready(function(){
				var base = $('head base').attr('href');
				$('#3').attr('href', base+'/Category/Id/<?=$_SESSION['cateId'] ?>');
			})
			</script>
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
<script>
	
</script>