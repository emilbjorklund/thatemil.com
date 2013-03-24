<?php include('system/runtime.php'); ?>
<?php include('page_head.php'); ?>

<main id="content-main" role="main">
	<article class="entry">
		<div class="lede wf">
			<?php perch_content('Intro'); ?>
		</div>

	</article>
	<aside role="complementary">
		<h1 class="hd-listing wf">Latest post from that blog</h1>
		<?php 

			$opts = array(
			        'count'=>1,
			        'template'=>'blog/plain_post_list.html',
			        'sort'=>'postDateTime',
			        'sort-order'=>'DESC'
			    );
			
		    perch_blog_custom($opts);
		?>
	</aside>
</main>

<?php include('page_foot.php'); ?>