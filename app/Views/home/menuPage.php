<?php $this->extend('templates/template2'); ?>
<?php $this->section('content'); ?>
<!-- Beranda -->

<section class="menu">
    <h1 class="kategori-menu text-center" id="menu">Menu</h1>
    <div class="container py-1">
        <div class="row row-cols-1 row-cols-md-4 g-4 py-3">
            <?php foreach ($dataProducts as $product) : ?>
                <div class="col">
                    <div class="card">
                        <img src="<?= base_url('img') ?>/<?= $product['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['nama_produk'] ?></h5>
                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h4><?= rupiah($product['harga_jual']) ?></h4>
                            <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalPenjualan" data-id="<?= $product['id_produk']; ?>">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Footer -->
<footer class=" text-light pt-5 pb-4" style="background-color: #1F0F0F;">
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
</footer>

<?php $this->endSection('content'); ?>