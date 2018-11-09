	<div class="row">
		<div class="col-md-4">
			<h3>View recipe</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<label for="text"><?php echo $recipe['title'] ?></label>
		</div>
	</div>

	<row>
	<?php if($recipe['image_path'] == null): ?>
		<h3>There is no picture</h3>
		<?php endif; ?>
		
		<?php if($recipe['image_path'] != null): ?>
		<a href="<?php echo $recipe['image_path'] ?>"><img src="<?php echo $recipe['image_path'] ?>" class="img-thumbnail" alt="<?php echo $recipe['title'] ?>" width="350" height="350"> </a>
		<?php endif; ?>
	</row>
		
	
		
	<div class="row">
		
		<div class="col-md-4">
			<label for="category">Category:</label>
		</div>
		<div class="col-md-4">
			<!--<p><?php// echo $recipe['category_id'] ?></p>-->
			<p><?php switch($recipe['category_id']){
			case 1:
				echo "Starters";
				break;
			case 2:
				echo "Main courses";
				break;
			case 3:
				echo "Dessert";
				break;
			case 4:
				echo "Drinks";
				break;
			} ?></p>
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="Ingredients">Ingredients</label>
		</div>
		<div class="col-md-4">
			<p><?php echo $recipe['ingredients'] ?></p>
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionMethod">Production method</label>
		</div>
		<div class="col-md-4">
			<p><?php echo $recipe['production_method'] ?></p>
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionTime">Production time</label>
		</div>
		<div class="col-md-2">
			<p><?php echo $recipe['production_time'] ?></p>
		</div>	
		<div class="col-md-4">
			<p> minutes</p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<label>Saved: </label>
		</div>


		
		<div class="col-md-4">
            <p><?php echo $recipe['saved'] ?></p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<a type="button" class="btn btn-info" href="<?php echo site_url() ?>/recipes/edit/<?php echo $recipe['id'] ?>">edit</a>
		</div>
		<div class="col-md-4">
			<a type="button" class="btn btn-info" href="<?php echo site_url() ?>/recipes/delete_recipe/<?php echo $recipe['id'] ?>">delete</a>
		</div>
		<div class="col-md-4">
			<a class="btn btn-info" href="<?php echo site_url() ?>/recipes/">Back to main page</a>
		</div>
	</div>
