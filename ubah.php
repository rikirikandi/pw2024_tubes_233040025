<?php

require 'function.php';

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}


// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: haladmin.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$film = query("SELECT * FROM movie WHERE id_film = $id")[0];

// cek apakah tmbol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if(ubah($_POST) > 0) {
    echo "<script>
              alert('data berhasil diubah!');
              document.location.href = 'haladmin.php';
          </script>";
  } else {
    echo "data gagal diubah";
  }
  // var_dump($_FILES);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Data Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="container col-8">
    <h1>Form Ubah Data Film</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $film['id_film']; ?>">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $film['judul']; ?>" require>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="<?= $film['genre']; ?>">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <img src="img/<?= $film['gambar']; ?>" width="100">
            <input type="file" class="form-control" name="gambar" id="gambar">
            <input type="hidden" class="form-control" name="gambar_lama" value="<?= $film['gambar']; ?>">
        </div>
        <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
    </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>