<body>
    <div class="login-img">
        <div id="global-loader"></div>
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row authentication">
                        <div class="col col-login mx-auto">
                            <div class="text-center mt-2 mb-6">
                                <img src="assets\img\logo\logo.png?nocache=<?php echo time(); ?>" style="width:150px; height:auto; " alt="Catatan RT RW NET">
                            </div>

                            <h2 class="text-center" style="font-size:30px; text-align:center; color:white;"><?= $perus['nama_perusahaan']; ?></h2>

                            <br>

                            <form class="card" method="post">
                                <div class="card-body p-6 ">
                                    <div class="card-title text-center">Masuk ke Aplikasi</div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <div class="input-icon form-group wrap-input">
                                        <span class="input-icon-addon search-icon">
                                            <i class="mdi mdi-account"></i>
                                        </span>
                                        <input type="text" name="email" id="email" autocomplete="off" value="<?= set_value('email'); ?>" class="form-control" placeholder="Masukan email" />
                                    </div>
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    <div class="input-icon form-group wrap-input">
                                        <span class="input-icon-addon search-icon">
                                            <i class="zmdi zmdi-lock"></i>
                                        </span>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" />

                                        <!-- <label class="form-label">
                                            <a href="<?= base_url('auth/forgotpassword'); ?>" class="float-right small">I forgot password</a>
                                        </label> -->

                                    </div>

                                    <div class="form-group mt-5">

                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                    </div>
                                    <!-- <div class="text-center text-muted mt-3">
                                        Belum punya akun? <a href="<?= base_url('auth/registration'); ?>">Daftar</a>
                                    </div> -->
                                    <div class="flex-c-m text-center mt-5">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>