<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('produk', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                        <button class="btn btn-primary btn-icon tambahProduk" data-toggle="modal" data-target="#produkModal">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Produk</span>
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
                                    <th>Satuan</th>
                                    <th>Kategori</th>
                                    <th>Harga Modal</th>
                                    <th>Harga Jual</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($produk as $prod) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $prod['nama_produk']; ?></td>
                                        <td><?= $prod['satuan']; ?></td>
                                        <td><?= $prod['kategori']; ?></td>
                                        <td>Rp. <?= number_format($prod['harga_modal'], 2, ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($prod['harga_jual'], 2, ',', '.'); ?></td>
                                        <td>
                                            <a href="" class="btn btn-icon btn-primary btn-success ubahProduk" data-toggle="modal" data-target="#produkModal" data-id="<?= $prod['id']; ?>"><span class="tags" data-toggle="kt-tooltip" data-placement="left" title="Edit"><i class=" fa fa-pencil"></i></span></i></a>
                                            <a href="<?= base_url(''); ?>produk/hapusprod/<?= $prod['id']; ?>" class="btn btn-icon btn-primary btn-danger tombol-hapus"><span class="tags" data-toggle="kt-tooltip" data-placement="right" title="Delete"><i class=" fa fa-trash"></i></span></a>

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
<div class="modal fade" id="produkModal" tabindex="-1" role="dialog" aria-labelledby="produkModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produkModalLabel">Tambah Produk Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label class="form-control-label">Kode Produk:</label>
                        <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukan Kode produk" value="<?= $kode_produk; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Nama Produk:</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukan Nama produk">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Satuan Produk:</label>
                        <select name="s_prod" id="s_prod" class="form-control">
                            <option value="">Satuan Produk</option>
                            <?php foreach ($satuan as $s) : ?>
                                <option value="<?= $s['id']; ?>"><?= $s['satuan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Kategori Produk:</label>
                        <select name="k_prod" id="k_prod" class="form-control">
                            <option value="">Kategori Produk</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
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
                        <label class="form-control-label">Harga Modal:</label>
                        <input type="text" class="form-control angka3" id="harga_modal" name="harga_modal" placeholder="Masukan Nama produk">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Harga Jual:</label>
                        <input type="text" class="form-control uang" id="harga_jual" name="harga_jual" placeholder="Masukan Nama produk">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Produk</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->