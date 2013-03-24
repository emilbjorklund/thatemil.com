<?php 

function post_slug_from_get($get_string)
{
	$parts = explode('-', $get_string);
	return array_shift($parts).'/'.array_shift($parts).'/'.array_shift($parts).'/'.implode('-', $parts);
}

?>