<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body ng-app="app" konami<?= (isset($bodyController) ? ' ng-controller="'.$bodyController.'"' : '') ?>>

	<div class="site-wrapper">
		<header class="site-header">
			<div class="wrapper">
				<a href="/" class="logo">Garden City Church</a>
				<nav>
					<ul>
						<li><a href="/sundays/">Sundays</a></li>
						<li><a href="/sermons.php">Sermons</a></li>
						<!--<li><a href="#">About</a></li>-->
						<li><a href="/connect.php">Connect</a></li>
            			<li><a href="/life-groups.php">Life Groups</a></li>
						<li><a href="https://redeemerburbank.churchcenteronline.com/giving" target="_blank">Give</a></li>
						<li class="menu">
							<a href="#" class="more-nav">
								<span class="hamburger">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</span>
								Menu
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="nav-menu">
			<div class="content">
				<a href="#" class="more-nav close">
					<span class="hamburger">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</span>
					Close
				</a>
				<ul>
					<li>About
						<ul>
							<li><a href="/our-beliefs.php">Beliefs</a></li>
							<li><a href="/our-values.php">Values</a></li>
							<li><a href="/our-story.php">Story</a></li>
							<li><a href="/our-ministry-philosophy.php">Ministry Philosophy</a></li>
							<li><a href="/our-leadership.php">Leadership</a></li>
							<li><a href="/our-mission.php">Mission</a></li>
							<li><a href="/our-vision.php">Vision</a></li>
			                <li><a href="/sundays.php">Sundays</a></li>
			                <li><a href="/life-groups.php">Life Groups</a></li>
						</ul>
					</li>
					<li>Resources
						<ul>
							<li><a href="/sermons.php">Sermons</a></li>
							<li><a href="/discipleship.php">Discipleship</a></li>
						</ul>
					</li>
					<li><a href="/events.php">Events</a>
						<ul>
							<li><a href="/membership.php">Membership</a></li>
							<li><a href="/baptism.php">Baptism</a></li>
						</ul>
					</li>
					<li><a href="/connect.php">Connect</a>
			            <ul>
			              <li><a href="/serve.php">Serve</a></li>
			              <li><a href="https://gardencitychurch.churchcenteronline.com/giving" target="_blank">Give</a></li>
			            </ul>
		            </li>
				</ul>
			</div>
		</div>