<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url('<?= base_url('assets/'); ?>media/bg/bg-2.jpg'); background-repeat:no-repeat; 
            -webkit-background-size:cover;
            -moz-background-size:cover;
            -o-background-size:cover;
            background-size:cover;
            background-position:center;">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">

                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img alt="Logo" src="<?= base_url('assets/'); ?>img/logo/logo.png?t=<?php echo time(); ?>" width="50" height="50" />
                                <img alt="Logo" src="<?= base_url('assets/'); ?>img/logo/logo-text.png?t=<?php echo time(); ?>" width="122" height="29" />
                            </a>
                        </div>
                        <div class="kt-login__title">

                        </div>
                        <div class="kt-login__signin">

                            <h2 class="text-center"><?= $perus['nama_perusahaan']; ?></h2>
                            <br>

                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Halaman Login</h3>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <form method="post" action="<?= base_url('auth'); ?>" class=" kt-form">

                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" id="email" autocomplete="off" value="<?= set_value('email'); ?>">

                                </div>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                <div class="input-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" id="password">

                                </div>
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                <div class="row kt-login__extra">


                                    <div class="col kt-align-right">
                                        <a href="<?= base_url('auth/forgotpassword'); ?>" id="kt_login_forgot" class="kt-login__link">Lupa Password ?</a>
                                    </div>


                                </div>
                                <div class="kt-login__actions">
                                    <button type="submit" class="btn btn-brand btn-pill kt-login__btn-primary">Masuk Aplikasi</button>
                                </div>
                            </form>
                        </div>



                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title"><i class="fa fa-search"></i> Pencarian Aset</h3>
                                <div class="kt-login__desc">Masukan Kode aset ! </div>
                            </div>
                            <form class="kt-form" action="" id="tracking">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Kode Aset" name="keyword" id="keyword" autocomplete="off">
                                </div>
                                <div class="kt-login__actions">
                                    <button type="submit" id="kt_login_forgot_submit" class="btn btn-danger btn-pill kt-login__btn-primary">Cari !</button>
                                    <button id="kt_login_forgot_cancel" class="btn btn-primary btn-pill kt-login__btn-secondary">Kembali</button>
                                </div>
                            </form>
                        </div>
                        <div class="kt-login__account">
                            <span class="kt-login__account-msg">
                                Anda belum punya akun ?
                            </span>
                            &nbsp;&nbsp;
                            <a href="<?= base_url('auth/registration'); ?>" class="kt-login__account-link">Daftar !</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->