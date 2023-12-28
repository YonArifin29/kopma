<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>

<div class="container">
    <?php if (session('validation')) {
        $err_kode_produk = (session('validation')->hasError('kode_produk')) ? session('validation')->getError('kode_produk') : "";
        $err_nama_produk = (session('validation')->hasError('nama_produk')) ? session('validation')->getError('nama_produk') : "";
        $err_harga_jual = (session('validation')->hasError('harga_jual')) ? session('validation')->getError('harga_jual') : "";
        $err_kategori = (session('validation')->hasError('kategori')) ? session('validation')->getError('kategori') : "";
        $err_kategori = (session('validation')->hasError('foto')) ? session('validation')->getError('foto') : "";
    } else {
        $err_kode_produk = "";
        $err_nama_produk = "";
        $err_harga_jual = "";
        $err_nomor_hp = "";
        $err_kategori = "";
        $err_foto = "";
    }
    ?>
    <div class="row">
        <div class="col-sm-8">
            <form action="<?= base_url("product/save") ?>" method="post" enctype='multipart/form-data'>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3 mt-3">
                                <input type="text" class="form-control <?= $err_kode_produk ? 'is-invalid' : '' ?>" placeholder="Kode Produk" name="kode_produk" value="<?= old('kode_produk') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('kode_produk') ? $err_kode_produk : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6">
                            <div class="input-group mb-3  mt-3">
                                <input type="text" class="form-control <?= $err_nama_produk ? 'is-invalid' : '' ?>" placeholder="Nama Produk" name="nama_produk" value="<?= old('nama_produk') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('nama_produk') ? $err_nama_produk : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control <?= $err_harga_jual ? 'is-invalid' : '' ?>" placeholder="Harga Jual" name="harga_jual" value="<?= old('harga_jual') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('harga_jual') ? $err_harga_jual : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <?php
                                if (session('validation')) {
                                    switch (old('kategori')) {
                                        case 1:
                                            $makanan = 'selected';
                                            break;
                                        case 2:
                                            $minuman = 'selected';
                                    }
                                } else {
                                    // switch ($dataProducts[0]['kategori']) {
                                    //     case 1:
                                    //         $makanan = 'selected';
                                    //         break;
                                    //     case 2:
                                    //         $minuman = 'selected';
                                    // }
                                }

                                ?>
                                <select class="form-control" aria-label="Default select example" name="kategori">
                                    <option selected>Kategori</option>
                                    <option value="makanan" <?= $makanan ?? "" ?>>Makanan</option>
                                    <option value="minuman" <?= $minuman  ?? "" ?>>Minuman</option>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('kategori') ? $err_kategori : "") : ""); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="d-flex justify-content-evenly align-items-center">
                                    <div>
                                        <img id="selectedAvatar" src="<?= base_url("img/img.png") ?>" class="" style="width: 50px; height: 50px; object-fit: cover;" alt="example placeholder" />
                                    </div>
                                    <div class="ml-2">
                                        <div class=" badge bg-secondary btn-rounded">
                                            <label class="form-label text-white m-1" for="customFile2">Choose file</label>
                                            <input type="file" name="gambar" class="form-control d-none is-invalid" id="customFile2" onchange="displaySelectedImage(event, 'selectedAvatar')" style="width: 50px; height: 50px;" />
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= (session('validation') ? (session('validation')->hasError('foto') ? $err_foto : "") : ""); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="tombol">Simpan</button>
                                <button type="reset" class="btn btn-danger"><a href="<?= base_url('product') ?>" class="text-decoration-none text-white">Kembali</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>