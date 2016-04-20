<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> Posts</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php echo $this->session->flashdata( '_message' ); ?>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Title</th>
						<th>Category</th>
						<th>Author</th>
						<th>Date</th>
					</tr>
				</thead>   
				<tbody>
					<?php foreach($posts as $post): ?>
					<tr>
						<td><?php echo $post->title; ?></td>
						<td class="center"><?php echo $post->category; ?></td>
						<td class="center"><?php echo $post->author; ?></td>
						<td><?php echo date('M d h:i a', $post->date); ?></td>
						<td class="center">
							
							<!-- <a class="btn btn-info" href="#">
								<i class="icon-edit icon-white"></i>  
								Edit                                            
							</a> -->
							<?php echo anchor('dashboard/delete_content/'.$post->post_id, '<i class="icon-trash icon-white"></i>Delete', 'class="btn btn-danger"' ) ?>
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->
</div><!--/row-->