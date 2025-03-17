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
                        <button class="btn btn-primary btn-icon newPelangganTambah" data-toggle="modal" data-target="#newPelanggan">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Pelanggan</span>
                        </button>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Contact</th>
                                    <th>Alamat</th>
									<th>IP Address</th>
									<th>Media Akses</th>
                                    <th>Tagihan Bulanan</th>
                                    <th>Jasa Layanan</th>
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
										<td><?= $p['ip_address']; ?></td>
										<td><?= $p['jn_akses']; ?></td>
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

                                                <a href="" class="btn btn-icon btn-primary btn-success newPelangganUbah" data-toggle="modal" data-target="#newPelanggan" data-id="<?= $p['id']; ?>"><span class="tags" data-toggle="kt-tooltip" data-placement="left" title="Edit"><i class=" fa fa-pencil"></i></span></a>
                                                <a href="<?= base_url(''); ?>pelanggan/hapuspel/<?= $p['id']; ?>" class="btn btn-icon btn-primary btn-danger tombol-hapus"><i class=" fa fa-trash"></i> </a>

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
                        <label for="recipient-name" class="form-control-label">IP Address :</label>
                        <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="Masukan IP Address">
                    </div>
					<div class="form-group">
                        <label for="recipient-name" class="form-control-label">Media Akses :</label>
                        <input type="text" class="form-control" id="jn_akses" name="jn_akses" placeholder="Masukan Media Akses">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Jasa Layanan :</label>

                        <select name="id_grup" id="id_grup" class="form-control">

                            <option value="">Jasa Layanan</option>
                            <?php foreach ($grup as $g) : ?>
                                <option class="form-control" value="<?= $g['id']; ?>"><?= $g['grup']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Jasa</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->