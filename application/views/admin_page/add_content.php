<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> Dashboard</h2>
			
				<?php echo anchor('dashboard/add_content', 'Add Post', ' class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
<?php echo anchor('dashboard/view_content', 'View All Content', 'style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>			
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="post">
				<fieldset>
					<legend>Add Posts</legend>
					<div class="control-group">
						<label class="control-label" for="typeahead">Post Title </label>
						<div class="controls">
							<input type="text" required="required" name="title" class="span6 typeahead" data-provide="typeahead" >
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="selectError3">Page</label>
						<div class="controls">
							<select name="category" id="selectError3">
								<option value="About">About</option>
								<option value="Contacts">Contacts</option>
								<option value="Services">Services</option>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="textarea2">Content</label>
						<div class="controls">
							<textarea class="cleditor" required="required" name="content" id="textarea2" rows="6" cols="20"></textarea>
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