<?php
require 'function.php';
// if ( isset($_POST["registrasi"]) ) {

//   if( registrasi($_POST) > 0 ) {
//     echo "<script>
//             alert('user baru berhasil ditambahkan!');
//           </script>";
//   } else {
//     echo mysqli_error($conn);
//   }
// }

// if ( isset($_POST['registrasi']) ) {
//    if(registrasi($_POST) > 0) {
//     echo "<script>
//             alert('user baru berhasil ditambahkan. silahkan login!');
//             document.location.href = 'login.php';
//           </script>";
//    } else {
//       echo 'user gagal ditambahkan!';
//    }
  
// }
// require 'function.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (registrasi($_POST)) {
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/user.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
  </head>
  <body>
    <div class="input">
      <h1>REGISTER</h1>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="box-input">
          <i class="fas fa-user"></i>
          <input type="text" name="fullname" placeholder="Full Name" autofocus autocomplete="off" required/>
        </div>
        <div class="box-input">
          <i class="fas fa-address-book"></i>
          <input type="text" name="username" placeholder="User Name" autocomplete="off" required/>
        </div>
        <div class="box-input">
          <i class="fas fa-envelope-open-text"></i>
          <input type="text" name="email" placeholder="Email" autocomplete="off" required/>
        </div>
        <div class="box-input">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required/>
        </div>
        <button type="submit" name="registrasi" class="btn-input">Register</button>
        <div class="bottom">
          <p>
            Sudah punya akun?
            <a href="login.php">Login disini</a>
          </p>
        </div>
      </form>
    </div>
  </body>
</html>
