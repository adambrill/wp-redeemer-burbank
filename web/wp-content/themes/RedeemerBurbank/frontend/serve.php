<?php
include "inc/header.php";
?>

		<article class="hero-banner" style="background-image: url('dist/images/hero-serve.jpg');">
			<div class="wrapper">
				<div class="content">
					<h1>Serve</h1>
				</div>
			</div>
		</article>

		<article class="form" ng-controller="ServeFormController">
			<div class="wrapper">
				<form action="" name="serve" method="post">
					<div ng-show="success">
						<p>Thanks, we've received your submission.</p>
					</div>
					<div ng-show="!success">
						<p>Thank you for expressing interest in serving at Garden City. Our Sunday serivces are powered by volunteers and we have many avenues in which you can serve. We will train you in all areas, all you have to do is be willing to serve!</p>
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
								<label for="phone">Phone</label>
								<input type="tel" id="phone" name="phone" ng-model="form.phone.value" ui-mask="(999) 999-9999" />
							</div>
						</div>
						<div class="group">
							<div class="item" float-label>
								<label for="email">Email</label>
								<input type="email" id="email" name="email" ng-model="form.email.value" />
							</div>
						</div>
						<div class="item">
							<label>Areas of service interest:</label>
							<ul>
								<li><label><input type="checkbox" ng-model="form.worshipEnvironmentTeam.value" ng-true-value="'Yes'" ng-false-value="'No'" /> Worship Enviornment Team (Set-Up &amp; Tear-Down)</label></li>
								<li><label><input type="checkbox" ng-model="form.sundayProductionTeam.value" ng-true-value="'Yes'" ng-false-value="'No'" /> Sunday Production Team (Audio, Lighting, &amp; Media)</label></li>
								<li><label><input type="checkbox" ng-model="form.connectionTeam.value" ng-true-value="'Yes'" ng-false-value="'No'" /> Connection Team (Greeting &amp; Connection Table)</label></li>
								<li><label><input type="checkbox" ng-model="form.worshipTeam.value" ng-true-value="'Yes'" ng-false-value="'No'" /> Worship Team</label></li>
								<li><label><input type="checkbox" ng-model="form.kidsMinistry.value" ng-true-value="'Yes'" ng-false-value="'No'" /> Kid's Ministry</label></li>
								<li><label><input type="checkbox" ng-model="form.youthMinistry.value" ng-true-value="'Yes'" ng-false-value="'No'" /> Youth Ministry</label></li>
								<li><label><input type="checkbox" ng-model="form.collegeMinistry.value" ng-true-value="'Yes'" ng-false-value="'No'" /> College Ministry</label></li>
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