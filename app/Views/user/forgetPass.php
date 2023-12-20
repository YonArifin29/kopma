<?php $this->extend('template');?>
<?php $this->section('content');?>
    <div class="container">
        <h1><?=$title?></h1>
        <form class="row g-3" action="<?=base_url('User/forgetPassPost')?>" method="post">
        <div class="col-6">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="col-6">
            <label class="form-label">New Password</label>
            <input type="text" name="text" class="form-control" disabled value="<?=$newPass ?? ""?>">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="tombol-login" value="simpan">Buat</button>
        </div>
    </form>
<?php $this->endSection();?>
