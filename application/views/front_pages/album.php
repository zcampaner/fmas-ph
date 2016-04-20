<style type="text/css">
.thumbnail{
  border: 1px solid #ccc;
  float: left;
  margin-right: 5px;
  padding: 3px;
  width: 18%;
}
.thumbnail .thumb-title{
  padding: 6px 0;
}
</style>
<section id="templatemo_slideshow">
  <div class="container">
    <ol class="breadcrumb">
      <li><?php echo $main; ?></li>
      <li><?php echo $sub; ?></li>
      <li class="active"><?php echo $sub_main; ?></li>
    </ol>
    <h1>Gallery</h1>
    <h4><?php echo anchor( 'main/gallery', 'Back to Gallery' ) ?></h4>
    <div id="main-slider" class="flexslider">

      <?php foreach ($images as $image ): ?>

      <div class="thumbnail">
        <?php echo anchor( base_url() . 'uploads/'. $image->img_name, '<img src="' . base_url() . 'uploads/'. $image->img_name .'" style="width: 196px;height:196px;" />', 'class="gallery"' ) ?>
        <?php // echo '<img src="' . base_url() . 'uploads/'. $image->img_name .'" style="width: 196px;height:196px;" />'; ?>
        
      </div>

    <?php endforeach; ?>
  </div><!-- end of main-slider -->
</div>	
</section><!-- end of templatemo_slideshow -->

