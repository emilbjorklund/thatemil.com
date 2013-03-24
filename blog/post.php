<?php include('../system/runtime.php'); ?>
<?php $slug = post_slug_from_get(perch_get('s')); ?>
<?php $page_title = perch_blog_post_field($slug, 'postTitle', true); ?>
<?php include('../page_head.php'); ?>
	<main id="content-main" role="main">
		    	<?php 
		    		PerchSystem::set_var('blog_post_categories', perch_blog_post_categories($slug, 'category_link.html', true));
		    	 ?>
		    	<?php perch_blog_post($slug); 
		    	?>
    </main>
<?php include('../page_foot.php'); ?>