<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> Members</h2>
			<?php echo anchor('dashboard/view_users', 'View All Users', ' class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/add_user', 'Add New User', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		</div>
		<div class="box-content">
			<?php echo $this->session->flashdata( '_message' ); ?>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Username</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>
					<?php foreach($users as $user ): ?>
					<tr>
						<td><?php echo $user->fullname; ?></td>
						<td class="center"><?php echo $user->username; ?></td>
						<td class="center">
							<?php echo anchor('dashboard/edit_user/'.$user->id, '<i class="icon-edit icon-white"></i>Edit', 'class="btn btn-info"' ) ?>
							<?php echo anchor('dashboard/del_user/'.$user->id, '<i class="icon-trash icon-white"></i>Delete', 'class="btn btn-danger"' ) ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>            
		</div>
	</div><!--/span-->
</div><!--/row-->