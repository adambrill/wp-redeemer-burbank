<?php
include "inc/header.php";
?>

		<article class="hero-banner home" style="background-image: url('dist/images/hero-homepage.jpg');" ng-controller="HomepageBannerController">
			<div class="wrapper" ng-style="{'height': height}">
				<div class="content">
					<h1>Growing Disciples</h1>
				</div>
				<i class="icon-arrow-down"></i>
			</div>
		</article>

		<article class="meeting-times bp-r" style="background-image: url('dist/images/bg-meeting-times.jpg');">
			<div class="wrapper">
				<div class="inner">
					<h6>Sunday Gathering</h6>
					<h2>4:00 &amp; 5:30pm</h2>
					<p><a href="http://goo.gl/maps/ktmhs" target="_blank">400 N. Winchester Blvd., Santa Clara, CA 95050</a></p>
					<hr />
					<h6>Kids</h6>
					<p>We have Kids’ Ministry during the 4 pm service. The nursery is open to babies ages 4 months to walking and is located off the sanctuary. Our Kids’ Center is located across the lawn near the playground. We have a walker room for babies up to 24 months old and classes for kids ages 2 through 5th grade.</p>
				</div>
			</div>
		</article>

		<article class="latest-sermon" style="background-image: url('dist/images/bg-latest-sermon.jpg');" ng-controller="LatestSermonController">
			<div class="wrapper">
				<div class="inner">
					<!-- http://gardencitysv.com/wp-json/posts?type=sermons&filter[posts_per_page]=10&page=2 -->
					<!-- http://gardencitysv.com/wp-json/posts?type=sermons&filter[name]=gospel-partnership -->
					<!-- http://gardencitysv.com/wp-json/media?filter[post_parent]=11116 -->
					<!-- https://developer.wordpress.org/rest-api/using-the-rest-api/pagination/ -->
					<!-- http://www.gardencitysv.com/wp-json/posts?type=sermons&filter[taxonomy]=series&filter[term]=jesus-his-kingdom-the-gospel-of-mark&filter[posts_per_page]=50 -->
					<h6>Latest Sermon</h6>
					<h2 ng-bind-html="sermon.title"></h2>
					<p>{{ sermon.terms.speaker[0].name }} &bull; {{ sermon.date | date : 'MMMM d, yyyy' }}</p>
					<div ng-bind-html="sermon.content"></div>
					<p>
						<a href="" ng-click="showPlayer(sermon)" class="button" angular-ripple>Play</a>
						<!--<a href="#" class="button" angular-ripple>Download</a>-->
					</p>
					<div class="audio-player" ng-if="sermon.media[0].source">
						<audio src="{{sermon.media[0].source}}" controls>
					</div>
					<p><a href="sermons.php">See all sermons</a></p>
				</div>
			</div>
		</article>

		<?php
		/*
		<article class="recent-posts">
			<div class="wrapper">
				<a href="#" class="action">See the blog</a>
				<h6>Recent Posts</h6>
				<hr />
				<ul>
					<li>
						<a href="#" angular-ripple>
							<h3>Get to Know a Member</h3>
							<p>Garden City Church &bull; Dec 11</p>
						</a>
					</li>
					<li style="background-image: url('dist/images/bg-serving.jpg');">
						<a href="#" angular-ripple>
							<h3>Are You Serving?</h3>
							<p>Ben Moore &bull; Dec 1</p>
						</a>
					</li>
					<li style="background-image: url('dist/images/bg-ricks-story.jpg');">
						<a href="#" angular-ripple>
							<h3>Rick's Story</h3>
							<p>Fred Mok &bull; Nov 25</p>
						</a>
					</li>
				</ul>
			</div>
		</article>
		*/
		?>
		
<?php
include "inc/footer.php";
?>