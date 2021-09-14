<?php
@session_start();
// session_start([
//   'cookie_lifetime' => 86400,
//   'read_and_close'  => true,
// ]);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include 'style.css'; ?>
  </style>
</head>

<body>
  <?php
  if (isset($_SESSION['logged']) && $_SESSION['logged']) {
  ?>
    

    <!-- init of page -->

    <div class="home-page">

      <div class="news">
        <a href="#">
          <div class="noticie noticieOne">
            <img src="./public/img/banner_corona.jpg" alt="">

            <div class="headline">
              <span class="head-author">Carlos Calixto</span>
              <h3 class="head-title">
                Ibespa derrete 2% em reação à reforma do IR; Via (VIIA3) afunda 6%
              </h3>
              <span class="head-desc">
                Takimata eos kasd diam dolor dolor magna sanctus...
              </span>
            
              <p class="lastPost">
                Ultima Postagem
              </p>
            </div>

          </div>
        </a>
      
        

      
      </div>


    </div>
  <?php
  } else {
    echo '<script>location.href="./index.php?p=unplugged"</script>';
  }
  ?>
  <script src="./node_modules/jquery/dist/jquery.js"></script>
</body>

</html>

<script defer>
  const logOff = () => {
    $.ajax({
      type: "POST",
      url: './src/components/geralCommands.php',
      data: {
        action: 'callLogOff'
      },
      success: function(html) {
        location.href = './index.php?p=landing';
      },
      error: function(html) {
        location.href = '../../404.php';
      }
    })
  }
</script>