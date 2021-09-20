<?php

  Class createPostsController extends Controller{

    public function index(){
      $this->loadTemplate('createPosts');
    }

    public function submit(){
      $r = new createPosts();
      $data = $r -> setPostInformations($_POST['pos_title'], $_POST['pos_description']);
      
      if (isset($data[0]) && $data[0]) { //true = validation true (pass)
        array_shift($data);
        $this->loadTemplate('menu');
      } else {
        array_shift($data);
        $this->loadTemplate('errorLog', $data);
      }
      
    }
  }

?>
