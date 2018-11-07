<?php echo validation_errors(); ?>

<?php echo form_open_multipart('recipes/add');?>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label for="text">Title</label>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="title">
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-md-4">
			<label for="category">Category:</label>
		</div>
		<div class="col-md-4">
			<div class="form-group">
					<?php 
					print "<select name='category_id'>";
					foreach ($category as $category_item) {
						print "<option value='".$category_item['id']."'>"; 
						print $category_item['title'];
						print "</option>";
					}
					print "</select>";
					?>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-md-4">
			<label for="Ingredients">Ingredients</label>
		</div>
		<div class="col-md-4">
			<textarea class="form-control" rows="5" name="ingredients"></textarea>
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionMethod">Production method</label>
		</div>
		<div class="col-md-4">
			<textarea class="form-control" rows="5" name="production_method"></textarea>
		</div>
	</div> 
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionTime">Production time</label>
		</div>
		<div class="col-md-2">
			<input type="text" class="form-control" name="production_time">
		</div>	
		<div class="col-md-4">
			<label>minutes</label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<label for="ProductionMethod">Image file</label>
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
			<input class="p-3 mb-2 bg-primary text-white" type="submit" value="upload">
		</div>
		<div class="col-md-2">
			<a class="text-primary" href="<?php echo base_url() ?>index.php/recipes/">Back to main page</a>
		</div>
	</div>

</form>