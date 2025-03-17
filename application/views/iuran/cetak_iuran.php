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

        .body {
            font-size: 30px;
        }

        .table .td {
            font-size: 20px;
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
                                <img class="mr-5" src="<?= site_url('assets/'); ?>img/logo/logo.png" style="position:absolute; width:200px; height:68px;">

                            </a>

                        </td>
                        <td style="border-top: none; border-bottom: none; border-left: none;">
                            <p class="text-left align-top ml-5" style="font-size: 13px; "><?= $perus['nama_perusahaan']; ?><br>
                                <small class="text-left align-top" style="font-size: 9px;"><?= $perus['alamat']; ?></small>

                        </td>


                        <td class="text-left" style="border-top: none; border-bottom: none; border-left: none;">

                            Pelanggan<br>
                            Tanggal<br>

                        </td>
                        <td class="text-left" style="border-top: none; border-bottom: none; border-left: none;">

                            : <?= $b['nama']; ?> <br>
                            : <?= date('d F Y', strtotime($b['tglbayar'])); ?><br>

                        </td>
                    </tr>

                </table>
            </div>



            <div class="justify-content-center">
                <table class="table table-bordered no-margin" width="50%">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Pelanggan</th>
                            <th class="text-center align-middle">Bandwidht</th>
                            <th class="text-center align-middle">@Harga</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data->result_array() as $data) { ?>

                            <tr>
                                <td class="text-center align-middle" scope="row"><?= $i; ?>.</td>
                                <td class="text-center align-middle"><?= $data['nama']; ?></td>
                                <td class="text-center align-middle"><?= $data['bandw']; ?></td>
                                <td class="text-center align-middle">Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>

                            </tr>
                            <?php $i++; ?>
                        <?php } ?>
                        <tr>
                            <td class="text-center align-middle font-weight-bold" colspan="3">Total</td>
                            <td class="text-center align-middle font-weight-bold">Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class='table table-borderless'>
                <tr>
                    <td colspan="3" width="312px" rowspan="4" style="border:1px solid;"><?= $perus['struk_note']; ?></td>

                </tr>

                <tr>

                    <th class="text-right align-middle" style="border-top: none; border-bottom: none; border-left: none;"></th>
                    <td class="text-center align-middle">Hormat kami ,<br><br><br><br>
                        <?= $perus['nama_perusahaan']; ?></td>
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