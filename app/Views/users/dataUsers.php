<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('Users/addUser') ?>" class="btn btn-primary">Tambah Pengguna</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
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
                        <?php
                        $no = 0;
                        foreach ($dataUsers as $user) :
                            $no++
                        ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $user['nama']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['nomor_hp']; ?></td>
                                <td><?= $user['alamat']; ?></td>
                                <td><?= $user['nama_usaha']; ?></td>
                                <td><?= $user['level']; ?></td>
                                <td><?= $user['status']; ?></td>
                                <td>
                                    <a href="<?= base_url('users/editUser'); ?>/<?= $user['id_pengguna']; ?>" class="badge btn btn-primary ">Edit</a>
                                    <a href="<?= base_url('users/delete'); ?>/<?= $user['id_pengguna']; ?>" class="badge btn btn-danger btn-hapus">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>