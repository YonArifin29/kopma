<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url('Home'); ?>" class="nav-link <?= $activeHome ?? "" ?>">Home</a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="" </li> -->
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa-solid fa-gear"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          Setings
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item text-center" data-toggle="modal" data-target="#modalP">
          <i class="fas fa-user mr-2"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item text-center" data-toggle="modal" data-target="#modalpass">
          <i class="fas fa-lock"></i> Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('Pages/logout') ?>" class="dropdown-item text-center" onclick="return confirm('Yakin?');">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
        <div class="dropdown-divider"></div>
      </div>
    </li>
    <!-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> -->
  </ul>
</nav>
<!-- /.navbar -->