<?php
include "inc/header.php";
?>

		<article class="hero-banner" style="background-image: url('dist/images/bg-latest-sermon.jpg');">
			<div class="wrapper">
				<div class="content">
					<h1>Sermons</h1>
				</div>
			</div>
		</article>


		<article class="recent-sermons" ng-controller="RecentSermonsController" loading-indicator>
			<div class="wrapper">
				<a href="all-sermons.php" class="action">See all</a>
				<h6>Recent Sermons</h6>
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

						<h4 ng-bind-html="sermon.title"></h4>
						<p>{{ sermon.terms.speaker[0].name }} &bull; {{ sermon.date | date : 'MMMM d, yyyy' }}</p>

						<div class="audio-player" ng-if="sermon.media[0].source">
							<audio src="{{sermon.media[0].source}}" controls>
						</div>

					</li>
				</ul>
				<p><a href="https://itunes.apple.com/us/podcast/garden-city-church/id463961789?mt=2" target="_blank" class="button secondary">Subscribe to podcast</a></p>
			</div>
		</article>

		<?php
		include "inc/featured-series.php";
		?>
		
<?php
include "inc/footer.php";
?>