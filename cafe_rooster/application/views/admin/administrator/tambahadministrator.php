<!-- Navbar -->
<?php $this->load->view("admin/templates/header.php"); ?>
<!-- End Navbar -->

<!-- Sidebar -->
<?php $this->load->view("admin/templates/sidebar.php"); ?>
<!-- End Sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Administrator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/dashboard") ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/administrator") ?>">Administrator</a></li>
                        <li class="breadcrumb-item active">Tambah Administrator</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <form method="post" action="<?= site_url('admin/administrator/tambah') ?>" enctype="multipart/form-data">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Nama Lengkap</p>
                            <div class="input-group">
                                <input name="nama" id="nama" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Lengkap" aria-describedby="basic-addon2" value="<?= set_value('nama'); ?>">
                            </div>
                            <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Email</p>
                            <div class="input-group">
                                <input name="email" id="email" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Email" aria-describedby="basic-addon2" maxlength="100" value="<?= set_value('email'); ?>">
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>Posisi</p>
                            <div class="input-group">
                                <select class="form-control border-dark small mb-3" id="posisi" name="posisi">
                                    <option value="<?= set_value('karyawan') ?>">--- Pilih ---</option>
                                    <?php foreach ($karyawan as $row) { ?>
                                        <option value="<?php echo $row->id_bagian; ?>"><?php echo $row->bagian; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p>Telepon/Whatsapp</p>
                            <div class="input-group">
                                <input name="no_telpon" id="no_telpon" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan No Telepon/Whatsapp" aria-describedby="basic-addon2" onkeypress="return hanyaAngka(event)" value="<?= set_value('no_telpon'); ?>">
                            </div>
                            <?= form_error('no_telpon', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>

                    <p>Alamat</p>
                    <div class="input-group">
                        <textarea name="alamat" id="alamat" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Alamat" aria-describedby="basic-addon2"><?= set_value('alamat'); ?></textarea>
                    </div>
                    <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>Upload Foto</p>
                            <div class="input-group">
                                <input name="foto" id="foto" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <img id="preview" src="" alt="" width="320px" /> <br>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Password</p>
                            <div class="input-group">
                                <input name="password1" id="password" type="password" class="form-control border-dark small mb-3" placeholder="Masukkan Password" aria-describedby="basic-addon2">
                            </div>
                            <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Konfirmasi Password</p>
                            <div class="input-group">
                                <input name="password2" id="password2" type="password" class="form-control border-dark small mb-3" placeholder="Konfirmasi Password" aria-describedby="basic-addon2">
                            </div>
                            <?= form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>

                    <button type="submit" href="<?php echo site_url('admin/administrator') ?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Administrator</span>
                    </button>
                    <a href="<?php echo site_url('admin/administrator') ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-reply"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>
                <!-- Card Body -->
            </div>
            <!-- Card -->
        </form>
    </div>
    <!-- /.container-fluid -->
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

<!-- Footer -->
<?php $this->load->view("admin/templates/footer"); ?>
<!-- End Footer -->