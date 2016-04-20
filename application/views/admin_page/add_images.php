<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-picture"></i> Gallery</h2>
		<?php echo anchor('dashboard/add_album', 'Add New Album', ' class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/view_albums', 'View Albums', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		</div>
		<div class="box-content">
			<?php echo form_open_multipart('dashboard/add_img', 'class="form-horizontal"') ?>	
				<fieldset>
					<legend>Albums</legend>
					<input type="hidden" name="album_id" value="<?php echo $this->uri->segment(3) ?>">
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