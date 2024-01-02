<?php $this->extend('templates/templateLogin'); ?>
<?php $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="login-container">
        <h2 class="text-center">LUPA PASSWORD</h2>
        <br>
        <form action="<?= base_url('Pages/updatePassword') ?>" method="post">
          <?= csrf_field(); ?>
          <div class="mb-3">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
          </div>
          <div class="mb-3 kodeotp-containter">
            <input type="text" class="form-control" id="kodeotp" placeholder="Kode OTP" name="otp">
          </div>
          <div class="mb-3 password-container">
            <input type="password" name="newPassword" class="form-control" id="password" placeholder="Password Baru">
            <i class="fa fa-eye-slash show-password-btn" aria-hidden="true" onclick="togglePassword()"></i>
          </div>

          <div class="button-submit mb-3">
            <button type="submit">SUBMIT</button>
          </div>
          <div class="btnback">
            <a class="text-dark text-decoration-underline" href="<?= base_url('pages') ?>">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection('content'); ?>