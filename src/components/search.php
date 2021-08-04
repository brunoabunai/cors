<?php
include_once './connection.php';

// @session_start();
$limit = 5;
$action = $_POST['action'];

if ($_POST['actualPage'] > 1) {
  $start = (($_POST['actualPage'] - 1) * $limit);
  $page = $_POST['actualPage'];
} else {
  $page = 1;
  $start = 0;
}

//Choose Primary funcitons from component
$query = " Select * FROM users ";
if ($action != '') {
  $query .= '
    WHERE use_name LIKE "%' . str_replace(' ', '%', $action) . '%"
  ';
}
$query .= ' ORDER BY use_name DESC ';

$queryLimit = $query . 'LIMIT ' . $start . ', ' . $limit;

$querys = $conn->query($query) or die($conn->error);
$totalData = $querys->num_rows;

$limiteQueryPerPages = $conn->query($queryLimit) or die($conn->error);
$data = $limiteQueryPerPages->fetch_assoc();

$output = '
  <div class="container">
  <label>Total de Registros - ' . $totalData . '</label>
';

if ($totalData > 0) {
  foreach ($limiteQueryPerPages as $data) {
    $output .= '
      <div class="resultSearch" onclick="selectedSearch('.$data["use_idPk"].')">
        <img src="' . $data["use_avatar"] . '" />
        <label>' . $data["use_name"] . '</label>
      </div>
    ';
    // $_SESSION['editId'] = $data['use_idPk'];
  }
} else {
  $pageArray = array();
  $output .= '
    <h1>
      Not found
    </h1>
  ';
}

$output .= '
  </div>
  <br />
  <div align="center">
  <div class="pagination">
';

$totalLinks = ceil($totalData / $limit);
$previousLink = '';
$nextLink = '';
$pageLink = '';

if($totalLinks > 4){
  if($page < 5){
    for ($count=1; $count <= 5; $count++) { 
      $pageArray[] = $count;
    }
    $pageArray[] = '...';
    $pageArray[] = $totalLinks;
  } else {
    $endLimit = $totalLinks - 5;
    if($page > $endLimit){
      $pageArray[] = 1;
      $pageArray[] = '...';
      for ($count=$endLimit; $count <= $totalLinks; $count++) { 
        $pageArray[] = $count;
      }
    } else {
      $pageArray[] = 1;
      $pageArray[] = '...';
      for ($count=$page - 1; $count <= $page + 1; $count++) { 
        $pageArray[] = $count;
      }
      $pageArray[] = '...';
      $pageArray[] = $totalLinks;
    }
  }
} else {
  for ($count=1; $count <= $totalLinks; $count++) { 
    $pageArray[] = $count;
  }
}

for($count = 0; $count < count($pageArray); $count++){
  if ($page == $pageArray[$count]) {
    $pageLink .= '
      <div class="page-item active">
        <a class="page-link">'.$pageArray[$count].'</a>
      </div>
    ';

    $previousId = $pageArray[$count] - 1;
    if ($previousId > 0) {
      $previousLink = '
        <div class="page-item">
          <a class="page-link" href="javascript:void(0)" data-page_number="'.$previousId.'">Previous</a>
        </div>
      ';
    } else {
      $previousLink = '
      <div class="page-item">
        <a class="page-link">Previous</a>
      </div>
      ';
    }

    $nextID = $pageArray[$count] + 1;
    if ($nextID > $totalLinks) {
      $nextLink = '
        <div class="page-item disabled">
          <a class="page-link">Next</a>
        </div>
      ';
    } else {
      $nextLink = '
        <div class="page-item">
          <a class="page-link" href="javascript:void(0)" data-page_number="'.$nextID.'">Next</a>
        </div>
      ';
    }
  } else {
    if ($pageArray[$count] == '...') {
      $pageLink .= '
        <div class="page-item">
          <a class="page-link">...</a>
        </div>
      ';
    } else {
      $pageLink .= '
        <div class="page-item">
          <a class="page-link" href="javascript:void(0)" data-page_number="'.$pageArray[$count].'">'.$pageArray[$count].'</a>
        </div>
      ';
    }    
  } 
}

if (strlen($action) == 0) {
  $output = '<h1>Not found</h1>';
}
$output .= $previousLink . $pageLink . $nextLink;
$output .= '</div>';
echo $output;

//Front end: Edita a linha 33 e a linha 40
//Front end: linha 140 e 141 tem as duas classes que se repetem em todo code
