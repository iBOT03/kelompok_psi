<!-- Navbar -->
<?php $this->load->view("admin/templates/headerauth.php"); ?>
<!-- End Navbar -->

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <!-- <p><b>Cafe Rooster</b></p> -->
            <img src="<?= base_url('/assets/admin/img/rooster-logo2.png') ?>" width="200px">
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
                        <input id="password" type="password" name="password"  class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span><i id="icon" class="fas fa-eye" onclick="show()"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- <input type="checkbox" onclick="show()"> show password -->
                    <!-- <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div> -->


                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            Sign in
                        </button>
                    </div>
                    <!-- /.social-auth-links -->
                </form>                
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</body>

<!-- show password -->
<script>
  function show() {
    var x = document.getElementById('password');
    
    if (x.type ==="password") {
      x.type = "text";
      document.getElementById('icon').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
    }else{
      x.type = "password";
      document.getElementById('icon').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
    }
  }
</script>

<!-- Footer -->
<?php $this->load->view("admin/templates/footerauth.php"); ?>
<!-- End Footer -->

