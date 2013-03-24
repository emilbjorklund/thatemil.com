<?php include($_SERVER['DOCUMENT_ROOT'].'/system/runtime.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/page_head.php'); ?>
		<main id="content-main" role="main">
			<article class="entry flow">
				<h1 class="hd-entry wf"><?php perch_pages_title(); ?></h1>
				<div class="lede wf">
					<?php perch_content('Intro'); ?>
				</div>
				<div class="entry-body wf">
					<?php perch_content('Main Content'); ?>
				</div>
			</article>
		</main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/page_foot.php'); ?>