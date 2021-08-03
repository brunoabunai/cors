<?php
include_once './connection.php';

  // @session_start();
  $limit = 5;
  $action = $_POST['action'];
  
  if ($_POST['actualPage'] > 1) {
    $start = (($_POST['actualPage']-1) * $limit);
    $page = $_POST['actualPage'];
  } else {
    $start = 0;
  }

  //Choose Primary funcitons from component
  $query = " Select * FROM users ";
  if ($action != '') {
    $query .= '
      WHERE use_name LIKE "%'.str_replace(' ', '%', $action).'%"
    ';
  }
$query .= ' ORDER BY use_name DESC ';

$queryLimit = $query.'LIMIT '.$start.', '.$limit;

$querys = $conn->query($query) or die ($conn->error);
$totalData = $querys->num_rows;

$limiteQueryPerPages = $conn->query($queryLimit) or die ($conn->error);
$data = $limiteQueryPerPages->fetch_assoc();

$output = '
  <div class="container">
  <label>Total de Registros - '.$totalData.'</label>
';

  if ($totalData > 0) {
    foreach ($limiteQueryPerPages as $data) {
      $output .= '
        <div class="resultSearch">
          <img src="'.$data["use_avatar"].'" />
          <label>'.$data["use_name"].'</label>
        </div>
      ';
      // $_SESSION['editId'] = $data['use_idPk'];
    }
  }

$output .= '
  </div>
';

if (strlen($action) == 0) {
  $output = '<h1>Not found</h1>';
}
echo $output;
//Edita a linha 33 e a linha 40
