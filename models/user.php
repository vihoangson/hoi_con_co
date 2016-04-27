<?php
  class User extends MY_Model {
    // explicit table name since our table is not "books"
    static $table_name = 'user';
    // explicit pk since our pk is not "id"
    static $primary_key = 'id';
	static $has_many = array(
		array('friend_relation', 'class_name' => 'Friend_relation', 'foreign_key' => 'user_id', 'primary_key' => 'id'),
		);

	public function set_santo($username){
		$this->username="234";
		return 1;
	}
  }
?>