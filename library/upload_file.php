<?php 

class Upload_file
{
	public $path;
	public $type;
	public $maxsize;
	public $width;
	public $height;
	public $error_message;
	public $file_info;
	public function __construct()
	{
		
	}

	public function init($config){
		$this->path    = "./";
		$this->type    = "jpg|gif|png";
		$this->maxsize = "10485760"; //10Mb
		$this->width   = "1000";
		$this->height  = "1000";
		foreach ($config as $key => $value) {
			$this->{$key} = $value;
		}
	}

	private function check_extension($file){
		$acceptedFormats = explode("|",$this->type);
		if(!in_array(strtolower(pathinfo($file["name"], PATHINFO_EXTENSION)), $acceptedFormats)) {
		    return false;
		}
		return true;
	}

	private function check_size($file){
		if($file["size"] > $this->maxsize){
			return false;
		}
		return true;
	}


	public function upload($field_name="userfile"){
		$flag=true;
		//check extension
		if(!$this->check_extension($_FILES[$field_name])){
			$this->error_message[] = "Extension don't have in list";
			$flag = false;
		}

		//check size
		if(!$this->check_size($_FILES[$field_name])){
			$this->error_message[] = "Over size can upload";
			$flag = false;
		}

		if($flag==true){
			$new_filename = filter_filename(time()."_".$_FILES[$field_name]["name"]);
			$file_name_destination = $this->path.$new_filename;
			if(move_uploaded_file($_FILES[$field_name]["tmp_name"], $file_name_destination)){
				$this->file_info["file_name"] = $new_filename;
				return true;
			}else{
				$this->error_message[] = "Please re-check folder permission";
				return false;
			}
		}
	}


}
 ?>