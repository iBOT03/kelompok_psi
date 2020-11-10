<!-- Navbar -->
<?php $this->load->view("admin/templates/headerauth.php"); ?>
<!-- End Navbar -->

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p><b>Lupa Password</b></p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                <form action="recover-password.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="<?= site_url('admin/login') ?>">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</body>

<!-- Footer -->
<?php $this->load->view("admin/templates/footerauth.php"); ?>
<!-- End Footer -->