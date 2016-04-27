<?php
	class Follow extends MY_Model {
	// explicit table name since our table is not "books"
		static $table_name = 'follow';
	// explicit pk since our pk is not "id"
		static $primary_key = 'id';
		public static function check_follow($id1,$id2){
			$options = [
				"conditions"=>[
				"user_id = ? and user_id_to = ? ",$id1,$id2
				]
			];
			if(count(self::all($options))==0){
				return 0;
			}else{
				return 1;
			}
		}
	}
?>