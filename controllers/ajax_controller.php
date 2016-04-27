<?php
	class Ajax_controller extends MY_Controller {

		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata("user")){
				redirect('/login','refresh');
			}
		}

		public function do_delete_img(){
			$picture = Picture::find($this->post("id_img"));
			@unlink(BASEPATH.ltrim($picture->url,"/"));
			if($picture->delete()){
				echo 1;
			}else{
				echo 0;
			}
		}

		public function do_like(){
			$like_tb = new Like_table;

			$options = ["conditions"=>["picture_id = ? and user_id = ?",$this->post("id_img"),$this->user_info->id]];

			$current_like = $like_tb->first($options);

			if($current_like){
				if($current_like->delete()){
					$status="unlike";
				}else{
					$flag=false;
				}
			}else{
				$like_tb->picture_id = $this->post("id_img");
				$like_tb->user_id = $this->user_info->id;
				if($like_tb->save()){
					$status="like";
				}else{
					$flag=false;
				}
			}

			if($status){
				echo $status;
			}else{
				if($flag==false){
					echo 0;
				}
			}
		}

		public function toggle_friend(){
			$user_id_to = $this->post("user_id_to");
			$status     = $this->post("status");

			switch($status){
				case "wait":
					$flag=true;
					$friend_relation = new Friend_relation;
					$options=[
						"conditions"=>[
							"user_id =? and user_id_to = ?",$this->user_info->id,$user_id_to
						]
					];
					if(!$friend_relation->first($options)->delete()){
						$flag = false;
					}
					
					$friend_request = Friend_request::all(["conditions"=>["user_id = ? and user_id_to = ?",$this->user_info->id,$user_id_to]]);

					if($friend_request!=[]){
						if(!$friend_request[0]->delete()){
							$flag= false;
						}
					}
					if($flag==true){
						echo 4;
						die;
					}
				break;
				case "approve":
					$flag=true;
					$friend_relation = new Friend_relation;
					$friend_relation->user_id = $this->user_info->id;
					$friend_relation->user_id_to = $user_id_to;
					if(!$friend_relation->save()){
						$flag= false;
					}
					$friend_request = Friend_request::all(["conditions"=>["user_id = ? and user_id_to = ?",$user_id_to,$this->user_info->id]]);
					if($friend_request){
						$friend_request[0]->delete();
					}
					if($flag==true){
						echo 3;
						die;
					}
				break;
				case "unfriend":
					$friend_relation = new Friend_relation;
					$options=[
						"conditions"=>[
							"user_id =? and user_id_to = ?",$this->user_info->id,$user_id_to
						]
					];
					
					if($friend_relation->first($options)->delete()){
						echo 2;
						die;
					}
				break;
				case "friend":
					$flag                        = true;
					$friend_relation             = new Friend_relation;
					$friend_relation->user_id    = $this->user_info->id;
					$friend_relation->user_id_to = $user_id_to;
					if(!$friend_relation->save()){
						$flag=false;
					}
					if(count(Friend_request::all(["conditions"=>["user_id = ? and user_id_to = ?",$this->user_info->id,$user_id_to]]))==0){
						$friend_request             = new Friend_request;
						$friend_request->user_id    = $this->user_info->id;
						$friend_request->user_id_to = $user_id_to;
						if(!$friend_request->save()){
							$flag=false;
						}
					}
					if($flag==true){
						echo 1;
						die;
					}
				break;
			}
			echo 0;
			die;
		}

		public function toggle_friend_tmp(){
			$result = Friend_relation::check_friend($this->user_info->id,$this->post("user_id"),true);
			if($result==false){
				$friend_relation             = new Friend_relation;
				$friend_relation->user_id    = $this->user_info->id;
				$friend_relation->user_id_to = $this->post("user_id");
				if($friend_relation->save()){
					echo "unfriend";
				}else{
					echo "0";
				}
			}else{
				if($result->delete()){
					echo "friend";
				}else{
					echo "0";
				}
			}
		}

		public function toggle_follow(){
			$user_id_to = (int)$this->post("user_id");
			if(($user_id_to)==0){echo 0; return;}
			$options = [
				"conditions"=>[
				"user_id = ? and user_id_to = ? ",$this->user_info->id,$user_id_to
				]
			];
			$rs = Follow::all($options);
			if(count($rs)==1){
				if($rs[0]->delete()){
					echo "delete";
				}
			}else{
				$follow = new Follow;
				$follow->user_id = $this->user_info->id;
				$follow->user_id_to = $user_id_to;
				if($follow->save()){
					echo "add";
				}else{
					echo 0;
				}
			}
			die;
		}

		public function upload_avatar(){
			if(empty($_FILES['file']))
			{
				exit();	
			}
			$errorImgFile = "./img/img_upload_error.jpg";
			$destinationFilePath = './img-uploads/'.$_FILES['file']['name'];
			if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
				echo $errorImgFile;
			}
			else{
				echo $destinationFilePath;
			}
		}

		public function save_position(){
			// $position = $this->post("position");
			// $position = json_encode(filter_url_map($position));
			$position = explode(",", $this->post("position"));
			$position = json_encode(($position));
			$user = User::find($this->user_info->id);
			$user->position = $position;
			if($user->save()){
				echo 1;
			}else{
				echo 0;
			}
		}

		public function edit_profile(){
			preg_match("/^edit_(.+)$/", $this->post('field'),$match);

			$value = $this->post('value');
			$user = User::find($this->user_info->id);
			$user->{$match[1]} = $value;

			if($match[1]=="introduction"){
				$json_value=[];
				if($user->save()){
					$json_value["status"]=1;
					$json_value["value"] = (xss_clean($value));
				}else{
					$json_value["status"]=0;
					$json_value["value"] = "";
				}
				echo json_encode($json_value);
			}else{

				if($user->save()){
					echo 1;
				}else{
					echo 0;
				}
			}
		}

		public function crop_img(){
			$x      = $this->post("x");
			$y      = $this->post("y");
			$width  = $this->post("width");
			$height = $this->post("height");
			$url = $this->post("url");
			$src = BASEPATH.ltrim($url,"/");
			$dst = BASEPATH.ltrim($url,"/");
			$data = (object)["width"=>$width,"height"=>$height,"rotate"=>null,"x"=>$x,"y"=>$y];
			$crop = new CropAvatar;
			$crop->setSrc($src);
			$crop->crop($src, $dst, $data);
			if($crop->getMsg()==null){
				echo 1;
			}else{
				echo 0;
			}
		}

		public function test_function(){
			dd(Friend_relation::check_friend_options(1,2));
		}

		public function view_img(){
			$user_id = $this->post("user_id");
			$id_img  = $this->post("id_img");
			if(Friend_relation::check_friend_options($user_id,$this->user_info->id)==3 || $user_id == $this->user_info->id){
				$picture = Picture::find($id_img);
				$view = $picture->view;
				$picture->view = $view+1;
				if($picture->save()){
					echo $picture->view;
				}else{
					echo "false";
				}
			}else{
				echo "false";
			}
		}
	}

?>