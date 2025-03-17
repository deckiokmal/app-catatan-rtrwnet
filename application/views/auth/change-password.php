<body>
    <div class="login-img">
        <div id="global-loader"></div>
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col col-login mx-auto">
                            <div class="text-center mb-6">
                                <img src="assets\images\brand\logo.png" class="h-8" alt="">
                            </div>
                            <form class="card authentication" action="<?= base_url('auth/changepassword') ?>" method="post">
                                <div class="card-body sign-up-page p-7">
                                    <div class="card-title text-center">Ganti Password</div>

                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    <div class="input-icon form-group">
                                        <span class="input-icon-addon search-icon">
                                            <i class="zmdi zmdi-lock"></i>
                                        </span>
                                        <input class="form-control" type="password" placeholder="Password" name="password1" id="password1">
                                    </div>

                                    <div class="input-icon form-group">
                                        <span class="input-icon-addon search-icon">
                                            <i class="zmdi zmdi-lock"></i>
                                        </span>
                                        <input class="form-control" type="password" placeholder="Confirm Password" name="password2" id="password2">
                                    </div>


                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>