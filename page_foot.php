		<footer tabindex="0" id="site-nav" class="wf site-nav ui-text">
			<nav role="navigation">
				<?php perch_pages_navigation(array('levels'=>1, 'hide_extensions'=>true)); ?>
			</nav>
			<p class="site-nav-jump"><a href="#top">Back (Top)</a></p>
		</footer>
	</div><!-- /.wrap -->
	
	<script src="/assets/js/global.min.js"></script>
	<script src="/assets/js/prism.js"></script>
	<script>
		var s = '/assets/css/prism.css',
			d = document,
			c = null;
		if (d.createStyleSheet) {
			try {d.createStyleSheet(s);} catch (e){};
		} 
		else { 
			c=d.createElement('link');
			c.rel='stylesheet';
			c.href=s;
			d.getElementsByTagName("head")[0].appendChild(c);
		}
	</script>
	<?php perch_content('Analytics'); ?>
</body>
</html>