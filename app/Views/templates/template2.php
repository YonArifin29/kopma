<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? "" ?></title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?= base_url() ?>css/style3.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/style5.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.css">
    <link rel='shortcut icon' href='<?= base_url('img') ?>/unsub.png'>
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
                        <a class="nav-link" href="<?= base_url('Home/menuPage') ?>">Menu</a>
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
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
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
    <script src="<?= base_url() ?>js/script5.js"></script>
    <script>
        const plus = document.querySelector(".plus")
        num = document.querySelector(".num")
        minus = document.querySelector(".minus")

        let a = 1;

        plus.addEventListener("click", () => {
            event.preventDefault();
            a++;
            a = (a < 10) ? "0" + a : a;
            num.innerText = a;
        });

        minus.addEventListener("click", () => {
            event.preventDefault();
            if (a > 1) {
                a--;
                a = (a < 10) ? "0" + a : a;
                num.innerText = a;
            }
        });
    </script>
    <script>
        const tambah = document.querySelector(".plus-fjs")
        jumlah = document.querySelector(".num-fjs")
        kurang = document.querySelector(".minus-fjs")

        let num = 1;
        $('.card-body').click('.plus-fjs', function(e) {
            e.preventDefault();
            num++;
            num = (num < 10) ? "0" + num : num;
            jumlah.innerText = num;
            alert('ok');
        });

        minus.addEventListener("click", () => {
            event.preventDefault();
            if (jumlah > 1) {
                jumlah--;
                jumlah = (jumlah < 10) ? "0" + jumlah : jumlah;
                jumlah.innerText = jumlah;
            }
        });
    </script>
</body>

</html>