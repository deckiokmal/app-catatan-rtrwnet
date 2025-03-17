<body>
    <div class="login-img">
        <div id="global-loader"></div>
        <div class="page">
            <div class="page-single">
                <div class="container ">
                    <div class="row authentication">
                        <div class="col col-login mx-auto">
                            <div class="text-center mb-6">
                                <img src="assets\images\brand\logo.png" class="h-8" alt="">
                            </div>
                            <form class="card" method="post" action="<?= base_url('auth/forgotpassword') ?>">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="card-body p-6">

                                    <div class="text-center card-title">Forgot password</div>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    <div class="input-icon form-group">
                                        <span class="input-icon-addon search-icon">
                                            <i class="zmdi zmdi-email"></i>
                                        </span>
                                        <input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">

                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Send</button>
                                    </div>
                                    <div class="text-center text-muted mt-3 ">
                                        Forget it, <a href="<?= base_url('auth'); ?>">send me back</a> to the sign in screen.
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>