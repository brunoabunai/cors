<?php

  Class selectUserController extends Controller{

    public function index() {
      $u = new selectUser();
      $data = $u->getUsers();

      $this->loadTemplate('selectUser', array(), $data);
    }

    public function search() {
      $u = new selectUser();
      $data = $u -> getUsersSearch();

      // $this->loadTemplate('viewSearch', array(), $data);
    }

    public function editUser($nameUser) {
      $u = new selectUser();
      $data = $u->getUserPerName($nameUser);
      
      $this->loadTemplate('edit', $data);
    }

  }

?>
