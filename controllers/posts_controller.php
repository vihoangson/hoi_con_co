<?php
  class Posts_controller  extends MY_Controller {
    public function index() {
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function show() {
      $first_name = 'santo dep trai12;o3iu12oi3uo;';
      $last_name  = 'Snow';
      $this->assign("layout",compact("first_name","last_name"));

    }
  }
?>