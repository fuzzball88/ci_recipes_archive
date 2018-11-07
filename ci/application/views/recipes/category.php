<div class="row">
	<div class="col-md-4">
		<?php foreach ($recipe as $recipe_item): ?>
			<a class="text-primary" href="<?php echo base_url() ?>index.php/recipes/view/<?php echo $recipe_item['id'] ?>"><?php echo $recipe_item['title']; ?></a>
			<br/>
		<?php endforeach; ?>
	</div>
</div> 
<div class="row">
    <div class="col-md-4">
        <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/recipes/index/">All categories</a>
			
    </div>
</div>