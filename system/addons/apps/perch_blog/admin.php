<?php
	if ($CurrentUser->logged_in() && $CurrentUser->has_priv('perch_blog')) {
	    $this->register_app('perch_blog', 'Blog', 2, 'A simple blog', '3.6.3');
	    $this->require_version('perch_blog', '2.1.4');
	    $this->add_setting('perch_blog_post_url', 'Blog post page path', 'text', '/blog/post.php?s={postSlug}');
	    $this->add_setting('perch_blog_slug_format', 'Slug format', 'text', '%Y-%m-%d-{postTitle}');
	    $this->add_setting('perch_blog_akismet_key', 'Akismet API key', 'text', '');
	    $this->add_setting('perch_blog_comment_notify', 'Notify author of new comments', 'checkbox', '0');
	    $this->add_create_page('perch_blog', 'edit');
	}
?>