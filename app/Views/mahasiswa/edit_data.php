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
                            <?php foreach($mahasiswa as $row): ?>
                                <input type="hidden" class="form-control" placeholder="Nim" name="id" value="<?=$row['id']?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3 mt-3">
                                                <input type="text" class="form-control" placeholder="Nim" name="nim" value="<?=$row['nim']?>" required>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3 mt-3">
                                                <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?=$row['nama']?>" required>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?=$row['alamat']?>" required>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nomor HP" name="no_hp" value="<?=$row['no_hp']?>" required>
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
