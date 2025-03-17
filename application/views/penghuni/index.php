<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('penghuni', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <div class="page-header">
        <h4 class="page-title"><?= $title; ?></h4>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>

    <div class="row row-cards">
        <div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="row">
                    <div class="col-4">
                        <div class="square-icon br-tl-9 bg-primary text-center align-self-center shadow-primary"><i class="fa fa fa-users fs-30  text-white"></i></div>
                    </div>
                    <div class="col-8">
                        <div class="card-body card-padding">
                            <h1 class="mb-2" style="font-size: 30px;"><?= $dihuni; ?></h1>
                            <h5 class="font-weight-normal mb-3">Rumah dihuni</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="row">
                    <div class="col-4">
                        <div class="square-icon bg-secondary text-center align-self-center shadow-secondary"><i class="fa fa-fw fa-user-times fs-30  text-white"></i></div>
                    </div>
                    <div class="col-8">
                        <div class="card-body card-padding">
                            <h1 class="mb-2" style="font-size: 30px;"><?= $tidak_dihuni; ?></h1>
                            <h5 class="font-weight-normal mb-3">Rumah Tidak dihuni</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="row">
                    <div class="col-4">
                        <div class="square-icon bg-info text-center align-self-center shadow-info"><i class="fa fa-fw fa fa-handshake-o fs-30  text-white"></i></div>
                    </div>
                    <div class="col-8">
                        <div class="card-body card-padding">
                            <h1 class="mb-2" style="font-size: 30px;"><?= $dikontrakan; ?></h1>
                            <h5 class="font-weight-normal mb-3">Rumah dikontrakan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Data</span>
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
                                    <th>No Handphone</th>
                                    <th>Blok No Rumah</th>
                                    <th>Status Rumah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>


                                <?php foreach ($penghuni as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $p['nama_warga']; ?></td>
                                        <td><?= $p['no_hp']; ?></td>
                                        <td><?= $p['blok_perum']; ?></td>
                                        <?php if ($p['status_huni'] == 'dihuni') : ?>
                                            <td><span class="badge badge-info mt-2"><?= $p['status_huni']; ?></span></td>
                                        <?php elseif ($p['status_huni'] == 'dikontrakan') : ?>
                                            <td><span class="badge badge-danger mt-2"><?= $p['status_huni']; ?></span></td>
                                        <?php else : ?>
                                            <td><span class="badge badge-success mt-2"><?= $p['status_huni']; ?></span></td>
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
                <h5 class="modal-title" id="newPelangganLabel">Tambah Warga Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('penghuni'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Kode Warga :</label>
                        <input type="text" value="<?= $kode; ?>" autocomplete="off" class="form-control" id="kode" name="kode" placeholder="Masukan Nama Pelanggan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">No Kartu Keluarga :</label>
                        <input type="text" class="form-control" autocomplete="off" id="no_kk" name="no_kk" placeholder="Masukan Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Warga :</label>
                        <input type="text" class="form-control" autocomplete="off" id="nama_warga" name="nama_warga" placeholder="Masukan Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">No Handphone :</label>
                        <input type="text" class="form-control" autocomplete="off" id="no_hp" name="no_hp" placeholder="Masukan No Handphone Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Blok Perum :</label>
                        <input type="text" class="form-control" autocomplete="off" id="blok_perum" name="blok_perum" placeholder="Masukan Alamat Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Status Huni :</label>

                        <select name="status_huni" id="status_huni" autocomplete="off" class="form-control">


                            <?php foreach ($status_huni as $st) : ?>
                                <option class="form-control" value="<?= $st; ?>"><?= $st; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Warga</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->