<?php $this->extend('templates/template2'); ?>
<?php $this->section('content'); ?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class=" login-box">
    <!-- /.login-logo -->
    <div class="card bg-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1">LOGIN</a>
      </div>
      <div class="card-body">
        <form action="<?= base_url() ?>Pages/loginPost" method="post">
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
            <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
            <div class="input-group-append">
              <span class="input-group-text" onclick="password_show_hide();">
                <i class="fas fa-eye" id="show_eye"></i>
                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
              </span>
            </div>
          </div>
          <div class="row d-flex">
            <!-- <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div> -->
            <p class="mb-1 ">
              <a href="<?= base_url('Pages/forgetPass') ?>" class="text-white">Forget Pasword?</a>
            </p>
          </div>
          <div class="d-flex justify-content-center">
            <div class="col-4 d-block">
              <button type="submit" class="btn btn-primary btn-block" name="tombol-login">Sign In</button>
            </div>
          </div>
        </form>

        <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
        <!-- /.social-auth-links -->
        <!-- <p class="mb-0">
        <a href="register.html" class="text-center" data-toggle="modal" data-target="#exampleModal">Register</a>
      </p> -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<?php $this->endSection('content'); ?>