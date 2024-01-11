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
            <a href="#" class="btn btn-dark t_pembelian" data-bs-toggle="modal" data-bs-target="#modalPenjualan" data-id="<?= $data['id_produk']; ?>">Beli Ayena</a>
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
              <a href="#" class="btn btn-dark t_pembelian" data-bs-toggle="modal" data-bs-target="#modalPenjualan" data-id="<?= $data['id_produk']; ?>">Beli Sekarang</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class=" text-center">
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
<!-- modal pj -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalPenjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Keranjang</h1>
      </div>
      <form action="<?= base_url('Home/buyProduct'); ?>" method="post">
        <div class="modal-body" id="modal-pembelian">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <label for="nama" class="form-label">
                  <h6>Nama Pembeli*</h6>
                </label>
                <input class="form-control" type="text" placeholder="Nama...." aria-label="default input example" id="nama" required name="nama_pembeli" />
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-8 col-sm-8">
                <label for="ruangan" class="form-label">
                  <h6>Prodi</h6>
                </label>
                <input class="form-control" type="text" placeholder="prodi.." id="ruangan" aria-label=".form-control-sm example" required name="prodi">
              </div>
              <div class="col-4 col-sm-4">
                <label for="tipe" class="form-label">
                  <h6>Tipe Pemesanan*</h6>
                </label>
                <select class="form-select" id="tipe" aria-label="Default select example" name="pemesanan">
                  <option value="1">Ambil</option>
                  <option value="2">Diantar</option>
                </select>
              </div>
            </div>
            <br>
            <div class="col-md-12 ">
              <label for="nama" class="form-label">
                <h6>Ruangan</h6>
              </label>
              <input class="form-control" type="text" placeholder="ruangan...." aria-label="default input example" id="nama" name="ruangan" required />
            </div>
            <br>
            <div class="row produk_beli">
              <div class="col-md-12">
                <h6>Produk*</h6>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3 col-sm-3">
                        <img class="mt-3 rounded overflow-hidden" src="<?= base_url('img') ?>/card4.png" alt="">
                      </div>
                      <div class="col-9 col-sm-9">
                        <button data-bs-dismiss="?" class="close">&times;</button> <br>
                        <h5 class="card-title">$EsTeh</h5>
                        <p class="card-text">$Manis</p>

                        <div class="row">
                          <div class="col-10 col-sm-7">
                            <p><strong>$Rp 11.000</strong></p>
                          </div>
                          <div class="col-2 col-sm-5">
                            <div class="container">
                              <button class="minus button">-</button>
                              <span class="num">01</span>
                              <button class="plus button">+</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="col-md-12">
                  <label for="exampleFormControlTextarea1" class="form-label">
                    <h6>Deskripsi (Opsional)</h6>
                  </label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="pesan.."></textarea>
                </div>
                <br>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-6 col-sm-6">
                  <button type="submit" class="kirim">Kirim</></button>
                </div>
                <div class="col-6 col-sm-6">
                  <button type="reset" class="batal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal pj -->
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