<?php
	class Homepage_controller extends MY_Controller {
		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata("user")){
				redirect('/login','refresh');
			}
		}

		public function index(){
			redirect('/profile');
		}

		public function home() {
			
		}

		public function upload_avatar(){
			$path = "uploads/profile/";
			$this->upload_file->path    = ASSETSPATH.$path;
			$this->upload_file->type    = "jpeg|jpg|gif|png";
			$this->upload_file->maxsize = "10485760";//10Mb
			$this->upload_file->width   = "1000";
			$this->upload_file->height  = "1000";
			if($this->upload_file->upload("file_x")){
				$file_name = $this->upload_file->file_info["file_name"];
				$user = User::find($this->user_info->id);
				@unlink(BASEPATH.ltrim($user->avatar, '/'));
				$user->avatar = "/assets/".$path.$file_name;
				if($user->save()){
					echo json_encode(["status"=>"done","path_img"=>$user->avatar]);
					die;
				}
			}else{
				$error_message = "<ul>";
				foreach ($this->upload_file->error_message as $key => $value) {
					$error_message .= "<li>".$value."</li>";
				}
				$error_message .= "</ul>";
				echo $error_message;
				die;
			}
		}

		public function upload_img(){
			$flag_error = true;
			$all_file = $_FILES;
			$path = "uploads/pictures/";
			$this->upload_file->path    = ASSETSPATH.$path;
			$this->upload_file->type    = "jpeg|jpg|gif|png";
			$this->upload_file->maxsize = "10485760";//10Mb
			$this->upload_file->width   = "1000";
			$this->upload_file->height  = "1000";

			foreach ($all_file["file_x"]["name"] as $key => $value) {
				$_FILES["file_x"]["name"]     = $all_file["file_x"]["name"][$key];
				$_FILES["file_x"]["type"]     = $all_file["file_x"]["type"][$key];
				$_FILES["file_x"]["tmp_name"] = $all_file["file_x"]["tmp_name"][$key];
				$_FILES["file_x"]["error"]    = $all_file["file_x"]["error"][$key];
				$_FILES["file_x"]["size"]     = $all_file["file_x"]["size"][$key];
				if($this->upload_file->upload("file_x")){
					$file_name = $this->upload_file->file_info["file_name"];
				}else{
					$error_message = "<ul>";
					foreach ($this->upload_file->error_message as $key => $value) {
						$error_message .= "<li>".$value."</li>";
					}
					$error_message .= "</ul>";
					echo "Fail";
					die;
				}
				if(isset($picture)){
					unset($picture);
				}
				$picture = new Picture;
				$picture->user_id = $this->user_info->id;
				$picture->url     = "/assets/".$path.$file_name;
				if(!$picture->save()){
					$flag_error=false;
				}
			}

			if($flag_error==true){
				$rs = Picture::find("all",[
						"conditions"=>[
							"user_id" => $this->user_info->id
						],
						"order" => "id desc"
					]);
				foreach ($rs as $key => &$result) {
					$result_2 = $result->to_array();

					if(isset($rs[$key]->like_table[0]->id)){
						$result_2["liked"] = 1;
					}else{
						$result_2["liked"] = 2;
					}
					$result = $result_2;
				}
				echo json_encode($rs);
			}else{
				echo "Fail";
			}
		}

		public function setting(){
			if($this->post()){
				foreach ($this->post() as $key => $value) {
					if(preg_match("/^setting_(.+)$/", $key,$match)){
						if($this->setting->data[$match[1]]["type"]=="boolean"){
							if($value==0){
								$this->setting->data[$match[1]]["value"] = false;
							}else{
								$this->setting->data[$match[1]]["value"] = true;
							}
						}else{
							$this->setting->data[$match[1]]["value"] = $value;
						}
					}
					$this->setting->save_setting();
				}
				redirect('/setting');
				die;
			}
			$setting = $this->setting->get();
			$this->assign("/auth/setting",compact("setting"));
		}
	}
?>