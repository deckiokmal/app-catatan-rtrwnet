<div class=" content-area">

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
                                    <h6 class="mediafont text-dark mb-2">Role Akses</h6>

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
                        <form action="<?= base_url('user/changePassword'); ?>" method="post" class="kt-form kt-form--label-right">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <div class="row">


                            </div>

                            <div class="tab-content pt-3">
                                <div class="tab-pane active">

                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="form-label">Password Sekarang</label>
                                                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password sekarang">
                                                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="form-label">Password Baru</label>
                                                        <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="Password Baru">
                                                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="form-label">Verifikasi Password Baru</label>
                                                        <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Verifikasi Password">
                                                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <br>

                                    </div>
                                    <div class="float-right mt-0 mb-1">

                                        <button class="btn btn-primary " type="submit">Ganti Password</button>

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