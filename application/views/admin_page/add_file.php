<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-picture"></i> Add Downloadable</h2>
			<a href="add_album" class="btn btn-xs btn-primary pull-right" data-toggle="button">Add New File</a>
			<a href="view_albums" style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button">View Albums</a>
		</div>
		<div class="box-content">
			<?php echo form_open_multipart('dashboard/upload_file', 'class="form-horizontal"') ?>	
			<fieldset>
				<legend>Files</legend>
				<div class="control-group">
					<label class="control-label" for="typeahead">Short Description </label>
					<div class="controls">
						<input type="text" required="required" class="span6 typeahead" name="txt_desc" data-provide="typeahead" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="fileInput">Choose File</label>
					<div class="controls">
						<input class="input-file uniform_on" name="userfile" id="fileInput" type="file">
					</div>
				</div>  
				<div class="control-group">
						<label class="control-label" for="selectError3">Category</label>
						<div class="controls">
							<select name="category" id="selectError3">
								<?php foreach ($cats as $cat): ?>
									<option value="<?php echo $cat->file_cat_id; ?>"><?php echo $cat->category_name; ?></option>
								<?php endforeach; ?>
							</select>
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