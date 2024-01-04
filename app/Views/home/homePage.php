<?php $this->extend('templates/template2'); ?>
<?php $this->section('content'); ?>
<!-- Beranda -->
<div class="wrapper" id="beranda">
  <header>
    <div class="image">
      <img class="background" src="<?= base_url('img') ?>/bgberanda.jpg">
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
    <?php foreach ($dataProductBestSeller as $data) : ?>
      <div class="col">
        <div class="card">
          <img src="<?= base_url('img') ?>/<?= $data['gambar'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $data['nama_produk'] ?></h5>
          </div>
          <div class="mb-5 d-flex justify-content-around">
            <h4><?= rupiah($data['harga']) ?></h4>
            <a href="#" class="btn btn-dark">Beli Sekarang</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
<!--Menu-->
<section class="menu">
  <h1 class="kategori-menu text-center" id="menu">Menu</h1>
  <div class="container py-1">
    <div class="row row-cols-1 row-cols-md-4 g-4 py-3">
      <?php foreach ($dataSomeProduct as $data) : ?>
        <div class="col">
          <div class="card">
            <img src="<?= base_url('img') ?>/<?= $data['gambar'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $data['nama_produk'] ?></h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <h4><?= rupiah($data['harga_jual']) ?></h4>
              <a href="#" class="btn btn-dark">Beli Sekarang</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="text-center">
    <a href="<?= base_url('Home/menuPage') ?>" class="btn btn-outline-dark">View more</a>
  </div>
</section>
<!-- Mitra -->
<section class="mitra">
  <div class="row py-4">
    <div class="class col-md-5">
      <img src="<?= base_url('img') ?>/mitra.jpg" alt="">
    </div>
    <div class="col-md-7 py-5">
      <h1 class="h1-mitra" id="mitra">KOPERASI MAHASISWA</h1>
      <br>
      <p class="display-6 p-mitra">KOPMA merupakan Koperasi Mahasiswa yang
        salah satu fasilitas kampus Universitas Subang,
        tempat dimana mahasiswa dapat menikmati makanan atau minuman,
        bersosialisasi, dan belajar dalam suasana informal.
      </p>
      <div class="py-3">
        <button type="button" class="btn btn-secondary button-join-us rounded-pill">Join Us</button>
      </div>
      <div class="py-5">
        <div class="garis-vertikal"></div>
      </div>
      <div class="py-1">
        <p class="display-6 p-mitra">Punya pertanyaan? <br>
          Hubungi kontak di bawah!</p>
        <p class="display-6 nomer-hp"><strong>+62 896 6801 7778</strong></p>
      </div>
    </div>
  </div>
</section>
<!-- About Us -->
<section class="about-us" id="about">
  <div class="background">
    <h1 class="h1-about">OUR BUSINESS OUR HERITAGE</h1>
  </div>
  <div class="text-about">
    <h1 class="about-header">About Us</h1>
    <p class="display-6 p-mitra">Kopma memainkan peran penting dalam kehidupan sehari-hari mahasiswa, yang dapat menawarkan berbagai
      pilihan makanan untuk memenuhi selera dan kebutuhan yang berbeda serta berfungsi sebagai titik pertemuan
      di mana mahasiswa dapat bertukar ide, bersosialisasi, dan memperdalam hubungan yang ada.
      <br><br>
      Kopma juga menyediakan pilihan tempat makan yang nyaman, sehingga memudahkan mahasiswa untuk mengakses makananselama jadwal sibuk mereka dan bisasnya
      menawarkan harga yang lebih ramah bagi mahasiswa dengan pilihan pembayaran yang mudah, seperti uang tunai.
    </p>
  </div>
</section>
<!-- Footer -->
<footer class="text-light pt-5 pb-4" style="background-color: #1F0F0F;">
  <div class="container text-md-left">
    <div class="row text-md-left">
      <div class="col-lg-3">
        <h3 class="text-uppercase mb-4 font-weight-bold text-light text-center">Kopma Unsub</h3>
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-4">
            <img src="<?= base_url('img') ?>/unsub.png" class="image-footer">
          </div>
          <div class="col-lg-4">
            <img src="<?= base_url('img') ?>/fasilkom.png" class="image-footer">
          </div>
        </div>
      </div>
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 py-4 text-center">
        <h5 class="mb-4 font-weight-bold text-light">Location</h5>
        <p>
          <a class="text-light" style="text-decoration: none;">Universitas Subang</a><br>
          <a class="text-light" style="text-decoration: none;">Jl. R.A. Kartini Km. 3</a>
        </p>
      </div>
      <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3 py-4 text-center">
        <h5 class="mb-4 font-weight-bold text-light">Contact us</h5>
        <p>
          <a href="mailto:KopmaUnsub@gmail.com" class="text-light" style="text-decoration: none;"><i class="bi bi-envelope-fill"> KopmaUnsub@gmail.com</i></a><br>
          <a href="https://wa.link/vav2qc" class="text-light" style="text-decoration: none;"><i class="bi bi-whatsapp"> +62 896 6801 7778</i></a>
        </p>
      </div>
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 py-4 text-center">
        <h5 class="mb-4 font-weight-bold text-light">Created by</h5>
        <p>
          <a class="text-light" style="text-decoration: none;">Kelompok 4 (3RA)</a>
        </p>
      </div>
    </div>
    <div class="py-2">
      <div class="garis-footer"></div>
    </div>
    <div class="text-center">
      <p>Copyright &copy; 2023. All Right Reserved</p>
    </div>
  </div>
  </div>
</footer>
<?php $this->endSection('content'); ?>