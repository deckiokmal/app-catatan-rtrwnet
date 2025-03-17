<div class=" content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="page-header">
        <h4 class="page-title">Edit Perusahaan</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Perusahaan</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Perusahaan</h3>
                </div>
                <div class="card-body p-4 bg-primary text-white">
                    <form>
                        <div class="row text-center">
                            <div class="col-12">
                                <span class="avatar brround avatar-xl" style="background-image: url('<?= base_url('assets/'); ?>img/logo/logo.png?nocache=<?php echo time(); ?>'); "></span>
                            </div>
                            <div class="col-12">
                                <h4 class="mb-1 mt-2 "><?= $perus['nama_perusahaan']; ?></h4>
                                <p class="mb-0"><?= $perus['no_telepon']; ?></p>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title font-weight-bold">Info</h6>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <div class="media-list">
                            <!-- media -->
                            <div class="media">
                                <div class="media-body ml-5 ">
                                    <h6 class="mediafont text-dark mb-2">No Telepon</h6>
                                    <a class="d-block" href=""><?= $perus['no_telepon']; ?></a>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->
                            <div class="media">
                                <div class="media-body ml-5 ">
                                    <h6 class="mediafont text-dark mb-2">Alamat</h6>
                                    <a class="d-block" href=""><?= $perus['alamat']; ?></a>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->
                        </div>

                </div>
            </div>
        </div>

        <div class="col-lg-8 col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Edit Perusahaan</h2>
                </div>
                <div class="card-body">
                    <div class="e-profile">
                        <?= form_open_multipart('admin/perusahaan', 'class="kt-form kt-form--label-right"'); ?>
                        <input type="hidden" name="id_perus" value="<?= $perus['id_perus']; ?>">
                        <div class="row">
                            <div class="col-12 col-sm-auto mb-3">
                                <div class="mx-auto img-2">
                                    <img src="<?= base_url('assets/img/logo/') . $perus['logo']; ?>?nocache=<?php echo time(); ?>" style="width:100px;" alt="">
                                </div>
                            </div>
                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-center text-sm-left mb-sm-0">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();"> <i class="fa fa-fw fa-camera"></i>&nbsp; Ganti Logo</span>
                                            <input id="logo" name="logo" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                                        </span>
                                        <span class="col form-control"></span>
                                    </div>

                                </div>
                                <!-- <div class="text-center text-sm-right">
                                    <span class="badge badge-secondary">administrator</span>
                                    <div class="text-muted"><small>Joined 23 Oct 2018</small></div>
                                </div> -->
                            </div>
                        </div>

                        <div class="tab-content pt-3">
                            <div class="tab-pane active">

                                <div class="row">
                                    <div class="col">

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label">Nama Perusahaan</label>
                                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $perus['nama_perusahaan']; ?>">
                                                    <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" type="text" id="no_telepon" name="no_telepon" value="<?= $perus['no_telepon']; ?>" aria-describedby="basic-addon1">
                                                    <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" class="form-control" value="<?= $perus['alamat']; ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Alamat Lengkap</label>
                                                    <textarea class="form-control autogrow" cols="5" id="alamat_lengkap" name="alamat_lengkap" rows="6" value="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;"><?= $perus['alamat_lengkap']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Note Struk</label>
                                                    <textarea class="content" name="struk_note" id="struk_note"><?= $perus['struk_note']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="float-right mt-0 mb-0">

                                <button class="btn btn-primary " type="submit">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
</div>
</div>