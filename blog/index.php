<?php include('../system/runtime.php'); ?>
<?php include('../page_head.php'); ?>

	<main role="main">

		<h1 class="hd-listing wf"><?php perch_pages_title(); ?></h1>
			<!-- this is an example blog homepage showing a simple call to perch_blog_recent_posts()
			
			Posts are displayed using the templates stored in perch/apps/perch_blog/templates/blog you can edit these as you wish, making sure that the 
			paths used in these templates are correct for your installation.
			 -->
		    <?php 
		        perch_blog_recent_posts(10);
		    ?>
		    
		    <p class="blog-morelink wf"><a href="/blog/archive">More posts</a></p>
	</main>	
<?php include('../page_foot.php'); ?>