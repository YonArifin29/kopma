<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>
<?php if ($userLogin[0]['level'] == 1) { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">KOPRASI MAHASISWA</h1>
                    </div>
                    <img class="card-img-bottom" src="<?= base_url("img") ?>/kopma.jpg" alt="Card image cap">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="width: 15rem;">
                    <div class="card-header text-center">
                        <h5>Pengguna Aktif</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($getDataUserByOnlineStatus as $data) : ?>
                            <li class="list-group-item">
                                <div>
                                    <img src="<?= base_url("img") ?>/<?= $data['foto'] ?>" alt="" width="40" class="d-inline img-circle">
                                    <p class="d-inline"><?= $data['nama'] ?></p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="card" style="width: 15rem;">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <img src="<?= base_url("img/dolar.png") ?>" alt="" width="40" class="d-inline">
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-12">Pendapatan Hari ini</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><?= rupiah($getPendapatanAdmin[0]['pendapatan']) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card text-center">
                                <div class="card-header bg-primary" style="height: 50px;">

                                </div>
                                <div class="card-body">
                                    <div class="col-sm-4 mx-auto">
                                        <img src="<?= base_url() ?>/img/<?= $userLogin[0]['foto'] ?>" alt="" width="50" class="d-block mx-auto img-circle">
                                    </div>
                                    <h5><b><?= $userLogin[0]['nama'] ?></b></h5>
                                    <p class="text-muted"><?= $userLogin[0]['nama_usaha'] ?></p>
                                </div>
                                <div class="card-footer bg-light">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <b>123</b>
                                            <p class="text-muted">aktif</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <b><?= ($getTotalSaleProduct[0]['Total']) ? $getTotalSaleProduct[0]['Total'] : 0 ?></b>
                                            <p class="text-muted">Produk Terjual</p>
                                        </div>
                                        <div class="col-sm-5">
                                            <b><?= rupiah(sum($getPendapatanPenjualBulanan)); ?></b>
                                            <p class="text-muted">Keuntungan Bulan ini</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="card">
                                    <div class=" row">
                                        <div class="col-sm-4 text-center">
                                            <img src="<?= base_url("img/dolar.png") ?>" alt="" width="40" class="d-inline">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-12">Penjualan Hari ini</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12"><?= rupiah($getPenjualanHariIni[0]['Total']) ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                            <img src="<?= base_url("img/dolar.png") ?>" alt="" width="40" class="d-inline">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-12">Keuntungan Penjualan hari ini</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12"><?= rupiah($getPendapatanPenjual[0]['pendapatan']) ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
                </div>
            </div>
    </section>
<?php } ?>
<?php $this->endSection(); ?>