<!--
	<div class="row">
		  	<div class="col-md-4">
			  	<div class="btn-group">
			  		<?php echo form_dropdown('categories', $category, 'Starters'); ?>

			  	</div>
			</div> 
	</div>
-->
	
	
	
	
	
		
			<div class="form-group">
				<label for="category">Category</label>
				 <?php 
				 $attributes = 'class="form-control" id="category"';
            	 echo form_dropdown('category', $category, set_value('category'), $attributes); ?>
				
				
				
					
					<!--
					<option value="1">Starters</option>
					<option value="2">Main courses</option>
					<option value="3">Desserts</option>
					<option value="4">Drinks</option>
					-->
					
				</select>
			</div>
		</div>
	</div>