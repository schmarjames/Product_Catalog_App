<section>
	<h2>Products</h2>
	<?php echo anchor('admin/dashboard/edit', '<i class="glyphicon glyphicon-plus"></i> Add a product'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		
			<?php if(count($products)): foreach($products as $product): ?>
			
			<tr>
				<td><?php echo anchor('admin/dashboard/edit/' . $product->id, $product->name); ?></td>
				<td><?php echo btn_edit('admin/dashboard/edit/' . $product->id); ?></td>
				<td><?php echo btn_delete('admin/dashboard/delete/' . $product->id); ?></td>
			</tr>
			
			<?php endforeach; ?>
			<?php else: ?>
				
				<tr>
					<td colspan="3">We could not find any products.</td>
				</tr>
				
			<?php endif; ?>
		
		</tbody>
	</table>
</section>