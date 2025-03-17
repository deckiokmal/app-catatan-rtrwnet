<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('gudang', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                        <button class="btn btn-primary btn-icon tambahGudang" data-toggle="modal" data-target="#gudangModal">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Gudang</span>
                        </button>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gudang</th>
                                    <th>Alamat Gudang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($gudang as $gud) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $gud['gudang']; ?></td>
                                        <td><?= $gud['alamat']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-icon btn-primary btn-primary ubahGudang" data-toggle="modal" data-target="#gudangModal" data-id="<?= $gud['id_gud']; ?>"><span data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></span></a>
                                            <a href="<?= base_url(''); ?>transaksi/hapusGud/<?= $gud['id_gud']; ?>" class="btn btn-icon btn-primary btn-danger tombol-hapus" data-toggle="tooltip" data-original-title="Delete"><i class=" fa fa-trash"></i></a>

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
<div class="modal fade" id="gudangModal" tabindex="-1" role="dialog" aria-labelledby="gudangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gudangModalLabel">Tambah Gudang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('transaksi/gudang'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="form-control-label">Nama Gudang:</label>
                        <input type="text" class="form-control" id="gudang" name="gudang" placeholder="Masukan Nama Gudang">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Alamat Gudang:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat supplier">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Gudang</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->