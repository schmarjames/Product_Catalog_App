<div class="modal-header">
	<h3><?php echo empty($user->id) ? 'Add a new product' : 'Edit product ' . $product->name; ?></h3>
</div>

<div class="modal-body">
	<?php echo validation_errors('admin/dashboard'); ?>
	<?php if(!empty($upload_info['upload_results']['error']))echo $upload_info['upload_results']['error']; ?>
	<?php echo form_open_multipart();?>
		
		<div class="form-group">
			<label for="Product Name">Product Name</label>
			<?php echo form_input('name', set_value('name', $product->name), 'class="form-control"');?>
		</div>
			
		<div class="form-group">
			<label for="Price">Price</label>
			<?php echo form_input('price', set_value('price', $product->price), 'class="form-control"');?>
		</div>
			
		<div class="form-group">
			<label for="Description">Description</label>
			<?php echo form_textarea('description', set_value('description', $product->description), 'class="form-control"'); ?>
		</div>
			
		<div class="form-group">
			<label for="Highlight Message #1">Hightlight Message #1</label>
			<?php echo form_input('highlight_message1', set_value('highlight_message1', $product->highlight_message1), 'class="form-control"');?>
		</div>
			
		<div class="form-group">
			<label for="Hightlight Message #2">Hightlight Message #2</label>
			<?php echo form_input('highlight_message2', set_value('highlight_message2', $product->highlight_message2), 'class="form-control"');?>
		</div>
		
		<div id="bullet_list_wrapper">
			<div id="bullet_set1" class="form-group">
				<label for="Bullet List Title #1">Bullet List Title #1</label>
				<?php echo form_input('bullet_list_title1', set_value('bullet_list_title1', $product->bullet_list_title1), 'class="form-control bullet_title"');?>
				<span class="help-block">Clear the bullet title to delete this bullet list.</span>
				
				<ul class="bullet_group">
					<li>
						<div class="form-group bullet_group1">
							<label for="Bullet Point Message #1">Bullet Point Message #1</label>
							<?php echo form_input('bullet_point1_1', set_value('bullet_point1_1', $product->bullet_point1_1), 'class="form-control"');?>
						</div>
					</li>
						
					<li>
						<div class="form-group bullet_group1">
							<label for="Bullet Point Message #2">Bullet Point Message #2</label>
							<?php echo form_input('bullet_point1_2', set_value('bullet_point1_2', $product->bullet_point1_2), 'class="form-control"');?>
						</div>
					</li>
					
					<li>
						<div class="form-group bullet_group1">
							<label for="Bullet Point Message #3">Bullet Point Message #3</label>
							<?php echo form_input('bullet_point1_3', set_value('bullet_point1_3', $product->bullet_point1_3), 'class="form-control"');?>
						</div>
					</li>
					
					<li>
						<div class="form-group bullet_group1">
							<label for="Bullet Point Message #4">Bullet Point Message #4</label>
							<?php echo form_input('bullet_point1_4', set_value('bullet_point1_4', $product->bullet_point1_4), 'class="form-control"');?>
						</div>
					</li>
						
					<li>
						<div class="form-group bullet_group1">
							<label for="Bullet Point Message #5">Bullet Point Message #5</label>
							<?php echo form_input('bullet_point1_5', set_value('bullet_point1_5', $product->bullet_point1_5), 'class="form-control"');?>
						</div>
					</li>
				</ul>
			</div>
					
			<div id="bullet_set2" class="form-group">
				<label for="Bullet List Title #2">Bullet List Title #2</label>
				<?php echo form_input('bullet_list_title2', set_value('bullet_list_title2', $product->bullet_list_title2), 'class="form-control bullet_title"');?>
				<span class="help-block">Clear the bullet title to delete this bullet list.</span>
				
				<ul class="bullet_group">	
					<li>
						<div class="form-group bullet_group2">
							<label for="Bullet Point Message #1">Bullet Point Message #1</label>
							<?php echo form_input('bullet_point2_1', set_value('bullet_point2_1', $product->bullet_point2_1), 'class="form-control"');?>
						</div>
					</li>
						
					<li>
						<div class="form-group bullet_group2">
							<label for="Bullet Point Message #2">Bullet Point Message #2</label>
							<?php echo form_input('bullet_point2_2', set_value('bullet_point2_2', $product->bullet_point2_2), 'class="form-control"');?>
						</div>
					</li>
					
					<li>
						<div class="form-group bullet_group2">
							<label for="Bullet Point Message #3">Bullet Point Message #3</label>
							<?php echo form_input('bullet_point2_3', set_value('bullet_point2_3', $product->bullet_point2_3), 'class="form-control"');?>
						</div>
					</li>
					
					<li>
						<div class="form-group bullet_group2">
							<label for="Bullet Point Message #4">Bullet Point Message #4</label>
							<?php echo form_input('bullet_point2_4', set_value('bullet_point2_4', $product->bullet_point2_4), 'class="form-control"');?>
						</div>
					</li>
					
					<li>
						<div class="form-group bullet_group2">
							<label for="Bullet Point Message #5">Bullet Point Message #5</label>
							<?php echo form_input('bullet_point2_5', set_value('bullet_point2_5', $product->bullet_point2_5), 'class="form-control"');?>
						</div>
					</li>
				</ul>
			</div>
			
		</div>
			
		<div class="form-group">
			<label for="Warranty Message">Warranty Message</label>
			<?php echo form_input('warranty_message', set_value('warranty_message', $product->warranty_message), 'class="form-control"');?>
		</div>
		
		<div id="upload_wrapper">
			
			<?php if(strcspn($_SERVER['REQUEST_URI'], '0123456789') != strlen($_SERVER['REQUEST_URI'])): ?>
				<div id="image_checkbox_wrapper">
				<?php for($i=0; $i<count($product_file_name); $i++): ?>
					<span class="check_wrap">
					<input type="checkbox" class="image_check" name="image_check" value="<?php echo $product_file_name[$i]->file_name; ?>">
					<img src="<?php echo site_url('../img/'. $product_file_name[$i]->file_name.''); ?>" class="file_image" alt="" />
					</span>	
				<?php endfor; ?>
				</div>
			<?php endif; ?>
					<div id="file_upload_wrapper">
						<div class="form-group">
							<div class="upload_input">
								<label for="userfile">Product Image 1</label>
								<input name="userfile1" type="file" class="input-xlarge" id="userfile" />
							</div>
						</div>
						<div class="form-group">
							<div class="upload_input">
								<label for="userfile">Product Image 2</label>
								<input name="userfile2" type="file" class="input-xlarge" id="userfile" />
							</div>
						</div>
						<div class="form-group">
							<div class="upload_input">
								<label for="userfile">Product Image 3</label>
								<input name="userfile3" type="file" class="input-xlarge" id="userfile" />
							</div>
						</div>
						<div class="form-group">
							<div class="upload_input">
								<label for="userfile">Product Image 4</label>
								<input name="userfile4" type="file" class="input-xlarge" id="userfile" />
							</div>
						</div>
						<div class="form-group">
							<div class="upload_input">
								<label for="userfile">Product Image 5</label>
								<input name="userfile5" type="file" class="input-xlarge" id="userfile" />
							</div>
						</div>
					</div>
		</div>
		<div class="form-group">
			<?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?>
		</div>
	<?php echo form_close(); ?>
</div>