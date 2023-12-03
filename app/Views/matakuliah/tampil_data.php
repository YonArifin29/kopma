<?php $this->extend('template');?>
<?php $this->section('content');?>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <b><?=$title?></b>
                <div class="btn btn-primary justify-content-end">
                <a href="<?=base_url('Matakuliah')?>/add" class="text-white text-decoration-none">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="text-center">
                        <td>No</td>
                        <td>Kode Matakuliah</td>
                        <td>Nama Matakuliah</td>
                        <td>Sks</td>
                        <td>Ruangan</td>
                        <td>Aksi</td>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 0;?>
                        <?php foreach($matakuliah as $row): ?>
                            <?php $no = $no+1;?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row['kode_matakuliah']?></td>
                                <td><?=$row['nama_matakuliah']?></td>
                                <td><?=$row['sks']?></td>
                                <td><?=$row['ruangan']?></td>
                                <td><a href="Matakuliah/update?id=<?=$row['id_matakuliah']?>" class="badge bg-primary text-decoration-none">Ubah</a> <a href="Matakuliah/delete?id=<?=$row['id_matakuliah']?>" class="badge bg-danger text-decoration-none btn-hapus">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $this->endSection();?>
