
	<div class="row">
	  <div class="col-md-3"><h2>All categories</h2></div>
	  <div class="col-md-9"></div>
	</div> 
	<div class="row">
 		<div class="col-md-4"><img src="/ci/assets/images/fudgecake.jpg" class="img-fluid" alt="Responsive image"></div>
	</div>
	
	<div class="row">
		<div class="col-md-2"><a href="https://ci-recipes-archive-team10-n7pete00.c9users.io/ci/index.php/recipes/add" type="button" class="btn btn-info">Add new recipe</a></div>
		  
		<div class="col-md-10"></div>
	</div> 
	
	<div class="row">
		<div class="col-md-4"><h2>All recipes</h2></div>
	</div> 
	<div class="row">
		<div class="col-md-4">
			<?php foreach ($recipe as $recipe_item): ?>
				<a class="btn btn-outline-info" href="https://ci-recipes-archive-team10-n7pete00.c9users.io/ci/index.php/recipes/view/<?php echo $recipe_item['id'] ?>"><?php echo $recipe_item['title']; ?></a>
				<br/>
			<?php endforeach; ?>
		</div>
	</div> 
	
