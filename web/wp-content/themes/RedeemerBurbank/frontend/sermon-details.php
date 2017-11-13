<?php

//ini_set("allow_url_fopen", 1);

$sermonSlug = $_GET['sermonSlug'];

$url = 'http://gardencitysv.com/wp-json/posts?type=sermons&filter[name]=' . $sermonSlug;
$json = file_get_contents($url);
$obj = json_decode($json, true);

$title = $obj[0]['title'];

include "inc/header.php";

//stripslashes($json)

?>
		<article class="hero-banner" style="background-image: url('/dist/images/bg-latest-sermon.jpg');">
			<div class="wrapper">
				<div class="content">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</article>


		<article class="recent-sermons" ng-controller="SermonDetailsController" ng-init="init('<?= $_GET['sermonSlug'] ?>')">
			<div class="wrapper">
				<!--<a class="action">See all</a>
				<h6>Recent Sermons</h6>
				<hr />-->

				<ul class="list">
					<li ng-repeat="sermon in sermons">
						<h4 ng-bind-html="sermon.title"></h2>
						<p>{{ sermon.terms.speaker[0].name }} &bull; {{ sermon.date | date : 'MMMM d, yyyy' }}</p>
						<div ng-bind-html="sermon.content"></div>

						<div class="audio-player" ng-if="sermon.media[0].source">
							<audio src="{{sermon.media[0].source}}" controls>
						</div>

					</li>
				</ul>
				<p><a href="https://itunes.apple.com/us/podcast/garden-city-church/id463961789?mt=2" target="_blank" class="button secondary">Subscribe to podcast</a></p>
			</div>
		</article>
		
<?php
include "inc/footer.php";
?>