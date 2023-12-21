<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form action="" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Nim" name="nim">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3  mt-3">
                                <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nomor HP" name="no_hp" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="tombol">Simpan</button>
                                <button type="reset" class="btn btn-danger"><a href="<?= base_url('Mahasiswa') ?>" class="text-decoration-none text-white">Kembali</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>