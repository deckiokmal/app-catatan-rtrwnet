<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('pelanggan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <div class="page-header">
        <h4 class="page-title"><?= $title; ?></h4>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <div class="card">

                <div class="card-header text-right">
                    <h3 class="card-title text-blue">Pelanggan : <span class="badge badge-primary"><?= $pelanggan['nama']; ?></span></h3>
                    <div class="col text-right ml-4">

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pelanggan</th>
                                    <th>Bulan Tagihan</th>
                                    <th>Iuran Bulanan</th>
                                    <th>Status Bayar</th>
                                    <th class="text-center align-middle">Bayar</th>
                                    <th class="text-center align-middle">Print</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>


                                <?php foreach ($tagihan->result_array() as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['bulan']; ?></td>
                                        <td>Rp. <?= number_format($p['jumlah'], 2, ',', '.'); ?></td>
                                        <?php if ($p['status_bayar'] == 1) : ?>
                                            <td class="text-left align-middle"><span class="badge badge-success">Sudah Bayar</span></td>
                                        <?php else : ?>
                                            <td class="text-left align-middle"><span class="badge badge-danger">Belum Bayar</span></td>
                                        <?php endif; ?>
                                        <?php if ($p['status_bayar'] == 1) : ?>
                                            <td class="text-center align-middle">
                                                <a type="submit" href="<?= base_url(''); ?>iuran/bayar/<?= $p['id_iuran']; ?>" class="btn btn-lime disabled bayarIuran" data-toggle="modal" data-target="#bayarIuran" data-id="<?= $p['id_iuran']; ?>">Sudah dibayar</a>
                                            </td>
                                        <?php else : ?>
                                            <td class="text-center align-middle">
                                                <a type="submit" href="<?= base_url(''); ?>iuran/bayar/<?= $p['id_iuran']; ?>" class="btn btn-lime bayarIuran" data-toggle="modal" data-target="#bayarIuran" data-id="<?= $p['id_iuran']; ?>">Bayar Tagihan</a>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($p['status_bayar'] == 1) : ?>
                                            <td class="text-center align-middle">
                                                <a href="<?= base_url(''); ?>iuran/cetak/<?= $p['id_iuran']; ?>" target="_blank" class="btn btn-icon btn-twitter"><span><i class="ti-printer" data-toggle="tooltip" title="" data-original-title="ti-printer"></i></span></a>
                                            </td>
                                        <?php else : ?>
                                            <td class="text-center align-middle">
                                                <a href="<?= base_url(''); ?>iuran/cetak/<?= $p['id_iuran']; ?>" target="_blank" class="btn btn-icon btn-twitter disabled"><span><i class="ti-printer" data-toggle="tooltip" title="" data-original-title="ti-printer"></i></span></a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--begin::Modal-->
<div class="modal fade" id="bayarIuran" tabindex="-1" role="dialog" aria-labelledby="bayarIuranLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayarIuranLabel">Tambah Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('iuran/bayar'); ?>" method="post">
                    <input type="hidden" name="id_iuran" id="id_iuran">
                    <input type="hidden" name="kode_warga" id="kode_warga">
                    <input type="hidden" name="jml_iuran" id="jml_iuran">
                    <input type="hidden" value="<?= $p['id_pel']; ?>" name="id_pel" id="id_pel">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Warga :</label>
                        <input type="text" class="form-control" value="<?= $p['nama']; ?>" id="nama" name="nama" placeholder="Masukan Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Jumlah Iuran :</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan No Handphone Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Bulan Iuran :</label>
                        <input type="text" class="form-control" id="bulan" name="bulan" placeholder="Masukan Alamat Pelanggan">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->

<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(function() {

        $('#example').on('click', '.bayarIuran', function() {

            $('#bayarIuranLabel').html('Konfimasi Bayar');
            $('.modal-footer button[type=submit').html('Bayar');
            $('.modal-body form').attr('action', base_url + 'iuran/bayar');

            const id = $(this).data('id');

            $.ajax({

                url: base_url + 'iuran/getBayar',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#bulan').val(data.bulan);
                    $('#jumlah').val(data.jumlah);
                    $('#id_iuran').val(data.id_iuran);
                }
            });
        });
    });
</script>