<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('supplier', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                        <button class="btn btn-primary btn-icon tambahSupplier" data-toggle="modal" data-target="#supplierModal">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Supplier</span>
                        </button>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>Alamat Supplier</th>
                                    <th>Kontak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($supplier as $sup) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sup['supplier']; ?></td>
                                        <td><?= $sup['alamat']; ?></td>
                                        <td><?= $sup['no_hp']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-icon btn-primary btn-primary ubahSupplier" data-toggle="modal" data-target="#supplierModal" data-id="<?= $sup['id_supp']; ?>"><span class="tags" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-pencil"></i></span></a>
                                            <a href="<?= base_url(''); ?>transaksi/hapussup/<?= $sup['id_supp']; ?>" class="btn btn-icon btn-primary btn-danger tombol-hapus" data-toggle="tooltip" data-original-title="Delete"><i class=" fa fa-trash"></i></a>

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
<div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="supplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supplierModalLabel">Tambah Supplier Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('master/supplier'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="form-control-label">Nama Supplier:</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Masukan Nama supplier">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Alamat Supplier:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat supplier">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Kontak Supplier:</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan Kontak supplier">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Supplier</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->