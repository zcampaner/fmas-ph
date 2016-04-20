<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-picture"></i> Gallery</h2>
			<a href="add_album" class="btn btn-xs btn-primary pull-right" data-toggle="button">Add New Album</a>
			<a href="view_albums" style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button">View Albums</a>
		</div>
		<div class="box-content">
			<?php echo form_open_multipart('dashboard/do_upload', 'class="form-horizontal"') ?>	
				<fieldset>
					<legend>Albums</legend>
					<div class="control-group">
						<label class="control-label" for="typeahead">Album Name </label>
						<div class="controls">
							<input type="text" required="required" class="span6 typeahead" name="album" data-provide="typeahead" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="fileInput">Choose Image Files</label>
						<div class="controls">
							<input class="input-file uniform_on" name="userfile[]" multiple="multiple" id="fileInput" type="file">
						</div>
					</div>          
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			<?php echo form_close() ?>  

		</div>
	</div><!--/span-->

			</div><!--/row-->