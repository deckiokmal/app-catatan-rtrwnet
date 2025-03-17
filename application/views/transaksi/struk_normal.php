<!DOCTYPE html>
<html>

<head>

    <title>Faktur Penjualan Normal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/logo/wanpis.ico" />

    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .table {
            font-size: 12px;
        }

        .text {
            font-family: "Agency FB", Garamond, 'Comic Sans MS';
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            padding: 4;
        }
    </style>
</head>

<body>


    <div class="row">
        <div class="col-lg-6">
            <div class="justify-content-center">
                <table class="table">
                    <?php
                    $b = $data->row_array();
                    ?>
                    <tr>
                        <td width="150px" style="border-top: none">
                            <a>
                                <img class="mr-5" src="<?= site_url('assets/'); ?>img/logo/logo.png" style="position:absolute; width:51px; height:51;">
                                <img class="ml-5" src="<?= site_url('assets/'); ?>img/logo/logo1.png" style="position:absolute; width:135px; height:51;">
                            </a>

                        </td>
                        <td style="border-top: none; border-bottom: none; border-left: none;">
                            <p class="text-left align-top ml-5" style="font-size: 13px; "><?= $perus['nama_perusahaan']; ?><br>
                                <small class="text-left align-top" style="font-size: 9px;"><?= $perus['alamat']; ?></small>

                        </td>


                        <td " class=" text-left" style="border-top: none; border-bottom: none; border-left: none;">
                            No Pesanan<br>
                            Pelanggan<br>
                            Tanggal Pesanan<br>
                            Tanggal Ambil
                        </td>
                        <td class="text-left" style="border-top: none">
                            : <?= $b['no_pesanan']; ?> <br>
                            : <?= $b['nama']; ?> <br>
                            : <?= date('d F Y', strtotime($b['tgl_pesan'])); ?><br>
                            : <?= date('d F Y', strtotime($b['tgl_ambil'])); ?>
                        </td>
                    </tr>

                </table>
            </div>



            <div class="justify-content-center">
                <table class="table table-bordered no-margin" width="50%">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Jenis Pesanan</th>
                            <th class="text-center align-middle">Nama</th>
                            <th class="text-center align-middle">Qty</th>
                            <th class="text-center align-middle">@Harga</th>
                            <th class="text-center align-middle">Subtotal</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data->result_array() as $data) { ?>

                            <tr>
                                <td class="text-center align-middle" scope="row"><?= $i; ?>.</td>
                                <td class="text-center align-middle"><?= $data['nama_produk']; ?></td>
                                <td class="text-center align-middle"><?= $data['nama_pesanan']; ?></td>
                                <td class="text-center align-middle"><?= $data['qty']; ?></td>
                                <td class="text-center align-middle">Rp. <?= number_format($data['harga'], 2, ',', '.'); ?></td>
                                <td class="text-center align-middle">Rp. <?= number_format($data['sub_total'], 2, ',', '.'); ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php } ?>
                        <tr>
                            <td class="text-center align-middle font-weight-bold" colspan="5">Total</td>
                            <td class="text-center align-middle font-weight-bold">Rp. <?= number_format($data['s_total'], 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class='table table-borderless'>
                <tr>
                    <td colspan="5" width="230px" rowspan="4" style="border:1px solid;"><?= $perus['struk_note']; ?></td>
                    <th class="text-right align-middle" style="border-top: none; border-bottom: none; border-left: none;">Diskon</th>
                    <td width="136px" class="text-left align-middle" style="border:1px solid;"><?= number_format($data['diskon'], 2, ',', '.'); ?> %</td>
                </tr>
                <tr>

                    <th class="text-right align-middle" style="border-top: none; border-bottom: none; border-left: none;">Potongan</th>
                    <td class="text-left align-middle" style="border:1px solid;">Rp. <?= number_format($data['potongan'], 2, ',', '.'); ?></td>
                </tr>
                <tr>


                    <th class="text-right align-middle" style="border-top: none; border-bottom: none; border-left: none;">Uang Muka</th>
                    <td class="text-left align-middle" style="border:1px solid;">Rp. <?= number_format($data['uang_muka'], 2, ',', '.'); ?></td>
                </tr>
                <tr>

                    <th class="text-right align-middle" style="border-top: none; border-bottom: none; border-left: none;">Sisa</th>
                    <td width="262px" class="text-left align-middle" style="border:1px solid;">Rp. <?= number_format($data['sisa_bayar'], 2, ',', '.'); ?></td>
                </tr>
                </thead>
                <?php $i++; ?>

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

        </div>
    </div>
    <br> <br>

    <div style="border-bottom:3px dashed ;"></div>
</body>
<script>
    window.print();
</script>

</html>