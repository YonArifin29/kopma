<?php $this->extend('templates/template2'); ?>
<?php $this->section('content'); ?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">Kopma</a>
    </div>
    <div class="card-body">
      <h5 class="login-box-msg">Lupa Password</h5>
      <form action="<?= base_url('Pages/updatePassword') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="OTP" name="otp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-key"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="newPassword" type="password" value="" class="input form-control" id="password" placeholder="New Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
          <div class="input-group-append">
            <span class="input-group-text" onclick="password_show_hide();">
              <i class="fas fa-eye" id="show_eye"></i>
              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
            </span>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <div class="col-4 d-block">
            <button type="submit" class="btn btn-primary btn-block" name="tombol-login">Kirim</button>
          </div>
        </div>
      </form>
      <p class="mb-1">
        <a href="<?= base_url('pages') ?>">Kembali</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<?php $this->endSection('content'); ?>