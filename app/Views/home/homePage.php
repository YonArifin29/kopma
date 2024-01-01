<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KOPMA</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>css/adminlte.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>css/style2.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Nautigal Font-->
  <link href='https://fonts.googleapis.com/css?family=The Nautigal' rel='stylesheet'>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>css/style2.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">KOPMA</a>
      <button class="navbar-toggler" type="button" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav collapse navbar-collapse justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mitra</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-2 mb-lg-0">
          <li class="nav-but">
            <a class="btn btn-dark" href="<?= base_url('pages') ?>"><i class="fa-solid fa-user"></i> Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Beranda -->
  <div class="wrapper">
    <div class="image">
      <img class="background" src="<?= base_url() ?>img/bgberanda.jpg">
      <div class="content">
        <h1>Welcome To</h1>
        <p>KOPMA</p>
      </div>
    </div>
  </div>
  </header>
  <!--Best Seller-->
  <div class="container py-3">
    <h1 class="text-center">Best Seller</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4 py-3">
      <div class="col">
        <div class="card">
          <img src="<?= base_url() ?>img/card1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Ayam Krispy</h5>
          </div>
          <div class="mb-5 d-flex justify-content-around">
            <h4>Rp. 11.000</h4>
            <button class="btn btn-dark">Beli Sekarang</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="<?= base_url() ?>img/card2.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nasi Goreng</h5>
          </div>
          <div class="mb-5 d-flex justify-content-around">
            <h4>Rp. 11.000</h4>
            <button class="btn btn-dark">Beli Sekarang</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="<?= base_url() ?>img/card3.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Ayam Krispy</h5>
          </div>
          <div class="mb-5 d-flex justify-content-around">
            <h4>Rp. 11.000</h4>
            <button class="btn btn-dark">Beli Sekarang</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="<?= base_url() ?>img/card4.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Ayam Krispy</h5>
          </div>
          <div class="mb-5 d-flex justify-content-around">
            <h4>Rp. 11.000</h4>
            <button class="btn btn-dark">Beli Sekarang</button>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--Menu-->
  <section class="menu">
    <h1 class="kategori-menu text-center">Menu</h1>
    <button class="pre-btn"><i class="fa-solid fa-arrow-left"></i></button>
    <button class="nex-btn"><i class="fa-solid fa-arrow-right"></i></button>
    <div class="container py-1">
      <div class="row row-cols-1 row-cols-md-4 g-4 py-3">

        <div class="col">
          <div class="card">
            <img src="<?= base_url() ?>img/card1.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Ayam Krispy</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <h4>Rp. 11.000</h4>
              <button class="btn btn-dark">Beli Sekarang</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="<?= base_url() ?>img/card2.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Nasi Goreng</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <h4>Rp. 11.000</h4>
              <button class="btn btn-dark">Beli Sekarang</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="<?= base_url() ?>img/card3.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Ayam Krispy</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <h4>Rp. 11.000</h4>
              <button class="btn btn-dark">Beli Sekarang</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="<?= base_url() ?>img/card4.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Ayam Krispy</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <h4>Rp. 11.000</h4>
              <button class="btn btn-dark">Beli Sekarang</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.minjs" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>