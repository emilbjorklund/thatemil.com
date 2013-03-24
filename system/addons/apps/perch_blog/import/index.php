<?php
    # include the API
    include('../../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'perch_blog');
    $Lang = $API->get('Lang');

    # include your class files
    include('../PerchBlog_Posts.class.php');
    include('../PerchBlog_Post.class.php');
	include('../PerchBlog_Categories.class.php');
    include('../PerchBlog_Category.class.php');
    include('../PerchBlog_Comments.class.php');
    include('../PerchBlog_Comment.class.php');
    include('../PerchBlog_Authors.class.php');
    include('../PerchBlog_Author.class.php');
    include('../PerchBlog_Cache.class.php');
    include('../PerchBlog_Util.class.php');
    
    # Set the page title
    $Perch->page_title = $Lang->get('Import Data');


    # Do anything you want to do before output is started
    include('../modes/import.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('../modes/import.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
?>