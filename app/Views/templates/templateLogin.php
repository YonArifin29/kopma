<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css') ?>/bootstrap.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css') ?>/loginstyle.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Nautigal Font-->
    <link href='https://fonts.googleapis.com/css?family=The Nautigal' rel='stylesheet'>
    <!-- CDN Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar-expand-lg navbar-light navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="dashboard.html">KOPMA</a>
            <button class="navbar-toggler" type="button" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav collapse navbar-collapse justify-content-center">
                    <li class="nav-item">
                        <a href="<?= base_url('home/homePage'); ?>" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mitra">Mitra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-2 mb-lg-0">
                    <li class="nav-but">
                        <a href="login.html" class="btn btn-dark"><i class="fa-solid fa-user"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
    <?= $this->renderSection('content') ?>
    <!-- jQuery -->
    <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>js/script2.js"></script>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var showPasswordBtn = document.querySelector(".show-password-btn");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                showPasswordBtn.classList.remove("fa-eye-slash");
                showPasswordBtn.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                showPasswordBtn.classList.remove("fa-eye");
                showPasswordBtn.classList.add("fa-eye-slash");
            }
        }
    </script>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.minjs" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>