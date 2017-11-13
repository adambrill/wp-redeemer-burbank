<?php
/*
 * Template Name: Leadership List
 * Template Post Type: content_block
 */
  
?>
<article class="leadership-list">
	<div class="wrapper">
		<h3><?php the_field('main_header'); ?></h3>
		<ul>
			<?php foreach (get_field('leaders') as $leader) { ?>
			<li>
				<div class="content">
					<img src="<?php echo $leader['image']; ?>" />
					<h4><?php echo $leader['name']; ?></h4>
					<h5><?php echo $leader['role']; ?></h5>
				</div>
			</li>
			<?php } ?>
		</ul>
	</div>
</article>