<?php
require'function.php';

if (isset($_SESSION['login'])) {
  header("Location: haladmin.php");
  exit;
}


if(isset($_POST["login"]) ) {
  $login = login($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/user.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
  </head>
  <body>
    <div class="input">
      <h1>LOGIN</h1>

      <?php if( isset($login['error']) ) : ?>
         <p style="color: red; font-style: italic;">email / password salah</p>
      <?php endif; ?>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="box-input">
          <i class="fas fa-envelope-open-text"></i>
          <input type="text" name="email" placeholder="Email" autofocus autocomplete="off" required/>
        </div>
        <div class="box-input">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required/>
        </div>
        <button type="submit" name="login" class="btn-input">Login</button>
        <div class="bottom">
          <p>
            Belum punya akun?
            <a href="registrasi.php">Register disini</a>
          </p>
        </div>
      </form>
    </div>
  </body>
</html>
