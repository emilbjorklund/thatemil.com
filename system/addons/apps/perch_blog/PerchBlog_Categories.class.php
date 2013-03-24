<?php

class PerchBlog_Categories extends PerchAPI_Factory
{
    protected $table     = 'blog_categories';
	protected $pk        = 'categoryID';
	protected $singular_classname = 'PerchBlog_Category';
	
	protected $default_sort_column = 'categoryTitle';
	
	
	/**
	 * Find a category by its categorySlug
	 *
	 * @param string $slug 
	 * @return void
	 * @author Drew McLellan
	 */
	public function find_by_slug($slug)
    {
        $sql    = 'SELECT * 
                    FROM ' . $this->table . '
                    WHERE categorySlug='. $this->db->pdb($slug) .'
                    LIMIT 1';
                    
        $result = $this->db->get_row($sql);
        
        if (is_array($result)) {
            return new $this->singular_classname($result);
        }
        
        return false;
    }
    
	
	/**
	 * fetch the posts for a given category
	 * @param int $postID
	 */
	public function get_for_post($postID)
	{
	    $Cache = PerchBlog_Cache::fetch();
	    
	    if ($Cache->exists('cats_for_post'.$postID)) {
	        return $Cache->get('cats_for_post'.$postID);
	    }else{
	        $sql = 'SELECT c.*
    	            FROM '.$this->table.' c, '.PERCH_DB_PREFIX.'blog_posts_to_categories p2c
    	            WHERE c.categoryID=p2c.categoryID
    	                AND p2c.postID='.$this->db->pdb($postID);
    	    $rows   = $this->db->get_rows($sql);

    	    $r = $this->return_instances($rows);
    	    
    	    $Cache->set('cats_for_post'.$postID, $r);
    	    
    	    return $r;
	    }
	    
	    return false;
	}
	
	
	/**
	 * 
	 * retrieves all categories used by blog posts along with a count of number of posts for each category.
	 */
	 public function all_in_use() {
		$sql = 'SELECT c.categoryID, c.categoryTitle, c.categorySlug, COUNT(p2c.postID) AS qty
                FROM '.PERCH_DB_PREFIX.'blog_categories c, '.PERCH_DB_PREFIX.'blog_posts_to_categories p2c, '.PERCH_DB_PREFIX.'blog_posts p
                WHERE p2c.categoryID=c.categoryID AND p2c.postID=p.postID
                    AND p.postStatus=\'Published\' AND p.postDateTime<='.$this->db->pdb(date('Y-m-d H:i:00')).' 
                GROUP BY c.categoryID
                ORDER BY c.categoryTitle ASC
		';
		
		$rows   = $this->db->get_rows($sql);

    	$r = $this->return_instances($rows);
    	    
    	return $r;
	}

	public function find_or_create($slug, $title)
	{
		$sql = 'SELECT * FROM '.$this->table.' WHERE categorySlug='.$this->db->pdb($slug).' LIMIT 1';
		$row = $this->db->get_row($sql);

		if (PerchUtil::count($row)) {
			return $this->return_instance($row);
		}

		// category wasn't found, so create a new one and return it.

		$data = array();
		$data['categorySlug'] = $slug;
		$data['categoryTitle'] = $title;

		return $this->create($data);

	}
    
}

?>