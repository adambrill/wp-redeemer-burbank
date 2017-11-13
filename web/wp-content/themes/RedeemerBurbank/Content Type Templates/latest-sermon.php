<?php
/*
 * Template Name: Latest Sermon
 * Template Post Type: content_block
 */
  
?>
<article class="latest-sermon" style="background-image: url('<?php the_field('background_image'); ?>');" ng-controller="LatestSermonController">
	<div class="wrapper">
		<div class="inner">
			<!-- http://gardencitysv.com/wp-json/posts?type=sermons&filter[posts_per_page]=10&page=2 -->
			<!-- http://gardencitysv.com/wp-json/posts?type=sermons&filter[name]=gospel-partnership -->
			<!-- http://gardencitysv.com/wp-json/media?filter[post_parent]=11116 -->
			<!-- https://developer.wordpress.org/rest-api/using-the-rest-api/pagination/ -->
			<!-- http://www.gardencitysv.com/wp-json/posts?type=sermons&filter[taxonomy]=series&filter[term]=jesus-his-kingdom-the-gospel-of-mark&filter[posts_per_page]=50 -->
			<h6><?php the_field('header_text'); ?></h6>
			<h2 ng-bind-html="sermon.title"></h2>
			<p>{{ sermon.terms.speaker[0].name }} &bull; {{ sermon.date | date : 'MMMM d, yyyy' }}</p>
			<div ng-bind-html="sermon.content"></div>
			<p>
				<a href="" ng-click="showPlayer(sermon)" class="button" angular-ripple><?php the_field('play_text'); ?></a>
				<!--<a href="#" class="button" angular-ripple>Download</a>-->
			</p>
			<div class="audio-player" ng-if="sermon.media[0].source">
				<audio src="{{sermon.media[0].source}}" controls>
			</div>
			<p><a href="sermons.php"><?php the_field('see_all_sermons_text'); ?></a></p>
		</div>
	</div>
</article>