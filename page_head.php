<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php 
		if (isset($page_title)) {
			echo $page_title;
		} else {
			perch_pages_title(); 
		}?> - That Emil</title>
	

	<script type="text/javascript">
		  window.WebFontConfig = {
		    google: { families: [ 'Signika::latin', 'Poly:400,400italic:latin' ] }
		  };
		  (function() {
		    var html = document.getElementsByTagName('html')[0];
			var wf = document.createElement('script');

		    html.className = html.className.replace(/(\s|^)no-js(\s|$)/, '$1js wf-loading$2');

		    setTimeout(function() {
		        html.className = html.className.replace(/(\s|^)wf-loading(\s|$)/, '');
		    }, 3000);
		    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		    wf.type = 'text/javascript';
		    wf.async = 'true';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(wf, s);
		  })(); 
	</script>
	
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->


	<link rel="stylesheet" href="/assets/css/thatemil.css">
	<link rel="alternate" type="application/rss+xml" title="RSS feed for That Emil blog posts" href="/blog/rss">
</head>
<body>
	<div id="content-top" class="wrap">
		<header class="masthead" role="banner">
				<h1 class="site-header wf"><a rel="home" href="/"><img src="/assets/img/emil.jpg" alt="">That Emil.</a></h1>
				<p class="site-nav-jump ui-text wf"><a href="#site-nav">Menu</a></p>
		</header><!-- /.masthead -->