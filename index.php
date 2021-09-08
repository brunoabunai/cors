<?php
  // include_once './src/components/connection.php';
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./src/styles/global.css"> -->
    <style>
      <?php include './src/styles/global.css'; ?>
      <?php include './src/styles/classe.css'; ?>
      <?php include './src/styles/boxe.css'; ?>
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
    <?php
      if(isset($_GET['p'])){
        $p = $_GET['p'];
        if ($p == "landing"){
          echo '<title>👋Bem Vindo(a)</title>';
        } else {
          echo '<title>'. ucfirst($p) .'</title>';
        }
      } else {
        echo "<title>👋Bem Vindo(a)</title>";
      }
    ?>
  </head>
  <body>
    <noscript>
      <h1>Java Script desativado - Isso pode efetuar em mal desemprenho do site</h1>
    </noscript>
    <?php
      clearstatcache();
      if(isset($p)){
        $page = "./src/pages/".ucfirst($p)."/".$p.".php";

        if(is_file("$page")){
          include_once ($page);
        } else {
          include_once ('./404.php');
        }
      } else {
        include_once './src/pages/Landing/landing.php';
      }
    ?>

    <!-- <div id="a"></div>

    <script src="node_modules/jquery/dist/jquery.js"></script> -->
    <script src="./src/utils/globall.js" defer></script>
    <script src="./src/utils/boxes.js" defer></script>
    <script src="./src/utils/inputt.js"></script>
    
  </body>

</html>

<!-- <script>
  $(document).ready(function (params) {
    load_data(1);

    function load_data(page, query = '') {
      $.ajax({
        url:"./src/pages/Landing/landing.php",
        method:"POST",
        data:{page:page, query:query},
        success:(data)=>{
          $('#a').html(data);
        }
      });
    }
  })
</script> -->
