<section class="container">
	<section class="result">
		<h2>Kết quả</h2>
		<?php 
		if(isset($_SESSION['productSearch']) && $_SESSION['productSearch']!=""){
			for ($i=0; $i < $count; $i++) { ?> 
			<ul class="result-ul">
				<li>
					<img src="" class="result-img" id="result-img<?=$i; ?>">
					<a href="" class='result-link' id="result-link<?=$i ?>"><?=$product[$i][1][2]." ".$product[$i][1][1] ?></a>
				</li>
			</ul>
			<script>
			$(document).ready(function(){
				var base = $('head base').attr('href');
				$('#result-img<?=$i ?>').attr('src', base+'/apps/public/upload/thumb/<?=$product[$i][1][4]['url'] ?>');
				$('#result-link<?=$i ?>').attr('href', base+'/admin/Product/Update/<?=$product[$i][0]?>');
			})
			</script>
			<?php } 
		}
		if(isset($_SESSION['productIdSearch'])){
		 ?>
		<section>
			<ul class="result-ul">
				<li id='2'>
					<img src="" class="result-img">
					<a href="" class="result-link"><?=$product[3]." ".$product[1] ?></a>
				</li>
			</ul>
			<script>
			$(document).ready(function(){
			var base = $('head base').attr('href');
				$('#2 img').attr('src', base+'/apps/public/upload/thumb/<?=$product[4]['url'] ?>');
				$('#2 a').attr('href', base+'/admin/Product/Update/<?=$_SESSION['productIdSearch'] ?>');
			})
		</script>			
		</section>
		<?php }
		if(isset($_SESSION['cateId'])){ ?>
			<ul class="result-ul">
				<li >
					<a href="" class="result-link" id="3"><?=$cateName['name'] ?></a>
				</li>
			</ul>
			<script>
			$(document).ready(function(){
				var base = $('head base').attr('href');
				$('#3').attr('href', base+'/admin/Category/Id/<?=$cateId ?>');
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