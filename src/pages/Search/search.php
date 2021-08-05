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
    if (isset($_SESSION['logged']) && $_SESSION['logged']) {
      echo '
        <div class="portable-page">
          <a class="anc-back" href="./index.php?p=menu">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
            </svg>
          </a>

          <div class="landing">
            <h2 class="title">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.8971 21.968C12.366 21.9696 11.8565 21.7586 11.4821 21.382L3.64805 13.547C3.23464 13.1348 3.02266 12.5621 3.06805 11.98L3.56805 5.41401C3.63935 4.4264 4.42625 3.64163 5.41405 3.57301L11.9801 3.07301C12.0311 3.06201 12.0831 3.06201 12.1341 3.06201C12.6639 3.06337 13.1718 3.27399 13.5471 3.64801L21.3821 11.482C21.7573 11.8571 21.9681 12.3659 21.9681 12.8965C21.9681 13.4271 21.7573 13.9359 21.3821 14.311L14.3111 21.382C13.9369 21.7583 13.4277 21.9693 12.8971 21.968ZM12.1331 5.06201L5.56205 5.56201L5.06205 12.133L12.8971 19.968L19.9671 12.898L12.1331 5.06201ZM8.65405 10.654C7.69989 10.6542 6.87847 9.98037 6.69213 9.04458C6.5058 8.10879 7.00646 7.17169 7.88792 6.80639C8.76939 6.44109 9.78615 6.74933 10.3164 7.54259C10.8466 8.33586 10.7426 9.39322 10.0681 10.068C9.69388 10.4443 9.18473 10.6553 8.65405 10.654Z" fill="#1D263B"></path>
              </svg>

              Editar Admin
            </h2>

            <span class="subtitle">
              Pesquise o Admin e edite seus dados
            </span>
          </div>

          <div class="main">
            <div class="div-search">
              <div id="WicthUserBox">
                <span>
                  Admin em Edição:&nbsp;<span id="WicthUser">Nenhum!</span>
                </span>
              </div>
              <div onclick="CreateBoxInit(1)" class="search">
                <span class="opacty-button">Pesquisar Admin</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.577 19L12.81 14.234C10.6539 15.6564 7.77106 15.2164 6.13737 13.2156C4.50369 11.2147 4.64914 8.30214 6.47405 6.474C8.30186 4.6484 11.2148 4.50231 13.216 6.13589C15.2173 7.76946 15.6576 10.6526 14.235 12.809L19 17.577L17.577 19ZM10.034 7.014C8.5933 7.01309 7.35253 8.03002 7.07053 9.44291C6.78854 10.8558 7.54386 12.2711 8.87457 12.8234C10.2053 13.3756 11.7408 12.9109 12.542 11.7135C13.3433 10.5161 13.1871 8.91947 12.169 7.9C11.6043 7.33135 10.8355 7.0123 10.034 7.014Z" fill="#8D80AD"></path>
                </svg>
              </div>
            </div>

            <form action="./../portable/portable.html">
              <input class="user" id="user" type="text" placeholder="Usuário" readonly>
              <input class="password" id="password" type="password" placeholder="Senha" readonly>
              <input id="sub" type="submit" class="btn-register opacty-button" value="Concluir Edição">
              <input onclick="resetEdition()" id="res" type="reset" class="btn-reset opacty-button" value="Resetar">
            </form>

            <input id="searchInput" type="text" />

          </div>
        </div>

        <!-- <script>
          // var userSearched = {
          //   name: "Nenhum!",
          //   password: "",
          //   founded: false
          // };

          // function SearchInit(op) {
          //   const admins = [{
          //       name: "Carlos",
          //       password: 123
          //     },
          //     {
          //       name: "Bruno",
          //       password: 445
          //     }
          //   ]

          //   makeSearch(admins);

          //   if (userSearched.founded) {
          //     whenMakedSearch(document.querySelector("#boxInput"), op);
          //   } else {
          //     whenNotMakedSearch(document.querySelector("#boxInput"), op);
          //   }
          // }

          // function whenMakedSearch(input, op) {
          //   input.remove();
          //   changeStateBox(op);
          //   updateUserSpan(userSearched);
          //   updateInput(userSearched);
          // }

          // function updateUserSpan() {
          //   const span = document.querySelector("#WicthUser");
          //   span.innerHTML = `${userSearched.name}...`;
          // }

          // function whenNotMakedSearch(input, op) {
          //   alert("Administrador não encontrado");
          // }

          // function makeSearch(admins) {
          //   const search = localizeID("search").value;

          //   for (let i = 0; i < admins.length; i++) {
          //     if (admins[i].name == search) {
          //       changeUserState(admins[i].name, admins[i].password, true);
          //       break;
          //     }
          //   }
          // }

          // function changeUserState(name, password, founded) {
          //   userSearched.name = name;
          //   userSearched.password = password;
          //   userSearched.founded = founded;
          // }

          // function updateInput() {
          //   const [name, password, inputUser, inputPassword] = getValuesToUpdate(userSearched);
          //   changeValue(inputUser, name);
          //   changeValue(inputPassword, password);
          //   changeBackground(inputUser, "#fff");
          //   changeBackground(inputPassword, "#fff");
          //   removeReadOnly(inputUser);
          //   removeReadOnly(inputPassword);
          // }

          // function getValuesToUpdate(user) {
          //   const {
          //     name,
          //     password,
          //     founded
          //   } = user;
          //   const [inputUser, inputPassword] = [localizeID("user"), localizeID("password")];
          //   return [name, password, inputUser, inputPassword];
          // }

          // function changeBackground(element, background) {
          //   element.style.backgroundColor = background;
          // }

          // function changeValue(element, value) {
          //   element.value = value;
          // }

          // function changeColor(element, color) {
          //   element.style.Color = color;
          // }

          // function removeReadOnly(element) {
          //   element.removeAttribute("readonly");
          // }

          // function addReadOnly(element) {
          //   element.setAttribute("readonly", true);
          // }

          // function resetEdition() {
          //   if (userSearched.founded) {
          //     const [inputUser, inputPassword] = [localizeID("user"), localizeID("password")];

          //     changeBackground(inputUser, "#fbfbfb");
          //     changeBackground(inputPassword, "#fbfbfb");
          //     addReadOnly(inputUser);
          //     addReadOnly(inputPassword);

          //     changeUserState("Nenhum!", "", false);
          //     updateUserSpan();
          //   }
          // }
        </script> -->

        <div class="searchResult">

        </div>
      ';
    } else {
      echo'<script>location.href="./index.php?p=unplugged"</script>';
    }
  ?>

  <script src="./node_modules/jquery/dist/jquery.js"></script>
</body>

</html>

<script>
  // $(document).ready(function(){

  // loadDatas(1);

  function loadDatas(page, query = '') {
    $.ajax({
      type: "POST",
      url: './src/components/search.php',
      data: {
        actualPage: page,
        action: query
      },
      success: function(html) {
        $('div.searchResult').html(html);
      },
      error: function(html) {
        location.href = './404.php';
      }
    })
  }

  $('#searchInput').keyup(function() {
    let query = $('#searchInput').val();
    loadDatas(1, query);
  });

  // $('#searchButton').click(function() {
  //   console.log('hello potato');
  // });

  function selectedSearch(id){
    console.log(`hello potato: ${id}`);
  }
  // });
</script>