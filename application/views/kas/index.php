<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('nama_kas_masuk', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                        <div class="square-icon br-tl-9 bg-primary text-center align-self-center shadow-primary"><i class="fa fa fa-credit-card fs-30  text-white"></i></div>
                    </div>
                    <div class="col-8">
                        <div class="card-body card-padding">
                            <h1 class="mb-2" style="font-size: 30px;">Rp. <?= number_format($saldo['total'], 0, ',', '.'); ?></h1>
                            <h5 class="font-weight-normal mb-3">Saldo Kas</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="row">
                    <div class="col-4">
                        <div class="square-icon bg-secondary text-center align-self-center shadow-secondary"><i class="ti-stats-up fs-30  text-white"></i></div>
                    </div>
                    <div class="col-8">
                        <div class="card-body card-padding">
                            <h1 class="mb-2" style="font-size: 30px;">Rp. <?= number_format($total_masuk['total'], 0, ',', '.'); ?></h1>
                            <h5 class="font-weight-normal mb-3">Pemasukan Kas</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
            <div class="card card-img-holder text-default bg-color">
                <div class="row">
                    <div class="col-4">
                        <div class="square-icon bg-info text-center align-self-center shadow-info"><i class="ti-stats-down fs-30  text-white"></i></div>
                    </div>
                    <div class="col-8">
                        <div class="card-body card-padding">
                            <h1 class="mb-2" style="font-size: 30px;">Rp. <?= number_format($total_keluar['total'], 0, ',', '.'); ?></h1>
                            <h5 class="font-weight-normal mb-3">Pengeluaran Kas</h5>
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
                        <button class="btn btn-primary btn-icon kasTambah" data-toggle="modal" data-target="#Kas">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Kas Masuk</span>
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
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kas as $k) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $k['nama_kas']; ?></td>
                                        <td>Rp. <?= number_format($k['jumlah_kas'], 2, ',', '.'); ?></td>
                                        <td><?= date('d F Y', strtotime($k['date_input'])); ?></td>
                                        <td><?= $k['ket_kas']; ?></td>
                                        <td>
                                            <div class="kt-section__content kt-section__content--solid" id="edit">

                                                <a href="" class="btn btn-icon btn-primary btn-success ubahKas" data-toggle="modal" data-target="#Kas" data-id="<?= $k['id']; ?>"><span class="tags" data-toggle="kt-tooltip" data-placement="left" title="Edit"><i class=" fa fa-pencil"></i></span></a>
                                                <a href="<?= base_url(''); ?>kas/hapusKas/<?= $k['id']; ?>" class="btn btn-icon btn-primary btn-danger tombol-hapus"><i class=" fa fa-trash"></i> </a>

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
<div class="modal fade" id="Kas" tabindex="-1" role="dialog" aria-labelledby="kasModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kasModalLabel">Tambah Kas Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kas'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Kas Masuk :</label>
                        <input type="text" class="form-control" id="nama_kas_masuk" name="nama_kas_masuk" placeholder="Masukan Nama Kas Masuk">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Jumlah Kas Masuk :</label>
                        <input type="text" class="form-control" id="jumlah_kas_masuk" name="jumlah_kas_masuk" placeholder="Jumlah Kas Masuk">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Keterangan Kas Masuk :</label>
                        <input type="text" class="form-control" id="ket_kas_masuk" name="ket_kas_masuk" placeholder="Keterangan Kas Masuk">
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