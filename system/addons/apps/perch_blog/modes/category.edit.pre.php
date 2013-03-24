<?php
    
    $Categories = new PerchBlog_Categories($API);

    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
	
    $message = false;

    if (!$CurrentUser->has_priv('perch_blog.categories.manage')) {
        PerchUtil::redirect($API->app_path());
    }
    
    
    if (isset($_GET['id']) && $_GET['id']!='') {
        $categoryID = (int) $_GET['id'];    
        $Category = $Categories->find($categoryID);
        $details = $Category->to_array();
    }else{
        $message = $HTML->failure_message('Sorry, that category could not be updated.');
    }
    
    
    

    $Form->require_field('categoryTitle', 'Required');

    if ($Form->submitted()) {
		$postvars = array('categoryID','categoryTitle');
		
    	$data = $Form->receive($postvars);
    	
        $Category->update($data);
    	
        if (is_object($Category)) {
            $message = $HTML->success_message('Your category has been successfully edited. Return to %scategory listing%s', '<a href="'.$API->app_path() .'/categories">', '</a>');
        }else{
            $message = $HTML->failure_message('Sorry, that category could not be edited.');
        }
        
        // clear the caches
        PerchBlog_Cache::expire_all();
        
        $details = $Category->to_array();
    }

    if (isset($_GET['created']) && !$message) {
        $message = $HTML->success_message('Your category has been successfully created. Return to %scategory listing%s', '<a href="'.$API->app_path() .'/categories">', '</a>');
    }

?>