<style type="text/css">
.icons{
	height: 50% !important;
}
</style>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-picture"></i> Gallery</h2>
		<?php echo anchor('dashboard/add_album', 'Add New Album', ' class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/view_albums', 'View Albums', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		<?php echo anchor('dashboard/add_new_photos/'.$this->uri->segment(3), 'Add New Photos', ' style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-toggle="button"') ?>
		</div>
		<div class="box-content">
			<?php echo $this->session->flashdata( '_message' ); ?>

			<br/>
			<ul class="thumbnails gallery">
				<?php foreach ($images as $image ): ?>
				<li id="image-1" class="thumbnail">
					<a class="link-img" style="background:url(<?php echo base_url(); ?>uploads/thumbs/1.jpg)" title="Sample Image 1" href="<?php echo base_url(); ?>uploads/<?php echo $image->img_name; ?>">
						<img class="grayscale" src="<?php echo base_url(); ?>uploads/<?php echo $image->img_name; ?>" alt="Sample Image 1">
					</a>
					<?php echo anchor( 'dashboard/del_img/'.$image->album_id.'/'.$image->img_id, '<span class="icon icon-red icon-close"></span>', 'class="icons"' ) ?>

				</li>

			<?php endforeach; ?>
		</ul>
	</div>
</div><!--/span-->

			</div><!--/row-->