<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User</title>
  </head>
  <body>
    <a class="anc-back" href="../landing">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
      </svg>
    </a>
    <h1>Users from select</h1>

    <div class="users">

      <?php
        for($i = 0; $i < count($this->data); $i++) {
      ?>

          <a href="<?php echo 'editUser/'.str_replace(" ", "-", $this->data[$i]['use_name']); ?>">
            <div>
              <h3><?php echo $this->data[$i]['use_name']; ?></h3>
              <img src="<?php echo $this->data[$i]['use_avatar']; ?>" />
            </div>
          </a>

      <?php
        }
      ?>

    </div>

  </body>
</html>
