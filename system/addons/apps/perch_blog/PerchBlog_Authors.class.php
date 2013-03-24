<?php

class PerchBlog_Authors extends PerchAPI_Factory
{
	protected $table     = 'blog_authors';
	protected $pk        = 'authorID';
	protected $singular_classname = 'PerchBlog_Author';
	
	protected $default_sort_column = 'authorFamilyName, authorGivenName';


	/**
	 * Find an author based on their email address. If not found, create a new one.
	 * @param  Object $User Instance of a user object - usually CurrentUser.
	 * @return Object       Instance of an author object
	 */
	public function find_or_create($User)
	{
		$sql = 'SELECT * FROM '.$this->table.' WHERE authorEmail='.$this->db->pdb($User->userEmail()).' LIMIT 1';
		$row = $this->db->get_row($sql);

		if (PerchUtil::count($row)) {
			return $this->return_instance($row);
		}

		// Author wasn't found, so create a new one and return it. (It? Him or her.)

		$data = array();
		$data['authorEmail'] = $User->userEmail();
		$data['authorGivenName'] = $User->userGivenName();
		$data['authorFamilyName'] = $User->userFamilyName();
		$data['authorSlug'] = PerchUtil::urlify($data['authorGivenName'].' '.$data['authorFamilyName']);

		$Author = $this->create($data);

		return $Author;
	}


	/**
	 * Find an author based on their email address. If not found, create a new one.
	 * @param  Object $User Instance of a user object - usually CurrentUser.
	 * @return Object       Instance of an author object
	 */
	public function find_or_create_by_email($email, $data)
	{
		$sql = 'SELECT * FROM '.$this->table.' WHERE authorEmail='.$this->db->pdb($email).' LIMIT 1';
		$row = $this->db->get_row($sql);

		if (PerchUtil::count($row)) {
			return $this->return_instance($row);
		}

		// Author wasn't found, so create a new one and return it. (It? Him or her.)

		$Author = $this->create($data);

		return $Author;
	}

}


?>