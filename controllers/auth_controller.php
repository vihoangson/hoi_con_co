<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_controller extends MY_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index()
	{
		
	}

	public function register(){
		if(isset($this->user_info)){
			redirect('/');
		}
		$this->assign("auth/register");
	}

	public function login()
	{
		if($this->session->userdata("user")){
			redirect('/','refresh');
		}
		$users = User::all();

		$error = $this->session->flashdata('error');
		$this->assign("auth/login",compact("users","error"));
	}

	public function do_login(){
		$username = $this->post("username");
		$password = $this->post("password");
		$options = [
			"conditions" => [
				"username" => $username,
				"password" => md5($password),
				]
		];
		$result = User::first($options);
		$this->conver_result($result);

		if(count($result)==1){
			$array = array(
				'user' => $result,
			);
			$this->session->set_userdata( $array );
			redirect('/','refresh');
		}else{
			$this->session->set_flashdata(["error"=>"Username or password went wrong"]);
			redirect('/login','refresh');
		}
	}

	public function logout(){
		$this->session->unset_userdata("user");
		redirect('/','refresh');
	}
	public function login_as(){
		if(DEBUG_MOD!=true){
			return false;
		}
		$id = (int)$this->get("id");
		$options = [
			"conditions" => [
				"id" => $id,
				]
		];
		$result = User::first($options);
		$this->conver_result($result);

		if(count($result)==1){
			$array = array(
				'user' => $result,
			);
			$this->session->set_userdata( $array );
			redirect('/','refresh');
		}else{
			redirect('/login','refresh');
		}
	}

	public function page_404(){
		$this->assign("error_page/404");
	}

}

