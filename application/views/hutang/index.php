<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="col text-right ml-4">
                        <button class="btn btn-primary btn-icon tambahHutang" data-toggle="modal" data-target="#tambahhutangModal">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Data Hutang</span>
                        </button>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">No</th>
                                    <th class="text-center align-middle">Nama</th>
                                    <th class="text-center align-middle">Supplier</th>
                                    <th class="text-center align-middle">Tanggal</th>
                                    <th class="text-center align-middle">Jumlah Hutang</th>
                                    <th class="text-center align-middle">Terbayar</th>
                                    <th class="text-center align-middle">Sisa</th>
                                    <th class="text-center align-middle">Umur Hutang</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1; ?>
                                <?php foreach ($hutang as $hut) : ?>
                                    <?php
                                    $start_date = new DateTime($hut['tgl_hut']);
                                    $end_date = new datetime();
                                    $interval = $start_date->diff($end_date);
                                    // hasil : 217 hari
                                    ?>
                                    <tr>
                                        <th class="text-left align-middle" scope="row"><?= $i; ?></th>
                                        <td class="text-left align-middle"><?= $hut['nama']; ?></td>
                                        <td class="text-left align-middle"><?= $hut['supplier']; ?></td>
                                        <td class="text-left align-middle"><?= $hut['tgl_hut']; ?></td>
                                        <td class="text-left align-middle">Rp. <?= number_format($hut['jml_hut'], 2, ',', '.'); ?></td>
                                        <td class="text-left align-middle">Rp. <?= number_format($hut['terbayar_hut'], 2, ',', '.'); ?></td>
                                        <?php if ($hut['jml_hut'] == $hut['terbayar_hut']) : ?>
                                            <td class="text-left align-middle"><span class="badge badge-success">Lunas</span></td>
                                        <?php else : ?>
                                            <td class="text-left align-middle">Rp. <?= number_format($hut['jml_hut'] - $hut['terbayar_hut'], 2, ',', '.'); ?></td>
                                        <?php endif; ?>
                                        <td class="text-left align-middle"><?php echo "$interval->days hari"; ?></td>
                                        <td class="text-left align-middle">
                                            <a href="" class="btn btn-icon btn-primary btn-success ubahHutang" data-toggle="modal" data-target="#hutangModal" data-id="<?= $hut['id_hut']; ?>"><span class="tags" data-toggle="kt-tooltip" data-placement="left" title="Edit"><i class=" fa fa-pencil"></i></span></i></a>
                                            <a href="<?= base_url(''); ?>hutang/hapushut/<?= $hut['id_hut']; ?>" class="btn btn-icon btn-primary btn-danger tombol-hapus"><span class="tags" data-toggle="kt-tooltip" data-placement="right" title="Delete"><i class=" fa fa-trash"></i></span></a>

                                        </td>
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
<div class="modal fade " id="hutangModal" tabindex="-1" role="dialog" aria-labelledby="hutangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="hutangModalLabel">Update Pembayaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(''); ?>hutang/ubahhut/<?= $hut['id_hut']; ?>" method="post">

                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label class="form-label">Update Pembayaran Baru</label>
                        <input type="text" class="form-control" name="terbayar" id="terbayar" placeholder="Masukan Pembayaran">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->

<div class="modal fade " id="tambahhutangModal" tabindex="-1" role="dialog" aria-labelledby="tambahhutangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="tambahhutangModalLabel">Tambah Data Hutang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('hutang'); ?>" method="post">

                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Supplier :</label>
                        <select name="id_supp" id="id_supp" class="form-control">
                            <option value="">Select Supplier</option>
                            <?php foreach ($supplier as $s) : ?>
                                <option class="form-control" value="<?= $s['id_supp']; ?>"><?= $s['supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jumlah Hutang</label>
                        <input type="text" class="form-control" name="jml_hut" id="jml_hut" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jumlah Terbayar</label>
                        <input type="text" class="form-control" name="terbayar_hut" id="terbayar_hut" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Sisa Pembayaran</label>
                        <input type="text" class="form-control" name="sisa_hut" id="sisa_hut" placeholder="Name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>