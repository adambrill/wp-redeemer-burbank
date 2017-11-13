<?php
/*
 * Template Name: Hero Banner
 * Template Post Type: content_block
 */
  
?>
<article class="hero-banner <?php the_field('class_name'); ?>" style="background-image: url('<?php the_field('background_image'); ?>');"<?php if (get_field('ng_controller') ) { echo ' ng-controller="' . get_field('ng_controller') . '"'; } ?>>
	<div class="wrapper" ng-style="{'height': height}">
		<div class="content">
			<h1><?php the_field('header_text'); ?></h1>
			<?php the_field('content'); ?>
		</div>
		<?php if (get_field('show_down_arrow') ) { ?>
		<i class="icon-arrow-down"></i>
		<? } ?>
	</div>
</article>