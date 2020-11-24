<!-- Navbar -->
<?php $this->load->view("admin/templates/headerauth.php"); ?>
<!-- End Navbar -->

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p><b>Cafe Rooster</b></p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Welcome back, Sign in to start your session</p>
                <?= $this->session->flashdata('pesan'); ?>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            Sign in
                        </button>
                    </div>
                    <!-- /.social-auth-links -->
                </form>
                <p class="mb-1" style="text-align: center;">
                    <a href="<?= site_url('admin/lupapassword') ?>">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</body>

<!-- Footer -->
<?php $this->load->view("admin/templates/footerauth.php"); ?>
<!-- End Footer -->