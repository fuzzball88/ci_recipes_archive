	<div class="row">
		  	<div class="col-md-4">
			  	<div class="btn-group">
			  	    <?php foreach ($category as $category_item):?>
			  		<a href="https://ci-recipes-archive-team10-n7pete00.c9users.io/ci/index.php/recipes/get/<?php echo $category_item['id']?>" type="button" class="btn btn-warning"><?php echo $category_item['title']; ?></a>
			  		<?php endforeach; ?>
			  	</div>
			</div> 
	</div>