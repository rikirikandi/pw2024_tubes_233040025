<?php

require 'function.php';
if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$movie = query("SELECT * FROM movie");

// ketika tombol cari diklik
if(isset($_POST['cari'])) {
  $movie = cari($_POST['keyword']);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemrograman Web | Daftar Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <a href="logout.php">Logout</a>
    <div class="container">
    <h1>Daftar Film</h1>

    <a href="tambah.php" class="btn btn-primary">Tambah Film</a>
    <br><br>

    <form action="" method="POST">
      <input type="text" name="keyword" size="40" placeholder="masukan keyword pencarian.." autocomplete="off" autofocus>
      <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Genre</th>
      <th scope="col">Gambar</th>
      <th scope="col">Aksi</th>
    </tr>

    <?php if(empty($movie)) : ?>
    <tr>
      <td colspan="4">
        <p style="color: red; font-style: italic;">data film tidak ditemukan!</p></td>
    </tr>
    <?php endif; ?>

  </thead>
  <tbody>
    <?php $i=1 ?>
    <?php foreach($movie as $film) : ?>
    <tr>
      <th><?= $i?></th>
      <td><?= $film['judul']; ?></td>                     
      <td><?= $film['genre']; ?></td>
      <td><img src="img/img/<?= $film["gambar"]?> " alt="" width="60"></td>
      <td>
        <a href="ubah.php?id=<?= $film['id_film']; ?>" class="badge text-bg-warning text-decoration-none">Ubah</a>
        <a href="hapus.php?id=<?= $film['id_film']; ?>" onclick="return confirm('yakin?')" class="badge text-bg-danger text-decoration-none">Hapus</a>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    
  </tbody>
</table>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>