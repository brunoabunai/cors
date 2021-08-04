<?php
  include_once '/connection.php';

  $name = trim($_POST['reg_name']); //trim remove os espaço em branco das borda
  $password = ($_POST['reg_password']);
  // $avatar = $_POST['reg_avatar'];
  $avatar = 'https://webhostingmedia.net/wp-content/uploads/2018/01/http-error-404-not-found.png';
  $err = array();
  $output = '';

  // Part 0 Verificar se já está registrado
  $valuesComparedDB = " SELECT * 
                        FROM users 
                        WHERE use_name = '" . $name . "' 
                        AND use_password='" . md5(md5($password)) . "'
                      ";
  $queries = $conn->query($valuesComparedDB) or die ($conn->error);
  $data = $queries->fetch_assoc();
  $getExistUser = $data['use_name'];

  // Part 1 Validação
  function removeDoubleSpace($something){
    while(strpos($something, "  ") != 0){
      return str_replace("  ", " ", $something);
    }
  }
  $name = removeDoubleSpace($name);
  $getExistUser = removeDoubleSpace($getExistUser);
  // $password = removeDoubleSpace($password);

  if ($getExistUser == $name) {
    $err[] = "Usuário já cadastrado";
    echo "<script>location.href='../../404.php';</script>";
    exit;
  }


  if ((strlen($name) == 0)) {
    $err[] = "Preencha o nome.";
  }
  if (strlen($password) == 0) {
    $err[] = "Preencha a senha";
  }
  // if (strlen($avatar) == 0) {
  //   $err[] = "Preencha o avatar";
  // }

  // Part 2 Submit to Data base
  if (count($err) == 0) {
    $sql_code = " insert into users(
                    use_name,
                    use_password,
                    use_avatar
                  ) values (
                    '" . $name . "',
                    '" . md5(md5($password)) . "',
                    '" . $avatar . "'
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
    echo "<script>location.href='../../404.php';</script>";
    exit;
  }

  echo "<script>location.href='../../index.php?p=menu';</script>";
  exit;
?>
