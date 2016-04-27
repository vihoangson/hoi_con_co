<?php 
class Session{
	public function __construct(){
		session_start();

		$_SESSION["content"]= 123;
	}
	
	public function init(){
	
	}

	public function userdata($key){
		if(isset($_SESSION["userdata"][$key])){
			return $_SESSION["userdata"][$key];
		}
		return false;
	}

	public function set_userdata($params){
		foreach ($params as $key => $value) {
			$_SESSION["userdata"][$key] = $value;	
		}
	}

	public function unset_userdata($key){
		unset($_SESSION["userdata"][$key]);
	}

	public function unset_all_userdata(){
		unset($_SESSION["userdata"]);		
	}

	public function flashdata($key){
		if(isset($_SESSION["flashdata"][$key])){
			$return = $_SESSION["flashdata"][$key];
			unset($_SESSION["flashdata"][$key]);
			return $return;
		}
		return false;
	}

	public function set_flashdata($params){
		foreach ($params as $key => $value) {
			$_SESSION["flashdata"][$key] = $value;	
		}
	}
}	
?>
