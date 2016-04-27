<?php 
class MY_Controller extends Loader
{
	public $assign;
	public $file_assign;
	public $name_project;
	function __construct()
	{
		parent::__construct();
		$this->name_project = "Lesson3";
		if(($this->session->userdata('user'))){
			$this->user_info = $this->session->userdata('user');
		}
		$this->load_friend_follow_list();
	}

	function load_friend_follow_list(){
		if(!isset($this->user_info)) return false;
				
		
		$options = [
			"conditions"=>[
				"user_id= ? or user_id_to= ? ",$this->user_info->id,$this->user_info->id
			]
		];
		$rs_step1 = (Friend_relation::find("all",$options));
		//dd(Friend_relation::table()->last_sql);

		$this->user_info->friends=[];
		$this->user_info->follow=[];
		$this->user_info->request=[];
		foreach ($rs_step1 as $key => $value) {
			$status = Friend_relation::check_friend_options($value->user_id,$this->user_info->id);
			if($status == 3){
				$this->user_info->friends[] = $value->user_id;
			}
			// if($status == 1){
			// 	$this->user_info->request[] = $value->user_id;
			// }
		}
		$this->user_info->request = Friend_request::get_user_request($this->user_info->id);
		$follow_list = Follow::all(["conditions"=>["user_id =?",$this->user_info->id]]);
		foreach ($follow_list as $key => $value) {
			$this->user_info->follow[] = $value->user_id_to;
		}

		$this->user_info->request = array_unique($this->user_info->request);
		$this->user_info->friends = array_unique($this->user_info->friends);
		$this->user_info->follow = array_unique($this->user_info->follow);
	}

	protected function assign($viewname,$variable=null){
		if($variable==null){
			$this->assign = [];
		}else{
			$this->assign = $variable;
		}
		$this->file_assign = $viewname;
	}

	public function get($key){
		$return = @$this->filter->filter_input_get($_GET[$key]);
		return $return;
	}

	public function post($key=null){
		if($key==null){
			return $_POST;
		}else{
			$return = @$this->filter->filter_input_post($_POST[$key]);
			return $return;
		}
	}
	public function conver_result(&$rs){
		if(!isset($rs)) return false;
		if(!is_array($rs)){
			$rs = (object)$rs->to_array();
		}else{
			foreach($rs as &$value){
				$value = (object)$value->to_array();
			}
		}
	}
}
?>
