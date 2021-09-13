<?php
require_once ('connection.php');

  Class selectUser {
    
    private $conn;

    public function __construct() {
      $this->conn = connection::getConnection();
    }

    public function getUsers() {
      $data = array();
      $cmd = $this->conn->query(' SELECT use_idPk, use_name, use_avatar 
                                  FROM users ');

      // foreach ($cmd->fetch_assoc() as $row) {
      //   $data[] = $row;
      // }
      while($row = $cmd->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }

    public function getUserPerName($Name) {
      $Name = str_replace("-", " ", $Name);
      $data = array();
      $cmd = $this->conn->query(' SELECT use_name, use_avatar 
                                  FROM users
                                  WHERE use_name = "'.$Name.'" ');
      $data = $cmd->fetch_assoc();
      return $data;
    }

  }

?>
