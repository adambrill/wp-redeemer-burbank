<?php
/*
 * Template Name: Meeting Times
 * Template Post Type: content_block
 */
  
?>
<article class="meeting-times bp-r" style="background-image: url('<?php the_field('background_image'); ?>');">
	<div class="wrapper">
		<div class="inner">
			<h6><?php the_field('main_header'); ?></h6>
			<h2><?php the_field('times'); ?></h2>
			<p><a href="http://goo.gl/maps/ktmhs" target="_blank"><?php the_field('address'); ?></a></p>
			<hr />
			<h6><?php the_field('second_header'); ?></h6>
			<?php the_field('second_content'); ?>
		</div>
	</div>
</article>