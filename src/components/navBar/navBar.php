<?php
  $value = trim(' Batata          Numero De          Serie 3 ');
  // while(strpos($value, "  ") != 0){
  //   $value = str_replace("  ", " ", $value);
  // }
  function removeDoubleSpace($something){
    while(strpos($something, "  ") != 0){
      return str_replace("  ", " ", $something);
    }
  }

  $value = removeDoubleSpace($value);
  echo ($value);
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header>Coronguinha</header>
  </body>
</html>