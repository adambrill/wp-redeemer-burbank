<?php
/*
 * Template Name: Content Row
 * Template Post Type: content_block
 */
  
?>
<?php
$articleClass = '';
if (get_field('font_color')) {
	$articleClass = ' ' . get_field('font_color') . '-text';
}
?>
<article class="content-row<?php echo $articleClass; ?> two-col"<?php if (get_field('background_image')) { echo ' style="background-image: url(\'' . get_field('background_image') . '\');"'; } ?>>
	<div class="wrapper">
		<div class="content">
			<h3><?php the_field('main_header'); ?></h3>
			<div class="text">
				<?php the_field('content'); ?>
			</div>
		</div>
	</div>
</article>