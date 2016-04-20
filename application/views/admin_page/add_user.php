<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Add New User</h2>
			<?php echo anchor('dashboard/view_users', 'View All Users', ' class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
			<?php echo anchor('dashboard/add_user', 'Add New User', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		</div>

		<div class="box-content">

			<form class="form-horizontal" method="post">
				<fieldset>
					<legend>Add Posts</legend>
					<?php echo $this->session->flashdata( '_message' ); ?>
					<?php echo validation_errors(); ?>
					<div class="control-group">
						<label class="control-label" for="typeahead">Username </label>
						<div class="controls">
							<input type="text" name="username" required="required" class="span6 typeahead" data-provide="typeahead" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Password </label>
						<div class="controls">
							<input type="password" name="password" required="required" class="span6 typeahead" data-provide="typeahead" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Confirm Password </label>
						<div class="controls">
							<input type="password" name="passconfirm" required="required" class="span6 typeahead" data-provide="typeahead" >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="typeahead">Full Name </label>
						<div class="controls">
							<input type="text" name="fullname" required="required" class="span6 typeahead" data-provide="typeahead" >
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->
</div><!--/row-->