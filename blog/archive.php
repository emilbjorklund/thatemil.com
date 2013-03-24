<?php include('../system/runtime.php'); ?>
<?php 
// CHANGE MODE DEPENDING ON WHAT OPTIONS ARE PASSED IN ON THE QUERYSTRING

// Default mode
$mode = 'date';
$page_title = 'Post archive';
$date_from  = date('Y-01-01 00:00:00');
$date_to    = date('Y-12-31 23:59:59');


// Category?
if (perch_get('cat')) {
    $mode = 'category';
    $categorySlug = perch_get('cat');
    $categoryTitle = perch_blog_category($categorySlug, true);
    $page_title = 'Posts about '.strtolower($categoryTitle);
}

// Tag?
if (perch_get('tag')) {
    $mode = 'tag';
    $tagSlug = perch_get('tag');
    $page_title = 'Posts tagged with ' . $tagSlug;
}

// Year?
if (perch_get('year')) {
    $mode = 'date';
    $year = intval(perch_get('year'));
    $date_from  = $year.'-01-01 00:00:00';
    $date_to    = $year.'-12-31 23:59:59';

    $page_title = 'Posts from '.$year;
    
    
    // Month and Year?
    if (perch_get('month')) {
        $month = intval(perch_get('month'));
        $date_from  = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-01 00:00:00';
        $date_to    = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-31 23:59:59';
        $page_title = 'Posts from '.strftime('%B %Y', strtotime($date_from));
        // Month and Year and Day?
        if (perch_get('day')) {
        	$day = intval(perch_get('day'));
        	$date_from = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-'. str_pad($day, 2, '0', STR_PAD_LEFT).' 00:00:00';
        	$date_to   = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-'. str_pad($day, 2, '0', STR_PAD_LEFT).' 23:59:59';
        	$page_title = 'Posts from '.strftime('%d %B %Y', strtotime($date_from));
        }
    }

}


// NOW WE KNOW WHAT MODE, LET'S DO THE PERCH STUFF


switch($mode) 
{
    case 'category':
        $opts = array(
            'category'=>rtrim($categorySlug, '/')
            );
        break;
        
    case 'tag':
        $opts = array(
            'tag'=>rtrim($tagSlug, '/')
            );
        break;
        
    case 'date':
        $opts = array(
            'filter'=>'postDateTime',
            'match'=>'eqbetween',
            'value'=>$date_from.','.$date_to
            );
        break;
        
    
    
}

// show 10 items per page
$opts['count'] = 10;

// order by date, newest to oldest
$opts['sort'] = 'postDateTime';
$opts['sort-order'] = 'DESC';

$opts['template'] = 'post_in_list.html';
 ?>

<?php include('../page_head.php'); ?>
    <main id="content-main" role="main"></main>
		   
		    <?php 
		        
		        
		        echo '<h1 class="hd-listing wf">'.$page_title.'</h1>';

		        perch_blog_custom($opts);
		    ?>
		<!-- <nav class="sidebar"> -->
		    <!-- <h2>Filter archive</h2> -->
		    <!-- The following functions are different ways to display archives. You can use any or all of these. 
		    
		    All of these functions can take a parameter of a template to overwrite the default template, for example:
		    
		    perch_blog_categories('my_template.html');
		    
		    --> 
		    <!--  By category listing -->
		    <?php // perch_blog_categories(); ?>
		    <!--  By tag -->
		    <?php // perch_blog_tags(); ?>
		    <!--  By year -->
		    <?php // perch_blog_date_archive_years(); ?>
		    <!--  By year and then month - can take parameters for two templates. The first displays the years and the second the months see the default templates for examples -->
		    <?php // perch_blog_date_archive_months(); ?>
    	<!-- </nav> -->
<?php include('../page_foot.php'); ?>