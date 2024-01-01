<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-8">

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
                                <img src="<?= base_url("img") ?>/<?= $data['foto'] ?>" alt="" width="40" class="d-inline">
                                <p class="d-inline"><?= $data['nama'] ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card" style="width: 15rem;">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img src="<?= base_url("img/user.jpg") ?>" alt="" width="40" class="d-inline">
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">Total Pendapatan</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">Rp.800.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>