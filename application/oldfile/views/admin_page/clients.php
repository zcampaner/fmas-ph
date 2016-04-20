<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> View Clients</h2>
			<?php echo anchor('dashboard/add_client', 'Add Clients', ' class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/view_clients', 'View Clients', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		</div>
		<div class="box-content">
			<?php echo $this->session->flashdata( '_message' ); ?>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Client Name</th>
						<th>Action</th>
					</tr>
				</thead>   
				<tbody>
					<?php foreach($clients as $client ): ?>
					<tr>
						<td class="center"><?php echo $client->client_name; ?></td>
						<td class="center">
							<?php echo anchor('dashboard/del_client/'.$client->client_id, '<i class="icon-trash icon-white"></i>Delete', 'class="btn btn-danger"' ) ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->
</div><!--/row-->