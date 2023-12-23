<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form action="<?= base_url("users/save") ?>" method="post" enctype='multipart/form-data'>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3  mt-3">
                                <input type="text" class="form-control" placeholder="Nama" name="nama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nama Usaha" name="nama_usaha">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nomor HP" name="nomor_hp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Jenis Kelamin" name="gender">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="d-flex justify-content-evenly align-items-center">
                                    <div>
                                        <img id="selectedAvatar" src="<?= base_url("img/user.jpg") ?>" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;" alt="example placeholder" />
                                    </div>
                                    <div class="ml-2">
                                        <div class=" badge bg-secondary btn-rounded">
                                            <label class="form-label text-white m-1" for="customFile2">Choose file</label>
                                            <input type="file" name="foto" class="form-control d-none " id="customFile2" onchange="displaySelectedImage(event, 'selectedAvatar')" style="width: 50px; height: 50px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="tombol">Simpan</button>
                                <button type="reset" class="btn btn-danger"><a href="<?= base_url('Users') ?>" class="text-decoration-none text-white">Kembali</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>