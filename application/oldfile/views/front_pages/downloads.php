<section id="templatemo_slideshow">
  <div class="container">
  	<h1>Downloads</h1>
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable" style="border:0;">
				<thead>
					<tr>
						<th style="border:0;">Category</th>
						<th style="border:0;">URL</th>
					</tr>
				</thead>   
				<tbody>
					<?php foreach($files as $file ): ?>
					<tr>
						<td style="border:0;" class="center"><?php echo ucfirst( $file->category_name ); ?></td>
						<td style="border:0;" class="center"><?php echo anchor(base_url(). 'uploads/' .$file->file_name, $file->file_desc) ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>    
    
</div>	
</section><!-- end of templatemo_slideshow -->