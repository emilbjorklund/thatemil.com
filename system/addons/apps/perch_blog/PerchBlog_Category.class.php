<?php

class PerchBlog_Category  extends PerchAPI_Base
{
    protected $table  = 'blog_categories';
    protected $pk     = 'categoryID';
    
    
    public function delete()
    {
        $this->db->delete(PERCH_DB_PREFIX.'blog_posts_to_categories', 'categoryID', $this->id());
        parent::delete();
    }
}

?>