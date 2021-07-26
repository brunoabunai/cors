<?php

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <form action="./src/components/createPost.php" method="post">
    <input type="text" class='pos_register' name="use_idFk" placeholder="Veremos..." />
      <input type="text" class='pos_register' name="pos_title" placeholder="Título do post" />
      <textarea class='pos_register' name="pos_description" cols="30" rows="10"></textarea>
      
      <input type="submit" class="btn-register opacty-button" value="Concluir" />
    </form>

    <!-- <div id="result"></div> -->

    <!-- <script src="./node_modules/jquery/dist/jquery.js"></script> -->
  </body>
</html>

<script defer>
  // const createPost = () => {
  //   const query = document.querySelectorAll(".pos_register");
    

  //   $.ajax({
  //     type: "POST",
  //     url: './src/components/createPost.php',
  //     data: {action:outPut},
  //     success:(html)=> {
  //       $('#result').html(html);
  //     },
  //     error:(html)=> {
  //       console.log('Erro - potato');
  //     }
  //   })
  // }
</script>