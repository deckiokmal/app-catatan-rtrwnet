<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Status Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($iuran as $g) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $g['bulan']; ?></td>
                <?php if ($g['status_bayar'] == 1) : ?>
                    <td class="text-left align-middle"><span class="badge badge-success">Sudah Bayar</span></td>
                <?php else : ?>
                    <td class="text-left align-middle"><span class="badge badge-danger">Belum Bayar</span></td>
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