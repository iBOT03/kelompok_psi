<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" untuk keluar, pilih "Batal" untuk kembali ke Panel Admin.</div>
            <div class="modal-footer">
                <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?php echo site_url('admin/Auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="logtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Welcome back, Sign in to start your session</p>
                        <?= $this->session->flashdata('pesan'); ?>

                        <form action="<?= base_url('Auth/index') ?>" method="post">
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
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
                            <!-- <a href="#" role="button" data-toggle="modal" data-target="#forgtModal">I forgot my password</a> -->
                            <a href="<?= base_url('Auth/ForgotPassword') ?>">Forgot Password!</a>
                        </p>
                        <!-- <p class="mb-1" style="text-align: center;">
                    <a href="<?= base_url('Auth/Register') ?>">I don't have an account!</a>
                </p> -->
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="forgtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Lupa password boss?</p>
                        <?= $this->session->flashdata('pesan'); ?>

                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="social-auth-links text-center mb-3">
                                <button type="submit" class="btn btn-block btn-primary">
                                    Submit
                                </button>
                            </div>
                            <!-- /.social-auth-links -->
                        </form>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="regtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Regist your account here!</p>
                        <?= $this->session->flashdata('pesan'); ?>

                        <form action="<?= base_url('Auth/Register') ?>" method="post">
                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="nama" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?= set_value('nama') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <!-- <span class="fas fa-envelope"></span> -->
                                    </div>
                                </div>
                            </div>
                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="alamat" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="<?= set_value('alamat') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <!-- <span class="fas fa-envelope"></span> -->
                                    </div>
                                </div>
                            </div>
                            <?= form_error('nohp', '<small class="text-danger">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="nohp" name="nohp" id="nohp" class="form-control" placeholder="No telepon" value="<?= set_value('nohp') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <!-- <span class="fas fa-envelope"></span> -->
                                    </div>
                                </div>
                            </div>
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('passwordk', '<small class="text-danger">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="password" name="passwordk" id="password" class="form-control" placeholder="Konfirmasi Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="social-auth-links text-center mb-3">
                                <button type="submit" class="btn btn-block btn-primary">
                                    Regist Now
                                </button>
                            </div>
                            <!-- /.social-auth-links -->
                        </form>
                        <!-- <p class="mb-1" style="text-align: center;">
                    <a href="<?= base_url('Auth') ?>">I already have an account!</a>
                </p> -->
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk menghapus?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal" untuk kembali ke Panel Admin.</div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                  <a class="btn btn-danger" href="<?php echo site_url('admin/kategorimenu/hapus') ?>">Hapus</a>
              </div>
          </div>
      </div>
  </div> -->