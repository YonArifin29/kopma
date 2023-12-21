<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>

<div class="container">
    <div class="card-body">
        <a href="<?= base_url('Users/addUser') ?>" class="btn btn-primary">Tambah Pengguna</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Hp</th>
                    <th>alamat</th>
                    <th>Nama Usaha</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th style="width: 113px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataUsers as $user) : ?>
                    <tr>
                        <td>1</td>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['nomor_hp']; ?></td>
                        <td><?= $user['alamat']; ?></td>
                        <td><?= $user['nama_usaha']; ?></td>
                        <td><?= $user['level']; ?></td>
                        <td><?= $user['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection(); ?>