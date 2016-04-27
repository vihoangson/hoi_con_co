<?php
$s = microtime();
	date_default_timezone_set('America/Los_Angeles');
	define("BASEPATH", __DIR__."/");
	define("ASSETSPATH", __DIR__."/assets/");

	require_once BASEPATH.'vendor/autoload.php';
	require_once BASEPATH.'library/connection.php';
	require_once BASEPATH.'library/setting.php';
	require_once BASEPATH.'library/CropAvatar.php';
	require_once BASEPATH.'config/config.php';
	require_once BASEPATH.'config/autoload.php';

	require_once BASEPATH.'core/Loader.php';
	require_once BASEPATH.'core/MY_Controller.php';
	require_once BASEPATH.'core/MY_Model.php';
	require_once BASEPATH.'config/routes.php';
	
	foreach ((array)$autoload['helper'] as $key => $value) {
		require_once("helpers/".$value.".php");
	}
	foreach ((array)$autoload['model'] as $key => $value) {
		require_once("models/".$value.".php");
	}

	// $detail_path[0]//controller
	// $detail_path[1]//method
	if(isset($route)){
		if(!isset($_SERVER["REQUEST_URI"]) || $_SERVER["REQUEST_URI"]=='/'){
			$_SERVER["REQUEST_URI"] = $route["default_route"];
		}else{
			if(isset($route[$_SERVER["REQUEST_URI"]])){
				$_SERVER["REQUEST_URI"] = $route[$_SERVER["REQUEST_URI"]];
			}
		}
	}
	//============ ============  ============  ============ 	
	preg_match("/(.+)\?(.+)/", $_SERVER["REQUEST_URI"],$match);
	if(isset($match[1])){
		$_SERVER["REQUEST_URI"] = $match[1];
		$array_get = explode("&", $match[2]);
		foreach ($array_get as $key => $value) {
			if(preg_match("/(.+)=(.+)/", $value,$match)){
				$_GET[$match[1]] = $match[2];
			}
		}
	}
	//============ ============  ============  ============ 

	$detail_path = array_values(array_filter(explode("/", $_SERVER["REQUEST_URI"])) );
	if(empty($detail_path[1])){
		$detail_path[1]="index";
	}
	if($detail_path[0]=="index.php"){
		unset($detail_path[0]);
		$detail_path=array_values($detail_path);
	}

	if(!isset($detail_path[0])){
		$controller_route = "pages";
		$method_route = "home";
	}else{
		$controller_route = $detail_path[0];
		$method_route = $detail_path[1];
	}

	$file_name_include = $controller_route."_controller";
	if(!file_exists("./controllers/".$file_name_include.".php")){
		redirect('/404');
	}
	require_once("./controllers/".$file_name_include.".php");
	
	$hs = new $file_name_include;
	$hs->setting = new Setting;
	if($method_route){
		@$hs->{$method_route}();
	}else{
		redirect('/404','refresh');
	}


	//if($hs->file_assign != null && $hs->assign!=null){
	if(!empty($hs->file_assign)){
		$loader = new Twig_Loader_Filesystem('./views');
		$twig = new Twig_Environment($loader, array(
		    'cache' => false, //'cache' => "./cache",
		));
		$twig->addGlobal("session", $_SESSION);
		if(isset($hs->user_info)){
			$twig->addGlobal("user_info", $hs->user_info);
		}

		// ============ ============  ============  ============ 
		// Add function twig_json_decode_location in twig
		//
		$function = new Twig_SimpleFunction('twig_json_decode_location', function ($json) {
			$array_position = json_decode($json,true);
			if($array_position[0] < 10 && $array_position[1]<10){
				$array_position[0] = 10.771971;
				$array_position[1] = 106.697845;
			}
			return $array_position;
		});
		$twig->addFunction($function);
		$function = new Twig_SimpleFunction('twig_checkfriend', function ($id1,$id2) {
			return Friend_relation::check_friend_options($id1,$id2);
		});
		$twig->addFunction($function);
		$function = new Twig_SimpleFunction('twig_checkfollow', function ($id1,$id2) {
			return Follow::check_follow($id1,$id2);
		});
		$twig->addFunction($function);

		$function = new Twig_SimpleFilter('twig_formatday', function ($day) {
			$timestamp = strtotime($day);
			return date("m/d/Y", $timestamp);
		});
		$twig->addFilter($function);


		//
		//============ ============  ============  ============ 

		//============ ============  ============  ============ 
		// Debug mode
		if(DEBUG_MOD == true){
			$e = microtime();
			$time_load =  $e-$s;
			define("TIME_LOAD",$time_load);
			$twig->addGlobal("debug_mod", true);
			$twig->addGlobal("time_load", TIME_LOAD);
		}
		//
		//============ ============  ============  ============ 
		echo $twig->render($hs->file_assign.".php",$hs->assign);
	}
?>
