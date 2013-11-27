<div class="modal-header">
	<h3>Add a new upload</h3>
</div>

<div class="modal-body">
	<?php 	
		echo validation_errors();
		if(!empty($upload_info['upload_results']['error']))echo $upload_info['upload_results']['error'];
		$attribute = array('id' => 'edit_form');
		echo form_open_multipart('', $attribute);
	?>
		
		<div class="form-group">
			<label for="File Name">File Name</label>
			<?php echo form_input('name', set_value('name', $upload->name), 'class="form-control"');?>
		</div>
		
		<div class="form-group">
			<label for="File Description">File Description</label>
			<?php echo form_textarea('description', set_value('description', $upload->description), 'class="form-control"'); ?>
		</div>
			
		<div id="upload_wrapper">
			<div id="file_upload_wrapper">
				<div class="form-group">
					<div class="upload_input">
						<label for="userfile">Upload File</label>
						<input name="userfile1" type="file" class="input-xlarge" id="userfile" />
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?>
		</div>
	<?php echo form_close(); ?>
</div>