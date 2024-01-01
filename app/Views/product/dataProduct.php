<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('product/addProduct') ?>" class="btn btn-primary">Tambah Produk</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th style="width: 113px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($dataProducts as $product) :
                            $no++
                        ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $product['kode_produk']; ?></td>
                                <td><?= $product['nama_produk']; ?></td>
                                <td><?= rupiah($product['harga_jual']); ?></td>
                                <td><?= $product['deskripsi']; ?></td>
                                <td><?= $product['kategori']; ?></td>
                                <td class="text-center"><img src="<?= base_url() ?>img/<?= $product['gambar'] ?>" alt="" width="50px"></td>
                                <td>
                                    <a href="<?= base_url('product/editProduct'); ?>/<?= $product['id_produk']; ?>" class="badge btn btn-primary ">Edit</a>
                                    <a href="<?= base_url('product/delete'); ?>/<?= $product['id_produk']; ?>" class="badge btn btn-danger btn-hapus">Hapus</a>
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