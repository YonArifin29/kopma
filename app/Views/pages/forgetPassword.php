<?php $this->extend('templates/templateLogin'); ?>
<?php $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="login-container">
        <h2 class="text-center">LUPA PASSWORD</h2>
        <br>
        <form action="<?= base_url('Pages/forgetPassPost') ?>" method="post">
          <?= csrf_field(); ?>
          <div class="mb-3">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
          </div>
          <div class="mb-3 recovery_nohp">
            <input type="text" class="form-control" id="no_hp" placeholder="No. Handphone" name="noHp" required>
          </div>
          <div class="button-submit mb-3">
            <button type="submit">SUBMIT</button>
          </div>
          <div class="backbutton">
            <a class="text-dark text-decoration-underline" href="<?= base_url('pages') ?>">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection('content'); ?>