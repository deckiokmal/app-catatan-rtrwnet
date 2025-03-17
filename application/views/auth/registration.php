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
                            <form class="card authentication" action="<?= base_url('auth/registration') ?>" method="post">
                                <div class="card-body sign-up-page p-7">
                                    <div class="card-title text-center">Create New Account</div>
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    <div class="input-icon form-group">
                                        <span class="input-icon-addon search-icon">
                                            <i class="mdi mdi-account"></i>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Fullname" id="name" name="name" value="<?= set_value('name'); ?>">
                                    </div>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <div class="input-icon form-group">
                                        <span class="input-icon-addon search-icon">
                                            <i class="zmdi zmdi-email"></i>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>" autocomplete="off">
                                    </div>
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
                                        <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                                    </div>
                                    <div class="text-center text-muted mt-4">
                                        Already have account? <a href="<?= base_url('auth'); ?>">Sign in</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>