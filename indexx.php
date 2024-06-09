<?php
require 'function.php';

$movie = query("SELECT * FROM movie limit 0,5");
$series = query("SELECT * FROM movie limit 5,10");
if(isset($_POST['cari'])) {
  $movie = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Web Film</title>

    <!--CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  -->

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- ...... -->

    <!-- Link CDJNS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- .... -->
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a class="navbar-brand me-auto" href="#">MyFavFilm</a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link mx-lg-2 active" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#movie">Movie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#series">Series</a>
              </li>
            </ul>
          </div>
        </div>
        <nav class="navbar bg-body-tertiary">
          <div class="container-fluid">
            <form class="d-flex" role="search" action="" method="POST">
              <input class="form-control me-1" type="search" name="keyword" placeholder="cari disini..." autocomplete="off" aria-label="Search">
              <button class="btn btn-outline-success" type="submit" name="cari">Cari</button>
            </form>
          </div>
        </nav>
        <a href="" class="login-button">Login</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Hal2 -->
    <section class="hal2" id="Home">
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/home/home1.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/home/h2.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/home/home3.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- End hal2 -->

    <section class="hal3" id="movie">
      <div class="container">
        <h1 class="m-3">Movie</h1>
        <!-- <h4 class="m-3">HOLLYWOOD</h4> -->
        <div class="card-group">
          <?php foreach($movie as $mv):?>
          <div class="card me-3">
            <img src="img/img/<?= $mv['gambar'];?>" class="card-img-top" alt="..." />
            <div class="heading1">
              <h4><?= $mv['judul'];?></h4>
              <p><span>&#9733;&#9733;&#9733;&#9733;&#9733;</span></p>
              <h6><?= $mv['genre'];?></h6>
            </div>  
          </div>      
        <?php endforeach?>
        </div>
      </div>
    </section>

    <!-- 3 -->
    <div class="container mt-5">
      <div class="card-group">
        <div class="card">
          <img src="img/hollywood/v1.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h3>Kingdom</h3>
            <div class="imdb">
              <p>9.5</p>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/hollywood/v2.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h3>Mission Imposible</h3>
            <div class="imdb">
              <p>9.5</p>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/hollywood/v3.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h3>Godzila</h3>
            <div class="imdb">
              <p>9.5</p>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/hollywood/v4.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h3>Top Gun</h3>
            <div class="imdb">
              <p>9.5</p>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/hollywood/v5.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h3>No time</h3>
            <div class="imdb">
              <p>9.5</p>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/hollywood/v6.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h3>Fast X</h3>
            <div class="imdb">
              <p>9.5</p>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/hollywood/p1.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h3>Fast X</h3>
            <div class="imdb">
              <p>9.5</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- .... -->



    <!-- Series -->
    <section class="hal3" id="series">
      <div class="container">
        <h1 class="m-4">Series</h1>
        <!-- <h4>HOLLYWOOD</h4> -->
        <div class="card-group">
        <?php foreach($series as $ss):?>
          <div class="card me-3">
            <img src="img/img/<?= $ss['gambar'];?>" class="card-img-top" alt="..." />
            <div class="heading1">
              <h4><?= $ss['judul'];?></h4>
              <p><span>&#9733;&#9733;&#9733;&#9733;&#9734;</span></p>
              <h6><?= $ss['genre'];?></h6>
            </div>
          </div> 
          <?php endforeach?> 
        </div>
      </div>
    </section>
    <!--  -->

    <!--  -->
    <!-- Tollywood -->
    <section class="hal4">
      <div class="container mt-5">
        <!-- <h4>Tollywood</h4> -->
        <div class="row row-cols-1 row-cols-md-6">
          <div class="col">
            <div class="card">
              <img src="img/series/s11.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Swat</h5>
                <div class="imdbb">
                  <p>9.5</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/series/s12.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Loncat Kelas</h5>
                <div class="imdbb">
                  <p>9.5</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/series/s13.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Drive Thru History</h5>
                <div class="imdbb">
                  <p>9.5</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/series/s14.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">DJS</h5>
                <div class="imdbb">
                  <p>9.5</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/series/s15.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Night Has Come</h5>
                <div class="imdbb">
                  <p>9.5</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/series/s16.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Love Is A History</h5>
                <div class="imdbb">
                  <p>9.5</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
