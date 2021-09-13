<?php
require_once('connection.php');

  Class register{

    private $conn;
    private $err;

    private $name;
    private $password;
    private $avatar;

    public function __construct(){
      $this->err = array();
      $this->conn = connection::getConnection();
    }

    private function validarInformations(){
      if(strlen($this->name) == 0){ //Vê se o campo "Name" está vazio
        $this->err[] = "Preencha o nome.";
      }
      if(strlen($this->password) == 0){ //Vê se o campo "Password" está vazio
        $this->err[] = "Preencha a senha.";
      }
      
      $cmd = $this->conn->query(' SELECT use_name 
                                  FROM users 
                                  WHERE use_name = "'.$this->name.'" 
                                ') or die ($this->conn->error);
      $data = $cmd->fetch_assoc();
                                
      if(isset($data) && count($data) != 0){ //Vê se usuário já está cadastrado...
        $this->err[] = "Usuário já cadastrado";
      }

      if(count($this->err) == 0){ //Vê se passou pela verificação...
        // $this->setUserInformations($this->name, $this->password, $this->avatar);
        return [true, $this->insertRegister()];
      } else {
        return [false, $this->err];
      }
    }

    private function removeDoubleSpace($something){
      while(strpos($something, "  ") != 0){
        return str_replace("  ", " ", $something);
      }
    }

    private function removeAcentos($string){
      return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }

    public function setUserInformations($name, $password, $avatar = null){
      while((strpos($name, "  ") != 0)){
        (strpos($name, "  ") != 0) ? $name = $this->removeDoubleSpace($name) : $name = $name;
      }
      $name = $this->removeAcentos($name);

      $this->name = trim($name);
      $this->password = $password;
      $this->avatar = $avatar;

      return $this->validarInformations();
    }
    
    private function insertRegister(){
      // (strlen($this->avatar) != 0) ? (
        $cmd = $this->conn->query(" INSERT INTO users(
                                      typ_idFk,
                                      use_name,
                                      use_password,
                                      use_avatar
                                    ) VALUES (
                                      '".(2)."',
                                      '".$this->name."',
                                      '".md5(md5($this->password))."'
                                    );
                                  ");
        print_r('hello potato1');
        // ) : (
        // print_r('hello potato2')
        // $cmd = $this->conn->query(" INSERT INTO users(
        //                               typ_idFk,
        //                               use_name,
        //                               use_password
        //                             ) VALUES (
        //                               '".(2)."',
        //                               '".$this->name."',
        //                               '".md5(md5($this->password))."
        //                             );
        //                           ");
        print_r($cmd);
      // );

      return array('name' => $this->name);
    }
  }
