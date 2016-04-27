<?php
  include(BASEPATH."config/database.php");
  ActiveRecord\Config::initialize(function($cfg) use ($connections)
  {
    $cfg->set_model_directory('.');
    $cfg->set_connections($connections);
  });
?>
