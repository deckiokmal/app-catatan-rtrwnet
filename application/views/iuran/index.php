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
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="col text-right ml-4">
                        <a href="<?= base_url('iuran/buat_tagihan'); ?>" class="btn btn-primary btn-icon">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Buat Tagihan</span>
                        </a>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>No Handphone</th>
                                    <th>Alamat</th>
                                    <th>Iuran Bulanan</th>
                                    <th>Bandwidht</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>


                                <?php foreach ($pelanggan as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['no_hp']; ?></td>
                                        <td><?= $p['alamat']; ?></td>
                                        <td>Rp. <?= number_format($p['harga_b'], 2, ',', '.'); ?></td>
                                        <?php if ($p['id_grup'] == 2) : ?>
                                            <td><span class="badge badge-success mt-2"><?= $p['grup']; ?></span></td>
                                        <?php elseif ($p['id_grup'] == 4) : ?>
                                            <td><span class="badge badge-info mt-2"><?= $p['grup']; ?></span></td>
                                        <?php else : ?>
                                            <td><span class="badge badge-danger mt-2"><?= $p['grup']; ?></span></td>
                                        <?php endif; ?>



                                        <td>
                                            <div class="kt-section__content kt-section__content--solid" id="edit">

                                                <a type="submit" href="<?= base_url(''); ?>iuran/lihat_tagihan/<?= $p['id']; ?>" class="btn btn-azure bayarIuran">Lihat Tagihan</a>

                                            </div>
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
<div class="modal fade" id="newPelanggan" tabindex="-1" role="dialog" aria-labelledby="newPelangganLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPelangganLabel">Tambah Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelanggan'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Pelanggan :</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">No Handphone :</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan No Handphone Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Alamat :</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Grup Pelanggan :</label>

                        <select name="id_grup" id="id_grup" class="form-control">

                            <option value="">Select Grup</option>
                            <?php foreach ($grup as $g) : ?>
                                <option class="form-control" value="<?= $g['id']; ?>"><?= $g['grup']; ?></option>
                            <?php endforeach; ?>
                        </select>
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