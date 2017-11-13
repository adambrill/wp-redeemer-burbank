<?php
include "inc/header.php";
?>

		<article class="hero-banner" style="background-image: url('dist/images/hero-membership.jpg');">
			<div class="wrapper">
				<div class="content">
					<h1>Membership Covenant</h1>
				</div>
			</div>
		</article>

		<article class="form" ng-controller="MembershipCoventantFormController">
			<div class="wrapper">
				<p>Having confessed to being a baptized Christian (or intending to “go public” with my faith and get baptized at the next Baptism Sunday), being in full alignment with Garden City’s vision, mission, core values, doctrine, philosophy of ministry, and biblical convictions, and having listened to this selection of sermons (ROB, we’ll put a link here eventually) and studied the Membership Handbook, with the help of the Holy Spirit, I covenant:</p>
				<h5>To Join the Mission</h5>
				<ul>
				    <li>I will take ownership of the mission of the church and play my part in moving the mission forward.</li>
				</ul>
				<h5>To Enjoy the Gospel | To Know and Love the God Who Knows and Loves Me</h5>
				<ul>
					<li>I will follow Jesus as my King and repent often of my tendency to follow inferior kings and idols.</li>
					<li>I will enjoy grace and find my identity in Jesus’ work for me, not my work for him.</li>
					<li>I will meet with Jesus regularly in Word and prayer because I believe the most important meeting of my day is with him.</li>
					<li>I will listen to God and obey God, often asking myself two questions: What is God saying to me? What am I going to do about it?</li>
				</ul>
				<h5>To Belong to the Family | To Know and Love One Another</h5>
				<ul>
					<li>I will make gathering with my church family on Sundays and in Life Group a top priority in my weekly schedule.</li>
					<li>I will love my church family, serve my church family, and encourage my church family.</li>
					<li>I will preserve unity in the church and follow biblical procedures of peacemaking when conflict arises.</li>
					<li>I will pray for our church’s leaders, submit to our church’s leaders, and submit myself to church discipline if the need should ever arise.</li>
					<li>I will have friendly relationships with brothers and sisters in Christ from other churches, but I will not hold membership to another church or consistently serve, regularly attend, or function in a leadership position in another church family.</li>
				</ul>
				<h5>To Be God’s Image Bearer | To Know and Love Our City</h5>
				<ul>
					<li>I will become more alive to the unique image bearer God has designed me to be, using my unique design and calling to help other people flourish and glorify God.</li>
					<li>I will scatter with my church family and enjoy relationships with non-Christian friends who I’m seeking to know, love, and bring into the family.</li>
					<li>I will give generously, regularly, and cheerfully to support the mission of Garden City.</li>
					<li>I will have fun.</li>
				</ul>

				<p>I will take responsibility to notify the Garden City Church leadership if at any time I can no longer commit to this covenant, or if I have any concerns regarding Garden City Church.</p>
				<form action="" name="membership" method="post">
					<div ng-show="success">
						<p>Thanks, we've received your submission.</p>
					</div>
					<div ng-show="!success">
						<div class="group">
							<div class="item" float-label>
								<label for="first-name">First Name</label>
								<input type="text" id="first-name" name="first-name" ng-model="form.firstName.value" />
							</div>
							<div class="item" float-label>
								<label for="last-name">Last Name</label>
								<input type="text" id="last-name" name="last-name" ng-model="form.lastName.value" />
							</div>
						</div>
						<div class="group">
							<div class="item" float-label>
								<label for="email">Email</label>
								<input type="email" id="email" name="email" ng-model="form.email.value" />
							</div>
						</div>
						<div class="group">
							<div class="item" float-label>
								<label for="lifegroup">Life Group Leader(s)</label>
								<input type="text" id="lifegroup" name="lifegroup" ng-model="form.lifegroup.value" />
							</div>
						</div>
						<div class="group">
							<div class="item" float-label>
								<label for="servicetime">Will you be at the 4:00 or 5:30 worship gathering for our next Membership Sunday?</label>
								<select id="servicetime" name="servicetime" ng-model="form.servicetime.value">
									<option></option>
									<option>4:00</option>
									<option>5:30</option>
								</select>
							</div>
						</div>
						<div class="item">
							<label>Affirmation</label>
							<ul>
								<li><label><input type="checkbox" ng-model="form.affirmation.value" ng-true-value="'Yes'" ng-false-value="'No'" /> I affirm the Garden City Church Membership Covenant.</label></li>
							</ul>
						</div>
						<div class="buttons">
							<button type="button" ng-click="submit()" angular-ripple>Submit</button>
							<button type="reset" class="secondary" angular-ripple>Cancel</button>
						</div>
					</div>
				</form>
			</div>
		</article>
		
<?php
include "inc/footer.php";
?>