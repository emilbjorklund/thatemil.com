<?php
     
    # Side panel
    echo $HTML->side_panel_start();

    echo $HTML->para('Give the category a new name.');

    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 

    include('_subnav.php');


    # Title panel
    echo $HTML->heading1('Editing ‘%s’ Category', $details['categoryTitle']);


    
    if ($message) echo $message;
    
    echo $HTML->heading2('Category details');
        
    
    echo $Form->form_start();
    
        echo $Form->text_field('categoryTitle', 'Title',$details['categoryTitle']);
		echo $Form->hidden('categoryID', $details['categoryID']);
        
        

        echo $Form->submit_field('btnSubmit', 'Save', $API->app_path().'/categories/');

    
    echo $Form->form_end();
    
    echo $HTML->main_panel_end();

?>