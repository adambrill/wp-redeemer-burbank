<?php
include "inc/header.php";
?>

		<article class="hero-banner" style="background-image: url('dist/images/hero-connect.jpg');">
			<div class="wrapper">
				<div class="content">
					<h1>Connect</h1>
				</div>
			</div>
		</article>

		<article class="form" ng-controller="ConnectFormController">
			<div class="wrapper">
				<p>If you would like more information about how to connect with our church family please fill out the connection form below.</p>
				<form action="" name="connect" method="post">
					<div ng-show="success">
						<p>Thanks, we've received your submission.</p>
						<p><button type="reset" ng-click="success=false" class="button secondary">Back to Connect Form</button></p>
					</div>
					<div ng-show="!success">
						<!--<p>If you would like more information about how to connect with our church family please fill out the connection form below.</p>-->
						<div class="group">
							<div class="item" float-label>
								<label for="status">I am a...</label>
								<select id="status" name="userType" ng-model="form.status.value">
									<option></option>
									<option>Visitor</option>
									<option>Member</option>
								</select>
							</div>
							<div class="item" float-label>
								<label for="found">I found Garden City...</label>
								<select id="found" name="foundThrough" ng-model="form.found.value">
									<option></option>
									<option>Social Media</option>
									<option>Acts 29 Network</option>
									<option>Friend / Word of Mouth</option>
									<option>Other</option>
								</select>
							</div>
						</div>
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
							<div class="item">
								<label for="newsletter"><input type="checkbox" id="newsletter" name="newsletter" ng-model="form.newsletter.value" ng-true-value="'Yes'" ng-false-value="'No'" /> Receive our newsletter</label>
							</div>
						</div>
						<div class="group">
							<div class="item" float-label>
								<label for="comment">Comment or Question</label>
								<textarea id="comment" name="comment" ng-model="form.comment.value"></textarea>
							</div>
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