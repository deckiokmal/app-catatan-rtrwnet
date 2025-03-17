<!DOCTYPE html>
<html>

<head>

    <title>Laporan Cetak Detail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/logo/wanpis.ico" />

    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        td,
        th,
        tr {
            border: 1px solid rgb(190, 190, 190);
            padding: 4px;
        }
    </style>
</head>

<body>


    <h3 class="mb-2" align="center">
        DETAIL PESANAN
    </h3>
    <br>
    <div class="justify-content-center">
        <table class="table table-bordered no-margin" width="100%">
            <thead class="thead-light">
                <tr>
                    <th class="text-center align-middle">No Pesanan</th>
                    <td class="text-left align-middle"><?= $data['no_pesanan']; ?></td>
                    <th class="text-center align-middle">Nama Pesanan</th>
                    <td class="text-left align-middle"><?= $data['nama_pesanan']; ?></td>
                </tr>
                <tr>
                    <th class="text-center align-middle">Pelanggan</th>
                    <td class="text-left align-middle"><?= $data['nama']; ?></td>
                    <th class="text-center align-middle">No. Handphone</th>
                    <td class="text-left align-middle"><?= $data['no_hp']; ?></td>
                </tr>
                <tr>
                    <th class="text-center align-middle">Alamat</th>
                    <td class="text-left align-middle" colspan="3"><?= $data['alamat']; ?></td>

                </tr>
                <tr>
                    <th class="text-center align-middle">Tanggal Pesan</th>
                    <td class="text-left align-middle"><?= date('d F Y', strtotime($data['tgl_pesan'])); ?></td>
                    <th class="text-center align-middle">Tangga Ambil</th>
                    <td class="text-left align-middle"><?= date('d F Y', strtotime($data['tgl_ambil'])); ?></td>
                </tr>
                <tr>
                    <th height="80px" class="text-center align-middle">Uraian Pesanan</th>
                    <td class="text-left align-middle" colspan="3"><?= $data['uraian']; ?></td>
                </tr>
                <tr>
                    <th height="80px" class="text-center align-middle">Keterangan</th>
                    <td class="text-left align-middle" colspan="3"><?= $data['keterangan']; ?></td>
                </tr>
            </thead>

            <tbody>


            </tbody>

        </table>
        <br>
    </div>
    <div class="justify-content-center">
        <table class="table table-bordered no-margin" width="100%">
            <thead class="thead-light">
                <tr>
                    <th rowspan="2" class="text-center align-middle">Qty</th>
                    <th colspan="2" class="text-center align-middle">Dimensi</th>
                    <th rowspan="2" class="text-center align-middle">@Harga</th>
                    <th rowspan="2" class="text-center align-middle">Jasa Desain</th>
                    <th rowspan="2" class="text-center align-middle">Biaya Lain</th>
                    <th rowspan="2" class="text-center align-middle">Total</th>
                </tr>
                <tr>
                    <th class="text-center align-middle">Panjang</th>
                    <th class="text-center align-middle">Lebar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center align-middle"><?= $data['qty']; ?></td>
                    <td class="text-center align-middle"><?= $data['d_panjang']; ?></td>
                    <td class="text-center align-middle"><?= $data['d_lebar']; ?></td>
                    <td class="text-center align-middle">Rp. <?= number_format($data['harga'], 2, ',', '.'); ?></td>
                    <td class="text-center align-middle">Rp. <?= number_format($data['js_desain'], 2, ',', '.'); ?></td>
                    <td class="text-center align-middle">Rp. <?= number_format($data['biaya_lain'], 2, ',', '.'); ?></td>
                    <td class="text-center align-middle">Rp. <?= number_format($data['s_total'], 2, ',', '.'); ?></td>
                </tr>
            </tbody>
            <thead class="thead-light">
                <tr>
                    <th colspan="6" class="text-center align-middle table-warning">Diskon</th>
                    <td><?= number_format($data['diskon'], 2, ',', '.'); ?> %</td>
                </tr>
                <tr>
                    <th colspan="6" class="text-center align-middle table-warning">Potongan</th>
                    <td>Rp. <?= number_format($data['potongan'], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th colspan="6" class="text-center align-middle">Uang Muka</th>
                    <td>Rp. <?= number_format($data['uang_muka'], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th colspan="6" class="text-center align-middle">Sisa</th>
                    <td>Rp. <?= number_format($data['sisa_bayar'], 2, ',', '.'); ?></td>
                </tr>
            </thead>
        </table>
    </div>

    <br>
    <br>
    <?php
    $date = Date('d F Y');

    ?>

    <p class="text-right mr-5 "><?= $perus['nama_perusahaan']; ?> , <?= $date; ?></p>


</body>

</html>