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
                                    <th>No Pesanan</th>
                                    <th>Supplier</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Hutang</th>
                                    <th>Terbayar</th>
                                    <th>Sisa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($hutang as $hut) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $hut['no_pesanan']; ?></td>
                                        <td><?= $hut['supplier']; ?></td>
                                        <td><?= $hut['tgl_hut']; ?></td>
                                        <td>Rp. <?= number_format($hut['jml_hut'], 2, ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($hut['terbayar_hut'], 2, ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($hut['sisa_hut'], 2, ',', '.'); ?></td>
                                        <td>
                                            <a href="" class="btn btn-icon btn-primary btn-success ubahProduk" data-toggle="modal" data-target="#produkModal" data-id="<?= $hut['id_hut']; ?>"><span class="tags" data-toggle="kt-tooltip" data-placement="left" title="Edit"><i class=" fa fa-pencil"></i></span></i></a>
                                            <a href="<?= base_url(''); ?>produk/hapusprod/<?= $hut['id_hut']; ?>" class="btn btn-icon btn-primary btn-danger tombol-hapus"><span class="tags" data-toggle="kt-tooltip" data-placement="right" title="Delete"><i class=" fa fa-trash"></i></span></a>

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
<div class="modal fade " id="produkModal" tabindex="-1" role="dialog" aria-labelledby="produkModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel2">Detail Hutang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <br>
            <div class="row px-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Pembayaran Hutang</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-primary">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th class="text-white">Tanggal</th>
                                        <th class="text-white">Supplier</th>
                                        <th class="text-white">Jumlah Hutang</th>
                                        <th class="text-white">Cicil</th>
                                        <th class="text-white">Sisa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cicil as $c) : ?>
                                        <tr>

                                            <td><?= $c['tgl_cicil']; ?></td>
                                            <td><?= $c['supplier']; ?></td>
                                            <td>Rp. <?= number_format($c['total_hut'], 2, ',', '.'); ?></td>
                                            <td>Rp. <?= number_format($c['jml_cicil'], 2, ',', '.'); ?></td>
                                            <td>Rp. <?= number_format($c['total_hut'] - $c['jml_cicil'], 2, ',', '.'); ?></td>

                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive -->
                    </div>
                </div>
                <div class="col-md-6">
                    <form method="post" class="card">
                        <div class="card-header">
                            <h3 class="card-title">Masukan Pembayaran</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Jumlah Pembayaran</label>
                                <input type="text" class="form-control" name="example-text-input" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Sisa Hutang</label>
                                <input type="text" class="form-control" name="example-text-input" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Sisa Hutang Selanjutnya</label>
                                <input type="text" class="form-control" name="example-text-input" placeholder="Name">
                            </div>

                            <div class="d-flex">

                                <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                            </div>

                        </div>


                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->