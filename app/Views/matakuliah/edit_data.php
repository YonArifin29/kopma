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
                            <?php foreach($matakuliah as $row): ?>
                                <input type="hidden" class="form-control" placeholder="" required name="id_matakuliah" value="<?=$row['id_matakuliah']?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                        <div class="input-group mb-3 mt-3">
                                            <input type="text" class="form-control" required placeholder="Kode Matakuliah" name="kode_matakuliah" value="<?=$row['kode_matakuliah']?>">
                                        </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3 mt-3">
                                                <input type="text" class="form-control" required placeholder="Nama Matakuliah" name="nama_matakuliah" value="<?=$row['nama_matakuliah']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" required placeholder="Sks" name="sks" value="<?=$row['sks']?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" required placeholder="Ruangan" name="ruangan" value="<?=$row['ruangan']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary" name="tombol">Ubah</button>
                                                <button type="reset" class="btn btn-danger"><a href="<?=base_url('Mahasiswa')?>" class="text-decoration-none text-white">Kembali</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection();?>
