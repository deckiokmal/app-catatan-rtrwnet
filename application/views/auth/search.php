<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile" style="background-image: url('<?= base_url('assets/'); ?>media/bg/bg-3.jpg'); background-repeat:no-repeat; 
            -webkit-background-size:cover;
            -moz-background-size:cover;
            -o-background-size:cover;
            background-size:cover;
            background-position:center;">
                <div class="kt-login__left">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__content">
                            <a class="kt-login__logo" href="#">
                                <img src="<?= base_url('assets/'); ?>media/logos/logo.png"">
                            </a>
                            <h3 class=" kt-login__title kt-font-info kt-font-boldest">Hasil Tracking Aset : </h3>
                                <span class="kt-login__desc">

                                    <div class="kt-portlet">
                                        <div class="kt-portlet__head kt-portlet__head-info">
                                            <div class="kt-portlet__head-label">
                                                <h3 class="kt-portlet__head-title kt-font-info">
                                                    Horizontal Form Layout
                                                </h3>
                                            </div>
                                        </div>

                                        <!--begin::Form-->

                                        <div class="kt-portlet__body">
                                            <div class="kt-section kt-section--first">

                                                <div class="kt-section__body">
                                                    <div class="row">
                                                        <div class=" profile-user-info">
                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Username </div>

                                                                <div class="profile-info-value">
                                                                    <span><?= $aset['nama']; ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Location </div>

                                                                <div class="profile-info-value">
                                                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                                    <span>Netherlands</span>
                                                                    <span>Amsterdam</span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Age </div>

                                                                <div class="profile-info-value">
                                                                    <span>38</span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Joined </div>

                                                                <div class="profile-info-value">
                                                                    <span>2010/06/20</span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-info-row">
                                                                <div class="profile-info-name"> Last Online </div>

                                                                <div class="profile-info-value">
                                                                    <span>3 hours ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </span>

                        </div>
                    </div>
                </div>

                <div class="kt-login__divider">
                    <div></div>
                </div>
                <div class="kt-login__right">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title"><i class="fa fa-search"></i> Pencarian Aset</h3>
                                <div class="kt-login__desc">Masukan Kode aset ! </div>
                            </div>
                            <div class="kt-login__form">


                                <?= $this->session->flashdata('message'); ?>
                                <form class="kt-form" action="<?= base_url('auth/tracking'); ?>" method="post" id="tracking">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Kode Aset" name="keyword" id="keyword" autocomplete="off">
                                    </div>
                                    <div class="kt-login__actions">
                                        <button type="submit" id="cari" class="btn btn-danger btn-pill kt-login__btn-primary">Cari !</button>
                                        <button id="kt_login_forgot_cancel" class="btn btn-primary btn-pill kt-login__btn-primary">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title"><i class="fa fa-search"></i> Pencarian Aset</h3>
                                <div class="kt-login__desc">Masukan Kode aset ! </div>
                            </div>
                            <div class="kt-login__form">

                            </div>
                        </div>
                        <div class="kt-login__account">
                            <span class="kt-login__account-msg">
                                Don't have an account yet ?
                            </span>
                            &nbsp;&nbsp;
                            <a href="<?= base_url('auth/registration'); ?>" class="kt-login__account-link">Sign Up!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->