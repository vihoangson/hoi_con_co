<?php 
	function redirect($uri = '')
	{
		if(!$uri) return header('Location: /');
		header('Location: '.$uri);
		exit;
	}

	function filter_url_map($url){
		preg_match("/ll=(.+?)&/", $url,$match);
		return explode(",", $match[1]);
	}
?>