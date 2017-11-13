<?php

$seriesSlug = $_GET['seriesSlug'];

$url =  'http://www.gardencitysv.com/wp-json/taxonomies/series/terms?filter[slug]=' . $seriesSlug;
$json = file_get_contents($url);
$obj = json_decode($json, true);

$title = $obj[0]['name'];


include "inc/header.php";
?>

		<article class="hero-banner" style="background-image: url('/dist/images/bg-latest-sermon.jpg');">
			<div class="wrapper">
				<div class="content">
				</div>
			</div>
		</article>

		<article class="recent-sermons" ng-controller="SermonSeriesDetailsController" ng-init="init('<?= $seriesSlug ?>')" loading-indicator>
			<div class="wrapper">
				<h6><?= $title; ?></h6>
				<hr />
				<ul class="list">
					<li ng-repeat="sermon in sermons">
						<ul class="action">
							<li><a href="" ng-click="showPlayer(sermon)">
								<i class="icon-play"></i>
								Play
							</a></li>
							<!--<li><a ng-href="{{sermon.media[0].source}}">
								<i class="icon-play"></i>
								Download
							</a></li>-->
						</ul>

						<h4 ng-bind-html="sermon.title"></h2>
						<p>{{ sermon.terms.speaker[0].name }} &bull; {{ sermon.date | date : 'MMMM d, yyyy' }}</p>

						<div class="audio-player" ng-if="sermon.media[0].source">
							<audio src="{{sermon.media[0].source}}" controls>
						</div>

					</li>
					<!--
					<li>
						<ul class="action">
							<li><a href="#">Play</a></li>
							<li><a href="#">Download</a></li>
						</ul>
						<h4><a href="#">Boxing Jesus</a></h4>
						<p>Fred Mok &bull; December 11, 2016</p>
					</li>
					<li>
						<ul class="action">
							<li><a href="#">Play</a></li>
							<li><a href="#">Download</a></li>
						</ul>
						<h4><a href="#">The Object of Faith</a></h4>
						<p>Ben Moore &bull; December 4, 2016</p>
					</li>
					<li>
						<ul class="action">
							<li><a href="#">Play</a></li>
							<li><a href="#">Download</a></li>
						</ul>
						<h4><a href="#">Overcoming Legion</a></h4>
						<p>Fred Mok &bull; November 27, 2016</p>
					</li>
					<li>
						<ul class="action">
							<li><a href="#">Play</a></li>
							<li><a href="#">Download</a></li>
						</ul>
						<h4><a href="#">Welcome the Storm</a></h4>
						<p>Justin Buzzard &bull; November 20, 2016</p>
						<p>Lorem ipsum dolor sit amet, Mark 6:1-6 adipiscing elit. Morbi sit amet leo at arcu suscipit pellentesque. Integer ut pellentesque ex. Ut et dui at ante tristique accumsan non in massa. Praesent gravida viverra consequat. Nam viverra placerat elementum. Etiam venenatis urna vel mauris commodo, a faucibus diam pretium.</p>
					</li>
					<li>
						<ul class="action">
							<li><a href="#">Play</a></li>
							<li><a href="#">Download</a></li>
						</ul>
						<h4><a href="#">Hearing God &ndash; The Parable of Soils</a></h4>
						<p>Justing Buzzard &bull; November 14, 2016</p>
					</li>-->
				</ul>
			</div>
		</article>

		<?php
		include "inc/featured-series.php";
		?>
		
<?php
include "inc/footer.php";
?>