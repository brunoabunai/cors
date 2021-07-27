<?php
  echo 'hello';
  include_once './connection.php';
  @session_start();

  //Define variables
  $err = array();
  $output = '';
  $creator = $_SESSION['logid'];
  $title = $_POST['pos_title'];
  $description = $_POST['pos_description'];

  //Get values from data base
  $getValues = " SELECT pos_description FROM posts ";
  $queries = $conn->query($getValues) or die ($conn->error);
  $data = $queries->fetch_assoc();

  //Compar if post já existe
  if ($data['pos_description'] == $description) {
    $err[] = "Post já criado";
  }

  //Part 1 Validação
  if (strlen($title) == 0) {
    $err[] = "Preencha o título";
  }
  if (strlen($description)) {
    $err[] = "Preencha a descrição";
  }

  //Part 2 Submit to Data Base
  if (count($err) == 0) {
    $sql_code = " INSERT INTO posts(
                    pos_idFk,
                    pos_title,
                    pos_description,
                    pos_data,
                    pos_dataEdit
                  ) VALUES (
                    '" . $creator . "',
                    '" . $title . "',
                    '" . $description . "'
                  );
                ";
    $code = $conn->query($sql_code) or die ($conn->error);

    if ($code) {
      echo "Hello World - Register";
    } else {
      $err = $code;
    }

  } else if(isset($err) && count($err) > 0){
    echo "<div class='err'>";
      foreach ($err as $val) {
        echo "$val <br>";
      }
    echo "</div>";
  } else {
    $output = 'Registrado com sucesso';
  }

  echo $output;
?>
