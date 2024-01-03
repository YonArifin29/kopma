<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>

<div class="container">
    <?php if (session('validation')) {
        $err_username = (session('validation')->hasError('username')) ? session('validation')->getError('username') : "";
        $err_nama = (session('validation')->hasError('nama')) ? session('validation')->getError('nama') : "";
        $err_nama_usaha = (session('validation')->hasError('nama_usaha')) ? session('validation')->getError('nama_usaha') : "";
        $err_nomor_hp = (session('validation')->hasError('nomor_hp')) ? session('validation')->getError('nomor_hp') : "";
        $err_email = (session('validation')->hasError('email')) ? session('validation')->getError('email') : "";
        $err_alamat = (session('validation')->hasError('alamat')) ? session('validation')->getError('alamat') : "";
    } else {
        $err_username = "";
        $err_nama = "";
        $err_nama_usaha = "";
        $err_nomor_hp = "";
        $err_email = "";
        $err_alamat = "";
    }
    ?>
    <div class="row">
        <div class="col-sm-8">
            <form action="<?= base_url("users/save") ?>" method="post" enctype='multipart/form-data'>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3 mt-3">
                                <input type="text" class="form-control <?= $err_username ? 'is-invalid' : '' ?>" placeholder="Username" name="username" value="<?= old('username') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('username') ? $err_username : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6">
                            <div class="input-group mb-3  mt-3">
                                <input type="text" class="form-control <?= $err_nama ? 'is-invalid' : '' ?>" placeholder="Nama" name="nama" value="<?= old('nama') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('nama') ? $err_nama : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control <?= $err_nama_usaha ? 'is-invalid' : '' ?>" placeholder="Nama Usaha" name="nama_usaha" value="<?= old('nama_usaha') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('nama_usaha') ? $err_nama_usaha : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control <?= $err_nomor_hp ? 'is-invalid' : '' ?>" placeholder="Nomor HP" name="nomor_hp" value="<?= old('nomor_hp') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('nomor_hp') ? $err_nomor_hp : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control <?= $err_email ? 'is-invalid' : '' ?>" placeholder="Email" name="email" value=" <?= old('email') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('email') ? $err_email : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control <?= $err_alamat ? 'is-invalid' : '' ?>" placeholder="Alamat" name="alamat" value="<?= old('alamat') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('alamat') ? $err_alamat : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="id-invalid">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline1" name="gender" value="L" checked>
                                    <label class="custom-control-label" for="defaultInline1">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline2" name="gender" value="P">
                                    <label class="custom-control-label" for="defaultInline2">Perempuan</label>
                                </div>
                            </div>
                        </div>
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