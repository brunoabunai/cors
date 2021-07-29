<?php
  include_once './connection.php';
  @session_start();
  date_default_timezone_set('America/Sao_Paulo');

  //Define variables
  $err = array();
  $output = '';
  $creator = $_SESSION['logid'];
  $title = $_POST['pos_title'];
  $description = $_POST['pos_description'];
  // $datas = date('l jS \of F Y h:i:s A');
  $datas = date("Y-m-d H:i:s");
  
  //Get values from data base
  $getValues = " SELECT pos_description FROM posts ";
  $queries = $conn->query($getValues) or die ($conn->error);
  $data = $queries->fetch_assoc();
  
  //Compar if post já existe
  if ($data['pos_description'] == $description) {
    $err[] = "Post já criado";
    echo "<script>location.href='../../404.php';</script>";
    exit;
  }

  //Part 1 Validação
  if (strlen($title) == 0) {
    $err[] = "Preencha o título";
  }
  if (strlen($description) == 0) {
    $err[] = "Preencha a descrição";
  }
  
  //Part 2 Submit to Data Base
  if (count($err) == 0) {
    echo "<br>";
    echo $datas;
    echo "<br>";
    $sql_code = " INSERT INTO posts(
                    use_idFk,
                    pos_title,
                    pos_description,
                    pos_data,
                    pos_dataEdit
                  ) VALUES (
                    '" . $creator . "',
                    '" . $title . "',
                    '" . $description . "',
                    '" . $datas . "',
                    '" . $datas . "'
                  );
                ";
    $code = $conn->query($sql_code) or die ($conn->error);

    if ($code) {
      echo "<script>location.href='../../index.php';</script>";
      exit;
    } else {
      $err = $code;
    }

  } else if(isset($err) && count($err) > 0){
    // echo "<div class='err'>";
    //   foreach ($err as $val) {
    //     echo "$val <br>";
    //   }
    // echo "</div>";
    echo "<script>location.href='../../404.php';</script>";
    exit;
  } 
  // else {
  //   // $output = 'Post criado com sucesso'; this line make to show us the err (lol part of back)
  // }

  echo "<script>location.href='../../index.php?p=menu';</script>";
?>
