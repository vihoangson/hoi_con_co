<?php 
class My_Model extends ActiveRecord\Model{
	static $db = 'hoangson_lesson_3';
    // explicit connection name since we always want production with this model
    static $connection = 'lampart';

    public function setNews(){
    	
    }
}
?>
