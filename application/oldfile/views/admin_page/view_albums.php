<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-picture"></i> Albums</h2>
			<a href="add_album" class="btn btn-xs btn-primary pull-right" data-toggle="button">Add New Album</a>
			<a href="view_albums" style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button">View Albums</a>
		</div>
		<div class="box-content">
			<?php echo $this->session->flashdata( '_message' ); ?>
			<form class="form-horizontal" method="post">
				<fieldset>
					<legend>Album</legend>
					

					<ul class="thumbnails gallery">
						<?php foreach ($albums as $album): ?>
						
						<li id="image-1">
							<?php $z = 'onclick = ' ?>
							<?php echo anchor( 'dashboard/del_album/'.$album->album_id, '<span class="icon icon-red icon-close"></span>', array('onClick' => "return confirm('Are you sure you want to delete?')", 'class' => 'icons' ) ) ?> <br />
							<?php echo anchor('dashboard/view_gallery/'.$album->album_id, '<img style="width:196px;height:196px;" src="'. base_url(). 'uploads/'. $album->img_name . '">'); ?>
							<br><span><?php echo $album->album_name; ?></span>
						</li>
						
						<?php endforeach; ?>
					</ul>
					<h3>Still on Development</h3>
				</fieldset>
			</form>   
		</div>
	</div><!--/span-->

</div><!--/row-->
