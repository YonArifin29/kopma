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
        $err_level = (session('validation')->hasError('level')) ? session('validation')->getError('level') : "";
        $err_status = (session('validation')->hasError('status')) ? session('validation')->getError('status') : "";
    } else {
        $err_username = "";
        $err_nama = "";
        $err_nama_usaha = "";
        $err_nomor_hp = "";
        $err_email = "";
        $err_alamat = "";
        $err_level = "";
        $err_status = "";
    }
    ?>
    <div class="row">
        <div class="col-sm-8">
            <form action="<?= base_url("users/edit") ?>" method="post">
                <?= csrf_field(); ?>
                <div class="container">
                    <div class="row">
                        <input type="hidden" name="id_pengguna" value="<?= $dataUsers[0]['id_pengguna'] ?>">
                        <div class="col-sm-6">
                            <div class="input-group mb-3 mt-3">
                                <input type="text" class="form-control <?= $err_username ? 'is-invalid' : '' ?>" placeholder="Username" name="username" value="<?= (session('validation') ? old('username') : $dataUsers[0]['username']) ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('username') ? $err_username : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3  mt-3">
                                <input type="text" class="form-control <?= $err_nama ? 'is-invalid' : '' ?>" placeholder="Nama" name="nama" value="<?= (session('validation') ? old('nama') : $dataUsers[0]['nama']) ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('nama') ? $err_nama : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control <?= $err_nama_usaha ? 'is-invalid' : '' ?>" placeholder="Nama Usaha" name="nama_usaha" value="<?= (session('validation') ? old('nama_usaha') : $dataUsers[0]['nama_usaha']) ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('nama_usaha') ? $err_nama_usaha : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control <?= $err_nomor_hp ? 'is-invalid' : '' ?>" placeholder="Nomor HP" name="nomor_hp" value="<?= (session('validation') ? old('nomor_hp') : $dataUsers[0]['nomor_hp']) ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('nomor_hp') ? $err_nomor_hp : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control <?= $err_email ? 'is-invalid' : '' ?>" placeholder="Email" name="email" value="<?= (session('validation') ? old('email') : $dataUsers[0]['email']) ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('email') ? $err_email : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control <?= $err_alamat ? 'is-invalid' : '' ?>" placeholder="Alamat" name="alamat" value="<?= (session('validation') ? old('alamat') : $dataUsers[0]['alamat']) ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('alamat') ? $err_alamat : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 ">
                            <div class="input-group mb-3">
                                <?php
                                if (session('validation')) {
                                    switch (old('level')) {
                                        case 1:
                                            $checkedAdmin = 'selected';
                                            break;
                                        case 2:
                                            $checkedUser = 'selected';
                                    }
                                } else {
                                    switch ($dataUsers[0]['level']) {
                                        case 1:
                                            $checkedAdmin = 'selected';
                                            break;
                                        case 2:
                                            $checkedUser = 'selected';
                                    }
                                }
                                ?>
                                <select class="form-select form-control <?= $err_level ? 'is-invalid' : '' ?>" aria-label="Default select example" name="level">
                                    <option>Level</option>
                                    <option value="1" <?= $checkedAdmin ?? "" ?>>Admin</option>
                                    <option value="2" <?= $checkedUser  ?? "" ?>>Penjual</option>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('level') ? $err_level : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="input-group mb-3">
                                <?php
                                if (session('validation')) {
                                    switch (old('status')) {
                                        case 1:
                                            $active = 'selected';
                                            break;
                                        case 2:
                                            $nonActive = 'selected';
                                    }
                                } else {
                                    switch ($dataUsers[0]['status']) {
                                        case 1:
                                            $active = 'selected';
                                            break;
                                        case 2:
                                            $nonActive = 'selected';
                                    }
                                }

                                ?>
                                <select class="form-control <?= $err_status ? 'is-invalid' : '' ?> form-select" aria-label="Default select example" name="status">
                                    <option>Status</option>
                                    <option value="1" <?= $active ?? "" ?>>Active</option>
                                    <option value="2" <?= $nonActive  ?? "" ?>>Non Active</option>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= (session('validation') ? (session('validation')->hasError('status') ? $err_status : "") : ""); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <?php
                            switch ($dataUsers[0]['gender']) {
                                case 'L':
                                    $checked1 = 'checked';
                                    break;
                                case 'P':
                                    $checked2 = 'checked';
                            }
                            ?>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline1" name="gender" value="L" <?= $checked1 ?? "" ?>>
                                    <label class="custom-control-label" for="defaultInline1">Laki-Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline2" name="gender" value="P" <?= $checked2 ?? "" ?>>
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