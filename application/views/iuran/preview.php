<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
    <thead>
        <tr>
            <th class="align-middle text-center">No</th>
            <th class="align-middle text-center">Nama Pelanggan</th>
            <th class="align-middle text-center">Bulan Pembayaran</th>
            <th class="align-middle text-center">Jumlah Pembayaran</th>
            <th class="align-middle text-center">Status Pembayaran</th>
            <th class="align-middle text-center">Print</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($iuran as $g) : ?>
            <tr>
                <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                <td class="align-middle text-center"><?= $g['nama']; ?></td>
                <td class="align-middle text-center"><?= $g['bulan']; ?></td>
                <td class="align-middle text-center">Rp. <?= number_format($g['jumlah'], 2, ',', '.'); ?></td>
                <?php if ($g['status_bayar'] == 1) : ?>
                    <td class="align-middle text-center"><span class="badge badge-success">Sudah Bayar</span></td>
                <?php else : ?>
                    <td class="align-middle text-center"><span class="badge badge-danger">Belum Bayar</span></td>
                <?php endif; ?>
                <?php if ($g['status_bayar'] == 1) : ?>
                    <td class="text-center align-middle">
                        <a href="<?= base_url(''); ?>iuran/cetak/<?= $g['id_iuran']; ?>" target="_blank" class="btn btn-icon btn-twitter"><span><i class="ti-printer" data-toggle="tooltip" title="" data-original-title="ti-printer"></i></span></a>
                    </td>
                <?php else : ?>
                    <td class="text-center align-middle">
                        <a href="<?= base_url(''); ?>iuran/cetak/<?= $g['id_iuran']; ?>" target="_blank" class="btn btn-icon btn-twitter disabled"><span><i class="ti-printer" data-toggle="tooltip" title="" data-original-title="ti-printer"></i></span></a>
                    </td>
                <?php endif; ?>


            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

    </tbody>
</table>

<script>
    $(function(e) {
        $('#example').DataTable();
    });
</script>