<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link text-decoration-none">
    <img src="<?= base_url() ?>img/unsub.png" alt="EngWeb Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Kopma</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>img/<?= $userLogin[0]['foto']; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-decoration-none"><?= $userLogin[0]['nama']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <?= $this->include('templates/sidebarMenu') ?>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>