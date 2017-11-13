		<footer class="site-footer">
			<div class="wrapper">
				<p>&copy; Copyright 2017</p>
				<p class="address"><a href="https://goo.gl/maps/xSJbR2Rdek22" target="_blank">2201 W Alameda Ave, Burbank, CA 91506</a></p>
				<ul class="social">
					<li class="facebook"><a href="https://www.facebook.com/redeemerbb" target="_blank">Facebook</a></li>
					<li class="instagram"><a href="https://www.instagram.com/redeemer_burbank/" target="_blank">Instagram</a></li>
					<li class="twitter"><a href="https://twitter.com/redeemerbb" target="_blank">Twitter</a></li>
				</ul>
			</div>
		</footer>
	</div>

	<!-- Reftagger -->
	<script>
		var refTagger = {
			settings: {
				bibleVersion: "ESV"			
			}
		};
		(function(d, t) {
			var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
			g.src = "//api.reftagger.com/v2/RefTagger.js";
			s.parentNode.insertBefore(g, s);
		}(document, "script"));
	</script>
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		//ga('create', 'UA-43872974-2'); // DEV
		//ga('create', 'UA-43872974-1', 'gardencitysv.com'); // PROD
		ga('send', 'pageview');

	</script>
<?php wp_footer(); ?>
</body>
</html>