<section>
	<h2>uploads</h2>
	<?php echo anchor('admin/upload/new_upload', '<i class="glyphicon glyphicon-plus"></i> Add an upload'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Email</th>
				<th>New Upload</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		
			<?php if(count($uploads)): foreach($uploads as $upload): ?>
			
			<tr>
				<td><?php echo anchor('admin/upload/new_upload/' . $upload->id, $upload->name); ?></td>
				<td><?php echo btn_edit('admin/upload/new_upload/' . $upload->id); ?></td>
				<td><?php echo btn_delete('admin/upload/delete/' . $upload->id); ?></td>
			</tr>
			
			<?php endforeach; ?>
			<?php else: ?>
				
				<tr>
					<td colspan="3">We could not find any uploads.</td>
				</tr>
				
			<?php endif; ?>
		
		</tbody>
	</table>
</section>