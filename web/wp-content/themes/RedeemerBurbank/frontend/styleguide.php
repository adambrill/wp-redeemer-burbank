<?php
include "inc/header.php";
?>

		<article class="hero-banner" style="background-image: url('/dist/images/hero-homepage.jpg');">
			<div class="wrapper">
				<h1>Growing Disciples</h1>
			</div>
		</article>

		<section class="layout cols-1">
			<div class="wrapper">

				<h2>Typography</h2>

				<h1>H1. Heading</h1>
				<h2>H2. Heading</h2>
				<h3>H3. Heading</h3>
				<h4>H4. Heading</h4>
				<h5>H5. Heading</h5>
				<h6>H6. Heading</h6>

				<h2>Body Copy</h2>

				<p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>

				<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.</p>

				<h2>Lists</h2>

				<ul>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Consectetur adipiscing elit
						<ul>
							<li>Integer molestie lorem at massa</li>
							<li>Facilisis in pretium nisl aliquet</li>
						</ul>
					</li>
					<li>Nulla volutpat aliquam velit</li>
				</ul>

				<ol>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Consectetur adipiscing elit
						<ol>
							<li>Integer molestie lorem at massa</li>
							<li>Facilisis in pretium nisl aliquet</li>
						</ol>
					</li>
					<li>Nulla volutpat aliquam velit</li>
				</ol>

				<h2>Forms</h2>
				<form>
					<div class="group">
						<div class="item">
							<label for="firstname">First Name</label>
							<input type="text" id="firstname" />
						</div>
						<div class="item">
							<label for="lastname">Last Name</label>
							<input type="text" id="lastname" />
						</div>
					</div>
					<div class="item">
						<label for="email">Email</label>
						<input type="email" id="email" />
					</div>
					<div class="item">
						<label for="comments">Comments</label>
						<textarea></textarea>
					</div>
					<div class="item">
						<label>Sex</label>
						<select>
							<option>Please Choose</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
					<div class="item">
						<label>Sex</label>
						<ul class="checkbox-list">
							<li><input type="radio" name="sex" id="male"><label for="male">Male</label></li>
							<li><input type="radio" name="sex" id="female"><label for="female">Female</label></li>
						</ul>
					</div>
					<div class="item">
						<label>Sex</label>
						<ul class="checkbox-list">
							<li><input type="checkbox" id="male"><label for="male">Male</label></li>
							<li><input type="checkbox" id="female"><label for="female">Female</label></li>
						</ul>
					</div>
					<button type="submit">Submit</button> <button class="secondary">Secondary</button> <button disabled="disabled">Disabled</button>

					<div class="vertical">
						<div class="item">
							<label for="email">Email</label>
							<input type="email" id="email" />
						</div>
						<div class="item">
							<label for="comments">Comments</label>
							<textarea></textarea>
						</div>
						<div class="item">
							<label>Sex</label>
							<select>
								<option>Please Choose</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<div class="item">
							<label>Sex</label>
							<ul class="checkbox-list">
								<li><input type="radio" name="sex" id="male"><label for="male">Male</label></li>
								<li><input type="radio" name="sex" id="female"><label for="female">Female</label></li>
							</ul>
						</div>
						<div class="item">
							<label>Sex</label>
							<ul class="checkbox-list">
								<li><input type="checkbox" id="male"><label for="male">Male</label></li>
								<li><input type="checkbox" id="female"><label for="female">Female</label></li>
							</ul>
						</div>
						<button type="submit">Submit</button> <button class="secondary">Secondary</button> <button disabled="disabled">Disabled</button>
					</div>

				</form>

				<h2>Tables</h2>
				<table>
					<thead>
						<tr>
							<th>Header 1</th>
							<th>Header 2</th>
							<th>Header 3</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Cell 1</td>
							<td>Cell 2</td>
							<td>Cell 3</td>
						</tr>
						<tr>
							<td>Cell 4</td>
							<td>Cell 5</td>
							<td>Cell 6</td>
						</tr>
						<tr>
							<td>Cell 7</td>
							<td>Cell 8</td>
							<td>Cell 9</td>
						</tr>
					</tbody>
				</table>

			</div>
		</section>
		
<?php
include "inc/footer.php";
?>