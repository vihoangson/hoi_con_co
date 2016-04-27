<?php
	class Picture extends MY_Model {
	// explicit table name since our table is not "books"
		static $table_name = 'picture';
	// explicit pk since our pk is not "id"
		static $primary_key = 'id';

		static $has_many = array(
			array('like_table', 'class_name' => 'Like_table', 'foreign_key' => 'picture_id', 'primary_key' => 'id'),
			);
	}
?>