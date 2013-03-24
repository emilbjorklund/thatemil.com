<?php
    
    $Categories = new PerchBlog_Categories($API);

    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
	$message = false;

    if (!$CurrentUser->has_priv('perch_blog.categories.manage')) {
        PerchUtil::redirect($API->app_path());
    }

    $Form->require_field('categoryTitle', 'Required');

    if ($Form->submitted()) {
        PerchUtil::debug('Form submitted.');
		$postvars = array('categoryTitle');
    	$data = $Form->receive($postvars);
    	
    	$data['categorySlug'] = PerchUtil::urlify($data['categoryTitle']);
    	
    	$new_category = $Categories->create($data);
    	
        if (is_object($new_category)) {
            PerchUtil::redirect($API->app_path() .'/categories/edit/?id='.$new_category->id().'&created=1');
        }else{
            $message = $HTML->failure_message('Sorry, that category could not be created.');
        }
    	
    }

    
    $details = array();


?>