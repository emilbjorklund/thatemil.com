<?php
   
    # Side panel
    echo $HTML->side_panel_start();

    echo $HTML->para('Enter a title for your new category.');

    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 
    include('_subnav.php');

    echo $HTML->heading1('Adding a New Category');
    



    echo $HTML->heading2('Category details');
    if ($message) {
        echo $message;
    }
    echo $Form->form_start();
    
        echo $Form->text_field('categoryTitle', 'Title');

        
        

        echo $Form->submit_field('btnSubmit', 'Save', $API->app_path());

    
    echo $Form->form_end();
    
    echo $HTML->main_panel_end();

?>