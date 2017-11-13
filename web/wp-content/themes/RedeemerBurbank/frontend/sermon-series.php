<?php
include "inc/header.php";
?>

		<article class="hero-banner" style="background-image: url('dist/images/bg-latest-sermon.jpg');">
			<div class="wrapper">
				<div class="content">
					<h1>Sermon Series</h1>
				</div>
			</div>
		</article>

		<?php
		include "inc/featured-series.php";
		?>

		<?php
		/*
		<article class="all-series" ng-controller="SermonSeriesController" loading-indicator>
			<div class="wrapper">
				<h6>All Series</h6>
				<hr />
				<!--<form>
					<div class="search">
						<input type="text" name="query" placeholder="Search by" />
						<button type="submit" class="secondary" angular-ripple>Search</button>
					</div>
					<select>
						<option>Newest</option>
					</select>
				</form>-->
				<ul>
					<li ng-repeat="item in series">
						<a ng-href="{{ item.link }}" angular-ripple>
							<img src="http://placehold.it/360x155" />
							<h5 ng-bind-html="item.name"></h5>
						</a>
					</li>
				</ul>
			</div>
		</article>
		*/
		?>

		<article class="upcoming-events" ng-controller="SermonSeriesController" loading-indicator>
			<div class="wrapper">
				<ul>
					<li ng-repeat="item in series | filter : { count: '!0' }">
						<a ng-href="/series/{{ item.slug }}" angular-ripple>
							<h5 ng-bind-html="item.name"></h5>
							<p>{{ item.count }} Sermons</p>
						</a>
					</li>
				</ul>
			</div>
		</article>
		
<?php
include "inc/footer.php";
?>