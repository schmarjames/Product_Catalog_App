<section>
	<h2>Downloads</h2>
	<table class="table table-striped">
		<tbody>
		
			<?php if(count($uploads)): foreach($uploads as $upload): ?>
			
			<tr>
				<td><?php echo anchor('download/dashboard/select_download/' . $upload->id, $upload->name); ?></td>
				<td><?php echo btn_edit('download/dashboard/select_download/' . $upload->id); ?></td>
				<td><?php echo btn_delete('download/dashboard/select_download/' . $upload->id); ?></td>
			</tr>
			<tr>
				<td colspan="3"><p><?php echo $upload->description; ?></p></td>
			</tr>
			
			<?php endforeach; ?>
			<?php else: ?>
				
				<tr>
					<td colspan="3">There aren't any downloads available at the moment.</td>
				</tr>
				
			<?php endif; ?>
		
		</tbody>
	</table>
</section>