<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-picture"></i> Edit File</h2>
			<?php echo anchor('dashboard/add_file', 'Add Files', ' class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/view_downloads', 'View Downloads', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/add_file_category', 'Add Category', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		</div>
		<div class="box-content">
			<form method="post" class="form-horizontal">
			<fieldset>
				<legend>Edit File</legend>
				<?php echo $this->session->flashdata( '_message' ); ?>
				<div class="control-group">
					<label class="control-label" for="typeahead">Add Category </label>
					<div class="controls">
						<input type="text" required="required" class="span6 typeahead" name="cat" data-provide="typeahead" >
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