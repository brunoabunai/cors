<?php
  @session_start();
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
    if (isset($_SESSION['logged']) && !$_SESSION['logged']) {
      echo '
        <div class="unpg-content">
          <div class="firstTitles">
            <h1 class="ops">Ops...</h1>
            <h1>&nbsp;Você não está logado!</h1>

          </div>
          <span class="subtitle"> Por favor volte ao início e na página de login verifique sua conta.</span>

          <a href="./index.php?p=landing" class="btn-loginBack opacty-button">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7.83 11L11.41 7.41L10 6L4 12L10 18L11.41 16.59L7.83 13H20V11H7.83Z" fill="var(--text-color)"></path>
            </svg>
            Voltar Para o Início</a>
        </div>
      ';
    } else {
      echo'<script>location.href="./index.php?p=menu"</script>';
    }
  ?>

</body>

</html>
