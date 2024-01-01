<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/struk.css">
</head>


<body onload="window.print()">
    <table class="body-wrap">
        <tbody>
            <tr>
                <td></td>
                <td class="container" width="600">
                    <div class="content">
                        <form action="sale/cetakStruk">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="content-wrap aligncenter">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="content-block">
                                                            <h1>KOPMA</h1>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <P>Jl. R.A. Kartini Km. 3 Subang <span class="d-block">41285</span></P>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block">
                                                            <table class="invoice">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="keterangan"><span><?= $getDataTimeAndCode[0]['waktu'] ?></span> <span>Kasir: <?= $userLogin[0]['nama']; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                                <tbody>
                                                                                    <?php
                                                                                    $no = 0;
                                                                                    $total = 0;
                                                                                    foreach ($dataSales as $sale) :
                                                                                        $total += $sale['Total'];
                                                                                    ?>
                                                                                        <tr>
                                                                                            <td><?= $sale["nama_produk"] ?></td>
                                                                                            <td><?= $sale["Qty"] ?></td>
                                                                                            <td class="text-center"><?= rupiah($sale["harga"]) ?></td>
                                                                                            <td>=</td>
                                                                                            <td class="alignright"><?= rupiah($sale["Total"]) ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; ?>
                                                                                    <tr>
                                                                                        <td colspan="2"></td>
                                                                                        <td class="text-center"><b>Total</b></td>
                                                                                        <td>=</td>
                                                                                        <td class="alignright"><?= rupiah($total); ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="2"></td>
                                                                                        <td class="text-center"><b>Tunai</b></td>
                                                                                        <td>=</td>
                                                                                        <td class="alignright"><?= rupiah($tunai); ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="2"></td>
                                                                                        <td class="text-center"><b>Kembalian</b></td>
                                                                                        <td>=</td>
                                                                                        <td class="alignright"><?= rupiah($tunai - $total); ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block">
                                                            <h1>Terimakasih</h1>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div class="footer">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td class="aligncenter content-block"><a href="<?= base_url('sale') ?>">Kembali</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>

</html>