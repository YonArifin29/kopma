<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('sale/addSale') ?>" class="btn btn-primary">Tambah Penjualan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Kode Penjualan</th>
                            <th>Waktu</th>
                            <th>Jumlah</th>
                            <th style="width: 113px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $total = 0;
                        foreach ($dataSales as $sale) :
                            $no++;
                            $total += $sale['Total'];
                        ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $sale['kode']; ?></td>
                                <td><?= date_indo($sale['waktu']); ?></td>
                                <td><?= rupiah($sale['Total']); ?></td>
                                <td>
                                    <a href="<?= base_url('sale/editSale'); ?>/<?= $sale['kode']; ?>" class="badge btn btn-primary ">Edit</a>
                                    <a href="<?= base_url('sale/delete'); ?>/<?= $sale['kode']; ?>" class="badge btn btn-danger btn-hapus">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="text-center"><b>Total</b></td>
                            <td><?= rupiah($total); ?></td>
                        </tr>
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