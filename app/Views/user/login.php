<?php $this->extend('template');?>
<?php $this->section('content');?>
    <div class="container">
        <h1>hal login</h1>
        <form class="row g-3" action="<?=base_url('User/loginPost')?>" method="post">
        <div class="col-6">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="col-6">
            <label class="form-label">Password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="tombol-login" value="simpan">Simpan</button>
            <a href="<?=base_url('User')?>/forgetPass">Lupa password</a>
        </div>
    </form>
<?php $this->endSection();?>
