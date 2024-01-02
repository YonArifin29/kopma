<?php $this->extend('templates/templateLogin'); ?>
<?php $this->section('content'); ?>
<!-- Login Form -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="login-container">
        <h2 class="text-center">LOGIN</h2>
        <br>
        <form action="<?= base_url() ?>Pages/loginPost" method="post">
          <?= csrf_field(); ?>
          <div class="mb-3">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
          </div>
          <div class="mb-3 password-container">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            <i class="fa fa-eye-slash show-password-btn" aria-hidden="true" onclick="togglePassword()"></i>
          </div>
          <div class="button-submit mb-3">
            <button type="submit">LOGIN</button>
          </div>
          <div class="text-center">
            <a class="text-dark text-decoration-underline" href="<?= base_url('Pages/forgetPass') ?>">Lupa Password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection('content'); ?>