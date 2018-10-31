
<div class="row">
	<div class="col-md-4"><h3>Edit recipe</h3></div>
</div>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('recipes/edit'); ?>
<!--HIDDEN INFO-->
<input type="hidden" name="id" value="<?php echo $recipe['id']?>">
<input type="hidden" name="imgvalue" value="<?php echo $recipe['image_path']?>">
<!--END OF HIDDEN INFO-->

<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label for="text">Title</label>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="title" value="<?php echo $recipe['title'] ?>">
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<label for="category">Category:</label>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<select class="form-control" name="category_id" value="<?php echo $recipe['category_id'] ?>">
					
					<option value="1">Starters</option>
					<option value="2">Main courses</option>
					<option value="3">Desserts</option>
					<option value="4">Drinks</option>
					
					
				</select>
			</div>
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="Ingredients">Ingredients</label>
		</div>
		<div class="col-md-4">
			<textarea class="form-control" rows="5" name="ingredients"><?php echo $recipe['ingredients']?></textarea>
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionMethod">Production method</label>
		</div>
		<div class="col-md-4">
			<textarea class="form-control" rows="5" name="production_method"><?php echo $recipe['production_method'] ?></textarea>
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionTime">Production time</label>
		</div>
		<div class="col-md-2">
			<input type="text" class="form-control" name="production_time" value="<?php echo $recipe['production_time'] ?>">
		</div>	
		<div class="col-md-4">
			<label>minutes</label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<label>Current image</label>
		</div>
		<div class="col-md-4">
			<?php if($recipe['image_path'] == null): ?>
			<h3>There is no picture</h3>
			<?php endif; ?>
			
			<?php if($recipe['image_path'] != null): ?>
			<a href="<?php echo $recipe['image_path'] ?>"><img src="<?php echo $recipe['image_path'] ?>" class="img-thumbnail" alt="<?php echo $recipe['title'] ?>" width="350" height="350"> </a>
			<?php endif; ?>
		</div>
		
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<label>Change image</label>
		</div>
		<div class="col-md-4">
			<input type="file" name="userfile" />
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-4">
			<img src="/ci/assets/images/cupcake.png" class="img-fluid" alt="Responsive image">
		</div>
		<div class="col-md-2">
			<input class="p-3 mb-2 bg-primary text-white" type="submit" value="update" name="submit">
		</div>
		<div class="col-md-2">
			<a class="text-primary" href="https://ci-recipes-archive-team10-n7pete00.c9users.io/ci/index.php/recipes/">Back to main page</a>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
