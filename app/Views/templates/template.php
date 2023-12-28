<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>css/adminlte.css">
  <!-- My css -->
  <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
  <!-- Cropper -->
  <link rel="stylesheet" href="<?= base_url() ?>css/cropper.css">
  <!-- animasi -->
  <link rel="stylesheet" type="text/css" href=" ">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div> -->

    <!-- Sidebar -->
    <?= $this->include('templates/sidebar'); ?>
    <!-- Topbar -->
    <?= $this->include('templates/topbar'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title2 ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                jalur
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row delete-flash">
            <div class="col-lg-6">
              <!-- fungsi flaser -->
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- modal profile -->
      <div class="modal fade" id="modalP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="" enctype='multipart/form-data' method="post">
              <div class="modal-body">
                <div class="card">
                  <label for="upload_image" class="d-flex justify-content-center mt-2">
                    <img class="img-thumbnail rounded-circle image" src="<?= base_url() ?>" alt="Card image cap" width="30%" id="img" data-namaImg="">
                    <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                  </label>
                  <div class="card-body">
                    <ul class="list-group text-center">
                      <li class="list-group-item">yonarifin203</li>
                      <li class="list-group-item">Yon Arifin</li>
                      <li class="list-group-item">080973794</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <div type="submit" class="btn btn-primary tEdit" data-id="#">Edit</div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end of modal profile -->

      <!-- modal ubah password -->
      <div class="modal fade" id="modalpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="<?= base_url() ?>/Users/ubahPassword" method="post">
              <div class="modal-body">
                <input type="hidden" class="form-control" name="id" value="">
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password Lama" name="passwordLama">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password Baru" name="passwordBaru">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end modal password -->

      <!-- modal crop img -->
      <div class="modal fade" id="modal-img" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Crop image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                <div class="row">
                  <div class="col-md-8">
                    <!--  default image where we will set the src via jquery-->
                    <img id="image">
                  </div>
                  <div class="col-md-4">
                    <div class="preview"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" id="crop" data-id="dataid">Crop</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal crop img -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
          <?= $this->renderSection('content') ?>
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
      <strong>Copyright &copy; 2023 <a href="<?= base_url(); ?>">Yon Arifin</a></strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url(); ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url(); ?>plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url(); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url(); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url(); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url(); ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url(); ?>js/pages/dashboard.js"></script>
  <script src="<?= base_url(); ?>js/cropper.js"></script>
  <script src="<?= base_url(); ?>js/script1.js"></script>
  <script>
    // script menampilkan foto hal add users
    function displaySelectedImage(event, elementId) {
      const selectedImage = document.getElementById(elementId);
      const fileInput = event.target;

      if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
          selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
      }
    }
    // end script menampilkan foto hal add users
    // sweeta alert
    // tambah, edit, hapus
    const swal = $('.swal').data('swal');
    let strArray = swal.split("-");
    if (strArray[0] == 'berhasil') {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Data berhasil ' + strArray[1],
        showConfirmButton: false,
        timer: 1500
      })
    } else if (strArray[0] == 'gagal') {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Data gagal ' + strArray[1],
        showConfirmButton: false,
        timer: 1500
      })
    }
    // hapus
    $(document).on('click', '.btn-hapus', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');
      Swal.fire({
        title: 'Apakah anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
      })
    });
    // end sweet alert 
  </script>
</body>

</html>