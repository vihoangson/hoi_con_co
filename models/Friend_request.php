<?php
	class Friend_request extends MY_Model {
	// explicit table name since our table is not "books"
		static $table_name = 'friend_request';
	// explicit pk since our pk is not "id"
		static $primary_key = 'id';

		public static function count_request($id){
			$friend_request = self::all([
				"conditions"=>["user_id_to = ?",$id]
			]);
			return $friend_request;
		}

		public static function get_user_request($id){
			$friend_request = self::all([
				"conditions"=>["user_id_to = ?",$id]
			]);
			$rs        = [];
			$list_user = [];
			if($friend_request){
				foreach ($friend_request as $key => $value) {
					$list_user[] = ($value->user_id);
				}
			}
			return $list_user;
		}

	}
?>