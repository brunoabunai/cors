<?php
  include_once '/connection.php';
  
  @session_start();
  // Part 1 Validação
  $err = array();
  $output;

  if (strlen($_POST['log_name']) == 0) {
    $err[] = "Preencha o nome.";
  }
  if (strlen($_POST['log_password']) == 0) {
    $err[] = "Preencha a senha";
  }

  // Part 2 Funcionalização
  $valuesComparedDB = " SELECT * 
                        FROM users 
                        WHERE use_name = '".$_POST['log_name']."' 
                        AND use_password='".md5(md5($_POST['log_password']))."'
                      ";

  $queries = $conn->query($valuesComparedDB) or die ($conn->error);
  $data = $queries->fetch_assoc();

  if (count($data) == 0) {
    $err[] = "Not found";
  }

  // Part 3 Saida
  if(isset($err) && count($err) > 0){
    echo "<script>location.href='../../404.php';</script>";
    exit;
  } else {
    $_SESSION['logged'] = true;
    $_SESSION['logid'] = $data['use_idPk'];
  }

  echo "<script>location.href='../../index.php?p=menu';</script>";
  exit;
?>
