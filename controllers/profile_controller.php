<?php
	class Profile_controller extends MY_Controller {
		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata("user")){
				redirect('/login','refresh');
			}			
		}
		public function index(){

			if(!$this->session->userdata("user")){
				redirect('/login','refresh');
			}
			if(($this->get("id"))){
				$id = $this->get("id");
			}else{
				$id = $this->user_info->id;
			}
			$user = User::find($id);
			
			$photos= Picture::find("all",[
				"conditions"=>[
					"user_id = ?" , $id
				],
				"order" => "id desc",
			]);
			
			foreach ($photos as $key => $value) {
				foreach ($value->like_table as $key2 => $value2) {
					$like[$value->id]=$value2->to_array();
				}
			}

			if( $this->get("id") == $this->user_info->id || !$this->get("id") ){
				$status_page = "owner";
			}elseif(Friend_relation::check_friend_options($this->get("id"),$this->user_info->id) == 3){
				$status_page = "friend";
			}else{
				$status_page = "guest";
			}
			
			$data_notify = Notify::all(["conditions"=>["user_id_to = ?",$id],"order"=>"id desc"]);

			$this->assign("profile/index",compact("user","photos","like","status_page","data_notify"));
		}
		public function search_user(){
			$keyword = $this->get("keyword");
			if(empty($keyword)) redirect('/','refresh');
			$user = new User;
			$rs = $user->find("all",["conditions"=>["username like '%".$keyword."%'"]]);
			$this->assign("profile/search_user",compact("rs"));
		}

		public function friend_list(){
			if($this->user_info->friends==[]){
				$rs=[];
			}else{
				$user_array_id = $this->user_info->friends;
				$options = [
					"conditions"=>[
						"id in (?)",$user_array_id
					]
				];
				$rs = User::find("all",$options);
			}
			$this->assign("profile/friend_list",compact("rs"));
		}

		public function follow_list(){
			if(!$this->user_info->follow) {
				$rs = [];
			}else{
				$list_friends = $this->user_info->follow;
				$rs = User::all(["conditions"=>["id in (?)",$list_friends]]);
			}

			$this->assign("profile/follow_list",compact("rs"));
		}

		public function favorite_list(){
			$friend_request = Friend_request::all([
				"conditions"=>["user_id_to = ?",$this->user_info->id]
			]);
			$rs = [];
			if($friend_request){
				foreach ($friend_request as $key => $value) {
					$list_user[] = ($value->user_id);
				}
				$rs = User::all(["conditions"=>["id in (?)",$list_user]]);
			}
			$this->assign("profile/follow_list",compact("rs"));
		}

		public function favorite_list_(){
			$list_friends = implode(",",$this->user_info->request);
			if($list_friends){
				$rs = User::all(["conditions"=>["id in (".$list_friends.")"]]);
			}
			$this->assign("profile/favorite_list",compact("rs"));
		}

	}
?>
