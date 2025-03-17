<div class=" content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="page-header">
        <h4 class="page-title"><?= $title; ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <div class="card-body p-4 bg-primary text-white">

                    <div class="row text-center">
                        <div class="col-12">
                            <span class="avatar brround avatar-xl" style="background-image: url('<?= base_url('assets/img/profile/') . $user['image']; ?>'); "></span>
                        </div>
                        <div class="col-12">
                            <h4 class="mb-1 mt-2 "><?= $user['name']; ?></h4>
                            <p class="mb-0"></p>
                            <br>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title font-weight-bold">Info</h6>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <div class="media-list">
                            <div class="media">

                                <div class="media-body ml-5 ">
                                    <h6 class="mediafont text-dark mb-2">Role Akses </h6>
                                    <a class="d-block" href=""><span class="badge badge-info"><?= $user_akses['role']; ?></span></a>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->

                            <!-- media -->
                            <div class="media">
                                <div class="media-body ml-5 ">
                                    <h6 class="mediafont text-dark mb-2">Email</h6>
                                    <a class="d-block" href=""><?= $user['email']; ?></a>
                                </div>
                                <!-- media-body -->
                            </div>
                            <!-- media -->
                            <div class="media">
                                <div class="media-body ml-5 ">
                                    <h6 class="mediafont text-dark mb-2">Member Since</h6>
                                    <a class="d-block" href=""><?= date('d F Y', $user['date_created']); ?></a>
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
                    <h2 class="card-title"><?= $title; ?></h2>
                </div>
                <div class="card-body">
                    <div class="e-profile">
                        <?= form_open_multipart('user/edit'); ?>
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <div class="row">

                            <div class="col-12 col-sm-auto mb-3">
                                <div class="mx-auto img-2">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="br-tl-7 br-tr-7" style="width: 100px" alt="">
                                </div>
                            </div>
                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-center text-sm-left mb-sm-0">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();"> <i class="fa fa-fw fa-camera"></i>&nbsp; Ganti Foto</span>
                                            <input id="image" name="image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                                        </span>
                                        <span class="col form-control"></span>
                                    </div>

                                </div>
                                <?php $role = $this->session->userdata('role_id'); ?>

                                <div class="text-center text-sm-right">
                                    <span class="badge badge-info"><?= $user_akses['role']; ?></span>
                                    <div class="text-muted"><small><?= date('d F Y', $user['date_created']); ?></small></div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content pt-3">
                            <div class="tab-pane active">


                                <div class="row">
                                    <div class="col">

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" type="text" id="no_hp" name="no_hp" value="<?= $user['no_hp']; ?>" aria-describedby="basic-addon1">
                                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" disabled="disabled" id="email" name="email" class="form-control" value="<?= $user['email']; ?>">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <br>

                                </div>
                                <div class="float-right mt-0 mb-1">

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