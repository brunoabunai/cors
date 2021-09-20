<?php
require_once ('connection.php');

  Class selectUser {
    
    private $conn;
    public $data;
    // public $informations;

    public function __construct() {
      $this->conn = connection::getConnection();
      $this->data = array();
      // $this->informations = array();
    }

    /**
     * ------------------------------------------------------------
     * Get all users regitereds
     * ------------------------------------------------------------
     */
    public function getUsers() {
      // $data = array();
      $cmd = $this->conn->query(' SELECT use_idPk, use_name, use_avatar 
                                  FROM users ');

      // foreach ($cmd->fetch_assoc() as $row) {
      //   $data[] = $row;
      // }
      while($row = $cmd->fetch_assoc()) {
        $this->data[] = $row;
      }
      return $this->data;
    }

    /**
     * ------------------------------------------------------------
     * Get user from search (input)
     * ------------------------------------------------------------
     */
    public function getUsersSearch() {
      /** Vars of controller */
      $limit = 5;
      $action = $_POST['action'];
      
      if ($_POST['actualPage'] > 1) {
        $start = (($_POST['actualPage'] - 1) * $limit);
        $pages = $_POST['actualPage'];
      } else {
        $start = 0;
        $pages = 1;
      }

      /** Choose user from search */
      $query = " SELECT typ_IdFk, use_name, use_avatar
                 FROM users ";

      //Se o $action estiver com algum conteudo, ele irá fazer o filtro apartir da variavel
      ($action != '') ? $query .= ' WHERE use_name LIKE "%'.str_replace(' ', '%', $action).'%" ' : null;
      $query .= ' ORDER BY use_name ASC ';

      $queryLimit = $query . 'LIMIT ' . $start . ', ' . $limit;

      $querys = $this->conn->query($query) or die($this->conn->error);
      $totalData = $querys->num_rows;

      $limitQueryPages = $this->conn->query($queryLimit) or die($this->conn->error);
      $row = $limitQueryPages->fetch_assoc();

      $output = '
      <label>Total de Registros - '.$totalData.'</label>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Creator</th>
          <th>Name</th>
          <th>Image</th>
        </tr>
      ';

      if ($totalData > 0) {
        foreach ($limitQueryPages as $row) {
          $output .= '
          <tr>
            <td>'.$row["typ_IdFk"].'</td>
            <td>'.$row["use_name"].'</td>
            <td>'.$row["use_avatar"].'</td>
          </tr>
          ';
        }
      } else {
        $output .= '
        <tr>
          <td colspan="4" align="center">No Data Found</td>
        </tr>
        ';
      }

      /** Final das configurações básicas */

      /** -------------------------------- */
      $totalLinks = ceil($totalData / $limit);
      $pageArray = array();
      $previewsLink = '';
      $nextLink = '';
      $pageLink = '';

      /** Iniciao da paginação */
      if($totalLinks > 4){
        if($pages < 5){
          for($count = 1; $count <= 5; $count++){
            $pageArray[] = $count;
          }
          $pageArray[] = '...';
          $pageArray[] = $totalLinks;

        }else{
          $endLimit = $totalLinks - 5;
          if($pages > $endLimit){
            $pageArray[] = 1;
            $pageArray[] = '...';
            for($count = $endLimit; $count <= $totalLinks; $count++){
              $pageArray[] = $count;
            }

          }else{
            $pageArray[] = 1;
            $pageArray[] = '...';
            for($count = $pages - 1; $count <= $pages + 1; $count++){
              $pageArray[] = $count;
            }
            $pageArray[] = '...';
            $pageArray[] = $totalLinks;

          }
        }

      }else{
        for($count = 1; $count <= $totalLinks; $count++){
          $pageArray[] = $count;
        }

      }
      /** Paginação final */

      /** --------------------- */

      /** Inicio do controle da paginação */

      for($count = 0; $count < count($pageArray); $count++){
        if($pages == $pageArray[$count]){
          $pageLink .= '
          <li class="page-item active">
            <a class="page-link" href="#">'.$pageArray[$count].'</a>
          </li>
          ';
    
          $previousId = $pageArray[$count] - 1;
          if($previousId > 0){
            $previewsLink = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previousId.'">Previous</a></li>';
          }else{
            $previewsLink = '
            <li class="page-item disabled">
              <a class="page-link" href="#">Previous</a>
            </li>
            ';
          }
    
          $nextId = $pageArray[$count] + 1;
          if($nextId > $totalLinks){
            $nextLink = '
            <li class="page-item disabled">
              <a class="page-link" href="#">Next</a>
            </li>
              ';
          }else{
            $nextLink = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$nextId.'">Next</a></li>';
          }
        }else{
          if($pageArray[$count] == '...'){
            $pageLink .= '
            <li class="page-item disabled">
                <a class="page-link" href="#">...</a>
            </li>
            ';
          }else{
            $pageLink .= '
            <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$pageArray[$count].'">'.$pageArray[$count].'</a></li>
            ';
          }
        }
      }

      $output .= $previewsLink . $pageLink . $nextLink;
      $output .= '
        </>
      </div>
      ';
      
      echo $output;
    }

    /**
     * ------------------------------------------------------------
     * Select user from view
     * ------------------------------------------------------------
     */
    public function getUserPerName($name) {
      $Name = str_replace("-", " ", $name);
      // $data = array();
      $cmd = $this->conn->query(' SELECT use_name, use_avatar 
                                  FROM users
                                  WHERE use_name = "'.$name.'" ');
      $this->data = $cmd->fetch_assoc();
      
      return ([$this->data, array()]);
    }

  }

?>
