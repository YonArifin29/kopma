<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? "" ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>css/adminlte.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?= base_url() ?>css/style2.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">KOPMA</a>
            <button class="navbar-toggler" type="button" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav collapse navbar-collapse justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home/homePage') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mitra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-2 mb-lg-0">
                    <li class="nav-but">
                        <a class="btn btn-dark" href="<?= base_url('pages') ?>"><i class="fa-solid fa-user"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- content -->
    <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
    <?= $this->renderSection('content') ?>
    <!-- end content -->
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>Registrasi">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="Username" name="Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="NomorHP" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="NomorHP" name="NomorHP" required>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="ValPassword" class="form-label">Ulangi Password</label>
                            <input type="password" class="form-control" id="ValPassword" name="ValPassword" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>js/script2.js"></script>
    <script>
        // sweeta alert
        // tambah, edit, hapus
        const swal = $('.swal').data('swal');
        if (swal == 'infoMessage') {
            confirmAlert("Maaf", "Username atau Password salah!", "info");
        } else if (swal == 'infoMessageForgetPass') {
            confirmAlert("Maaf", "Username atau Nomor HP salah!", "info");
        } else if (swal == 'infoMessageForgetPass2') {
            confirmAlert("Maaf", "Username atau kode OTP salah!", "info");
        } else if (swal == 'infoMessageForgetPass3') {
            confirmAlert("Berhasil", "Password telah diubah!", "success");
        } else {
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
        }


        function confirmAlert($title, $text, $icon) {
            Swal.fire({
                title: $title,
                text: $text,
                icon: $icon
            });
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