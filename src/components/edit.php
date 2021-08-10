<?php
  include_once ('/connection.php');
  @session_start();
  $valuesComparedDB = " SELECT * 
                        FROM users 
                        WHERE use_idPk = '".$_SESSION['selectedSearch']."'
                      ";

  $queries = $conn->query($valuesComparedDB) or die ($conn->error);
  $data = $queries->fetch_assoc();

  $userSelected = (count($data) != 0) ? $data['use_name'] : 'Nenhum!';
?>
