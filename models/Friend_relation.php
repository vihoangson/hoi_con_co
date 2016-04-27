<?php
	class Friend_relation extends MY_Model {

	// explicit table name since our table is not "books"
		static $table_name = 'friend_relation';

	// explicit pk since our pk is not "id"
		static $primary_key = 'id';

		//============ ============  ============  ============ 
		// Check friend mode
		// 1: A->B A<|-B
		// 2: A-|>B A<-B
		// 3: A->B A<-B
		// 4: A-|>B A<|-B
		// 
		public static function check_friend_options($user_id_a,$user_id_b){

			//============ ============  ============  ============ 
			//
				$options = [
					"conditions"=>[
						"(user_id=? and user_id_to=?) or (user_id=? and user_id_to=?)",$user_id_a,$user_id_b,$user_id_b,$user_id_a
					]
				];
				$count = count(self::find("all",$options));
				if($count==2){
					return 3;
				}elseif($count==1){
					$options = [
						"conditions"=>[
							"(user_id=? and user_id_to=?)",$user_id_a,$user_id_b
						]
					];
					$count = count(self::find("all",$options));
					if($count==1){
						return 1;
					}else{
						return 2;
					}
				}
			return 4;
		}

		public static function check_friend($user_id_1,$user_id_2,$return_result=false){
			$options= [
				"conditions"=>[
					"user_id = ? and user_id_to = ?",$user_id_1,$user_id_2
					]
			];
			if(count(self::find("all",$options))==1){
				if($return_result==true){
					return self::first($options);
				}
				return true;
			}else{
				return false;
			}
		}

	}
?>