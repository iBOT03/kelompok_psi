<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
          <?= $this->session->flashdata('pesan'); ?>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('./uploads/foto/') . $admin['foto'] ?>" alt="image" alt="User profile picture" style="width: 100px; height: 100px;">
              </div>

              <h3 class="profile-username text-center"><?= $admin['nama_karyawan'] ?></h3>
              <p class="text-muted text-center"><?= $karyawan['bagian'] ?></p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Alamat</b> <a class="float-right"><?= $admin['alamat_karyawan'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>No Telepon</b> <a class="float-right"><?= $admin['no_telepon_karyawan'] ?></a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#edit_profile" data-toggle="tab">Edit Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#edit_password" data-toggle="tab">Edit Password</a></li>
              </ul>
            </div>
            <!-- /.card-header -->

            <!-- EDIT PROFILE-->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="edit_profile">
                  <!-- <form class="form-horizontal" action="<?= base_url('admin/Profile/edit_profile') ?>" methode="POST" > -->
                  <?= form_open_multipart('admin/Profile/edit_profile'); ?>
                  <div class="form-group row">
                    <label for="namakaryawan" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="namakaryawan" value="<?= $admin['nama_karyawan'] ?>" id="namakaryawan" placeholder="Nama Lengkap">
                      <?= form_error('namakaryawan', '<small class="text-danger">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nohpkaryawan" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nohpkaryawan" value="<?= $admin['no_telepon_karyawan'] ?>" id="nohpkaryawan" placeholder="No HP">
                      <?= form_error('nohpkaryawan', '<small class="text-danger">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="alamatkaryawan" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="alamatkaryawan" value="<?= $admin['alamat_karyawan'] ?>" id="alamatkaryawan" placeholder="Alamat Lengkap">
                      <?= form_error('alamatkaryawan', '<small class="text-danger">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <input type="file" class="from-control" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="foto" value="<?= $admin['foto'] ?>" id="foto">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <img id="preview" src="" alt="" width="320px" /> <br>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                    <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2"> <br>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                  </div>
                  <!-- </form> -->
                  <?= form_close(); ?>
                </div>


                <!-- EDIT PASSWORD -->
                <div class="tab-pane" id="edit_password">
                  <form class="form-horizontal" action="<?= base_url('admin/Profile/edit_password') ?>" method="POST">
                    <div class="form-group row">
                      <label for="passwordlama" class="col-sm-3 col-form-label">Password Lama</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="passwordlama" id="passwordlama" placeholder="Password Lama">
                        <?= form_error('passwordlama', '<small class="text-danger">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="passwordbaru" class="col-sm-3 col-form-label">Password Baru</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="passwordbaru" id="passwordbaru" placeholder="Password Baru">
                        <?= form_error('passwordbaru', '<small class="text-danger">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="konfirmasipassword" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="konfirmasipassword" id="konfirmasipassword" placeholder="Konfirmasi Password">
                        <?= form_error('konfirmasipassword', '<small class="text-danger">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-danger">Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  function tampilkanPreview(gambar, idpreview) {
    // membuat objek gambar
    var gb = gambar.files;
    // loop untuk merender gambar
    for (var i = 0; i < gb.length; i++) {
      // bikin variabel
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview = document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        // jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview);
        // membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else {
        // jika tipe data tidak sesuai
        alert("Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
      }
    }
  }
</script>