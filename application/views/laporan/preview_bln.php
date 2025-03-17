<table class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Nama Kas</th>
            <th>Masuk</th>
            <th>Keluar</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $masuk = 0; ?>
        <?php $keluar = 0; ?>
        <?php $saldo = 0; ?>
        <?php foreach ($kas_keluar as $k) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= date('d F Y H:i:s', strtotime($k['date_input'])); ?></td>
                <td><?= $k['nama_kas']; ?></td>
                <?php if ($k['jumlah_kas'] == 0) : ?>
                    <td></td>
                <?php else : ?>
                    <td class="text-center">Rp. <?= number_format($k['jumlah_kas'], 2, ',', '.'); ?></td>
                <?php endif; ?>
                <?php if ($k['jumlah_kas_keluar'] == 0) : ?>
                    <td></td>
                <?php else : ?>
                    <td class="text-center">Rp. <?= number_format($k['jumlah_kas_keluar'], 2, ',', '.'); ?></td>
                <?php endif; ?>

            </tr>
            <?php $i++; ?>
            <?php $masuk += $k['jumlah_kas']; ?>
            <?php $keluar += $k['jumlah_kas_keluar']; ?>
        <?php endforeach; ?>
        <tr>

            <td colspan="3" class="text-center font-weight-bold">Total</td>
            <td class="text-center font-weight-bold">Rp. <?= number_format($masuk, 0, ',', '.'); ?></td>
            <td class="text-center font-weight-bold">Rp. <?= number_format($keluar, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td colspan="3" class="text-center font-weight-bold text-red">Sisa Saldo</td>
            <td colspan="2" class="text-center font-weight-bold text-red">Rp. <?= number_format($masuk - $keluar, 0, ',', '.'); ?></td>

        </tr>


    </tbody>
</table>