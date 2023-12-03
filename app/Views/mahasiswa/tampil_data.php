<?php $this->extend('template');?>
<?php $this->section('content');?>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <b><?=$title?></b>
                <div class="btn btn-primary justify-content-end">
                <a href="<?=base_url('Mahasiswa')?>/add" class="text-white text-decoration-none">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="text-center">
                        <td>No</td>
                        <td>Nim</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Nomor HP</td>
                        <td>Aksi</td>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 0;?>
                        <?php foreach($mahasiswa as $row): ?>
                            <?php $no = $no+1;?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row['nim']?></td>
                                <td><?=$row['nama']?></td>
                                <td><?=$row['alamat']?></td>
                                <td><?=$row['no_hp']?></td>
                                <td><a href="Mahasiswa/update?id=<?=$row['id']?>" class="badge bg-primary text-decoration-none">Ubah</a> <a href="Mahasiswa/delete?id=<?=$row['id']?>" class="badge bg-danger text-decoration-none btn-hapus">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $this->endSection();?>
