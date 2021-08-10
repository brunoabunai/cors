<?php
  @session_start();
  if($_POST['action'] == 'callLogOff'){
    unset($_SESSION['logged']);
    unset($_SESSION['logid']);
  } 
  
  if($_POST['action'] == 'logedOrNoLoged'){
    if (isset($_SESSION['logged']) && $_SESSION['logged']) {
      echo "<script>location.href='./index.php?p=menu';</script>";
      exit;
    } else {
      echo "<script>location.href='./index.php?p=login';</script>";
      exit;
    }
  }

  if($_POST['action'] == 'selectedSearch'){ //editSearch
    $_SESSION['selectedSearch'] = $_POST['value'];
  }
?>
