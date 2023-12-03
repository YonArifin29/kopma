<?php $this->extend('template');?>
<?php $this->section('content');?>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <b><?=$title?></b>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3 mt-3">
                                        <input type="text" class="form-control" placeholder="Kode Matakuliah" name="kode_matakuliah" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3 mt-3">
                                        <input type="text" class="form-control" placeholder="Nama Matakuliah" name="nama_matakuliah" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Sks" name="sks" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Ruangan" name="ruangan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary" name="tombol">Simpan</button>
                                        <button type="reset" class="btn btn-danger"><a href="<?=base_url('Mahasiswa')?>" class="text-decoration-none text-white">Kembali</a></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection();?>
