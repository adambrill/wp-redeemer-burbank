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


		<article class="recent-sermons" loading-indicator ng-controller="AllSermonsController">
			<div class="wrapper">
				<h6>All Sermons</h6>

				<table>
					<thead>
						<th>Title</th>
						<th>Series</th>
						<th>Speaker</th>
						<th>Date</th>
					</thead>
					<tbody>
						<tr ng-repeat="sermon in sermons">
							<td><a ng-href="/sermons/{{ sermon.slug }}" ng-bind-html="sermon.title"></a></td>
							<td><a ng-href="/series/{{ sermon.terms.series[0].slug }}" ng-bind-html="sermon.terms.series[0].name"></a></td>
							<td>{{ sermon.terms.speaker[0].name }}</td>
							<td>{{ sermon.date | date : 'MMMM d, yyyy' }}</td>
						</tr>
					</tbody>
				</table>

				<div class="pagination" ng-show="numPages">
					<a href="" class="prev" ng-class="{'disabled': currentPage == 1}" ng-click="setCurrentPage(1 * currentPage - 1)"> Previous </a>
					Page {{ currentPage }} of {{ numPages }}
					<a href="" class="next" ng-class="{'disabled': currentPage == numPages}" ng-click="setCurrentPage(1 * currentPage + 1)"> Next </a>
				</div>

				<p><a href="https://itunes.apple.com/us/podcast/garden-city-church/id463961789?mt=2" target="_blank" class="button secondary">Subscribe to podcast</a></p>

			</div>
		</article>

		<?php
		include "inc/featured-series.php";
		?>
		
<?php
include "inc/footer.php";
?>