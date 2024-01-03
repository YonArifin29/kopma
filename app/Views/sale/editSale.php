<?php $this->extend('templates/template'); ?>
<?php $this->section('content'); ?>

<div class="container">
    <?php if (session('validation')) {
        // $err_kode_produk = (session('validation')->hasError('kode_produk')) ? session('validation')->getError('kode_produk') : "";
        // $err_nama_produk = (session('validation')->hasError('nama_produk')) ? session('validation')->getError('nama_produk') : "";
        // $err_harga_jual = (session('validation')->hasError('harga_jual')) ? session('validation')->getError('harga_jual') : "";
        // $err_kategori = (session('validation')->hasError('kategori')) ? session('validation')->getError('kategori') : "";
        // $err_kategori = (session('validation')->hasError('foto')) ? session('validation')->getError('foto') : "";
        // $err_deskripsi = (session('validation')->hasError('deskripsi')) ? session('validation')->getError('deskripsi') : "";
    } else {
        // $err_kode_produk = "";
        // $err_nama_produk = "";
        // $err_harga_jual = "";
        // $err_nomor_hp = "";
        // $err_kategori = "";
        // $err_foto = "";
        // $err_deskripsi = "";
    }
    // if ($getDataSale) {
    //     dd($getDataSale);
    // }
    // if ($dataProducts) {
    //     dd($dataProducts);
    // }
    ?>
    <div class="row">
        <div class="col-sm-8">
            <form action="<?= base_url("sale/edit") ?>" method="post" enctype='multipart/form-data'>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3 mt-3">
                                <input type="text" class="form-control " placeholder="Kode Penjualan" name="kode" value="<?= ($getDataTimeAndCode) ? $getDataTimeAndCode[0]['kode'] : "" ?>" readonly>
                                <input type="hidden" class="form-control " placeholder="Kode Produk" name="waktu" value="<?= ($getDataTimeAndCode) ? $getDataTimeAndCode[0]['waktu'] : "" ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <select name="kode_produk" class="form-select" id="select_box">
                                <option value="">Pilih Produk</option>
                                <?php
                                foreach ($dataProducts as $product) {
                                    echo '<option value="' . $product["kode_produk"] . '">' . $product["nama_produk"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3 mt-3">
                                <input type="number" class="form-control " placeholder="Jumlah" name="jml_produk">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="tombol">Tambah</button>
                                <button type="reset" class="btn btn-warning"><a href="<?= base_url('sale/cetakStruk') ?>/<?= ($getDataTimeAndCode) ? $getDataTimeAndCode[0]['kode'] : "" ?>" class="text-decoration-none text-white">Selesai</a></button>
                                <button type="reset" class="btn btn-danger"><a href="<?= base_url('sale/delete') ?>" class="text-decoration-none text-white">Batal</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th style="width: 113px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <?php if ($getDataSale) { ?>
                        <tbody>
                            <?php
                            $no = 0;
                            $total = 0;
                            foreach ($getDataSale as $data) :
                                $no++;
                                $total += $data['Total'];
                            ?>

                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['kode_produk']; ?></td>
                                    <td><?= $data['nama_produk']; ?></td>
                                    <td><?= $data['Qty']; ?></td>
                                    <td><?= rupiah($data['harga']); ?></td>
                                    <td><?= rupiah($data['Total']); ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('sale/delete'); ?>/e-<?= $data['id_penjualan']; ?>-<?= $data['kode_penjualan']; ?>" class="badge btn btn-danger btn-hapus">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    <?php } else { ?>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    <?php } ?>

                    <tr>
                        <td class="text-center" colspan='5'><b>Total</b></td>
                        <td><b><?= rupiah($total) ?? ""; ?></b></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>