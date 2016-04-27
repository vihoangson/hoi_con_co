<?php 

class Setting
{
	public $data;

	private $file_setting;

	function __construct(){

		$this->file_setting = BASEPATH."config/data_setting.php";

		if(!file_exists($this->file_setting)){
			$this->data = array (
				'DEBUG_MOD' => 
					array (
						'type' => 'boolean',
						'value' => true,
						'display_name' => 'Debug mode',
						'desc' => 'This is flag toggle debug mode of page',
					),
				) ;
			$this->save_setting();
		}
		$this->init();
	}

	public function init(){
		$this->data = include($this->file_setting);
	}

	public function set_config($options=null){
	}

	public function get($key=null){
		if($key==null){
			return $this->data;
		}else{
			if(isset($this->data[$key])){
				return $this->data[$key];
			}else{
				return ;
			}
		}
	}

	public function get_keys(){
		return array_keys($this->data);
	}

	public function save_setting(){
		$string_setting = var_export($this->data, true);
		if(file_put_contents($this->file_setting, "<?php return $string_setting ;")){
			return true;
		}
		return false;
	}
}
 ?>