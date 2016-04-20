<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> View Downloads</h2>
			<?php echo anchor('dashboard/add_file', 'Add Files', ' class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/view_downloads', 'View Downloads', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/add_category', 'Add Category', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		</div>
		<div class="box-content">
			<?php echo $error; ?>
			<?php echo $this->session->flashdata( '_message' ); ?>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>ID</th>
						<th>Description</th>
						<th>Category</th>
						<th>URL</th>
						<th>File Type</th>
						<th>Action</th>
					</tr>
				</thead>   
				<tbody>
					<?php foreach($files as $file ): ?>
					<tr>
						<td><?php echo $file->file_id; ?></td>
						<td class="center"><?php echo $file->file_desc; ?></td>
						<td class="center"><?php echo ucfirst( $file->category_name ); ?></td>
						<td class="center"><?php echo anchor(base_url(). 'uploads/' .$file->file_name, base_url(). 'uploads/' .$file->file_name) ?></td>
						
						<td class="center"><?php echo $file->file_type; ?></td>
						<td class="center">
							<?php echo anchor('dashboard/edit_file/'.$file->file_id, '<i class="icon-cog icon-white"></i>Edit', 'class="btn btn-success"' ) ?>
							<?php echo anchor('dashboard/del_file/'.$file->file_id, '<i class="icon-trash icon-white"></i>Delete', 'class="btn btn-danger"' ) ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->
</div><!--/row-->