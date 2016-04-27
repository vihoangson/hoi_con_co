<?php 
/**
* 
*/
class Loader
{
	function __construct(){
		require_once(BASEPATH."core/Filter.php");
		require_once(BASEPATH."core/Session.php");
		require_once BASEPATH.'library/upload_file.php';
		$this->init();
	}

	public function init(){
		$this->filter = new Filter;
		$this->filter->init();
		$this->session = new Session;
		$this->session->init();
		$this->upload_file = new Upload_file;
	}

}
 ?>