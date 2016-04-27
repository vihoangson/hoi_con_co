<?php
	$setting = include(BASEPATH."config/data_setting.php");
	foreach ($setting as $key => $value) {
		define($key,$value["value"]);
	}
?>