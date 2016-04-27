<?php 
	$route["default_route"]  = "/homepage/index";

	$route["/login"]         = "/auth/login";
	$route["/logout"]        = "/auth/logout";
	$route["/do_login"]      = "/auth/do_login";
	$route["/register"]      = "/auth/register";
	$route["/404"]           = "/auth/page_404";
	
	$route["/do_like"]       = "/ajax/do_like";
	$route["/do_delete_img"] = "/ajax/do_delete_img";
	$route["/toggle_friend"] = "/ajax/toggle_friend";
	$route["/toggle_follow"] = "/ajax/toggle_follow";
	$route["/edit_profile"]  = "/ajax/edit_profile";
	
	$route["/upload_img"]    = "/homepage/upload_img";
	$route["/upload_avatar"] = "/homepage/upload_avatar";
	$route["/setting"]       = "/homepage/setting";
	
	$route["/profile"]       = "/profile/index";
	$route["/friend_list"]   = "/profile/friend_list";
	$route["/follow_list"]   = "/profile/follow_list";
	$route["/favorite_list"] = "/profile/favorite_list";

?>