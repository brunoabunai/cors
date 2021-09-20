<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Select User</title>

    <style>
      .col {
        margin: 1rem;
      }

      .page-link  {
        height: 100%;
      }

    </style>
    
  </head>
  <body>
    <a class="anc-back" href="../menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
      </svg>
    </a>
    <h1>Users from select</h1>
    <input type="text" name="searchUser" id="searchInput">

    <div class="users">

    <?php
      // for($i = 0; $i < count($this->data[0]); $i++) {
    ?>

        <!-- <a href="<?php echo 'editUser/'.str_replace(" ", "-", $this->data[0][$i]['use_name']); ?>">
          <div>
            <h3><?php //echo $this->data[0][$i]['use_name']; ?></h3>
            <img src="<?php //echo $this->data[0][$i]['use_avatar']; ?>" />
          </div>
        </a> -->

    <?php
      // }
    ?>

    </div>

    <script defer src="../../node_modules/jquery/dist/jquery.js"></script>
  </body>
</html>

<script defer type="module">
  function loadDatas(page, query = '') {    
    $.ajax({
      type: "POST",
      url: './search', //config url execute
      data: {
        actualPage: page,
        action: query
      },
      // dataType: "json",
      // beforeSend: function() {

      // },
      success: function(html) {
        $('.users').html(html);
        console.log('success');
        console.log(html);
      },
      error: function(html) {
        console.log('error');
        console.log(html);
      }
    });
  
  }

  $('#searchInput').keyup(function() {
    let query = $('#searchInput').val();
    loadDatas(1, query);
  });
</script>
