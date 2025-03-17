<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('stok', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                        <button class="btn btn-primary btn-icon tambahStok_in" data-toggle="modal" data-target="#stok_inModal">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Stok Masuk</span>
                        </button>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Nama Gudang</th>
                                    <th>Nama Supplier</th>
                                    <th>Tanggal</th>
                                    <th>Stok Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($stok_in as $stok) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $stok['nama_produk']; ?></td>
                                        <td><?= $stok['gudang']; ?></td>
                                        <td><?= $stok['supplier']; ?></td>
                                        <td><?= $stok['date']; ?></td>
                                        <td><?= $stok['stok_in']; ?></td>
                                        <td>

                                            <a href="<?= base_url(''); ?>transaksi/hapusStok_in/<?= $stok['id']; ?>/<?= $stok['kode_produk']; ?>" class="btn btn-icon btn-primary btn-danger tombol-hapus" data-toggle="tooltip" data-original-title="Delete"><i class=" fa fa-trash"></i></a>

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
<div class="modal fade" id="stok_inModal" tabindex="-1" role="dialog" aria-labelledby="stok_inModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stok_inModalLabel">Tambah Stok Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('transaksi/stok_masuk'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="form-control-label">Pilih Produk:</label>
                        <select name="kode_produk" id="kode_produk" class="form-control">
                            <option value="">Select Produk</option>
                            <?php foreach ($produk as $p) : ?>
                                <option value="<?= $p['kode_produk']; ?>"><?= $p['nama_produk']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Pilih Gudang:</label>
                        <select name="id_gud" id="id_gud" class="form-control">
                            <option value="">Select Gudang</option>
                            <?php foreach ($gudang as $g) : ?>
                                <option value="<?= $g['id_gud']; ?>"><?= $g['gudang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Pilih Supplier:</label>
                        <select name="id_supp" id="id_supp" class="form-control">
                            <option value="">Select Supplier</option>
                            <?php foreach ($supplier as $s) : ?>
                                <option value="<?= $s['id_supp']; ?>"><?= $s['supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- <div class="wd-200 mg-b-30">
                        <label class="form-control-label">Pilih Supplier:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                </div>
                            </div><input class="form-control fc-datepicker hasDatepicker" placeholder="MM/DD/YYYY" type="text" id="datepicker">
                        </div>
                    </div> -->
                    <div class="form-group mt-3">
                        <label class="form-control-label">Jumlah Stok Masuk:</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Jumlah Stok Masuk">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Stok Masuk</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->