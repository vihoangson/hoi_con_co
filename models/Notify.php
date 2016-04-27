<?php
	class Notify extends MY_Model {
	// explicit table name since our table is not "books"
		static $table_name = 'notify';
	// explicit pk since our pk is not "id"
		static $primary_key = 'id';
	}
?>