<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Kategori Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/dashboard") ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/kategorimenu") ?>">Kategori menu</a></li>
                        <li class="breadcrumb-item active">Edit kategori</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <form method="post" action="<?= site_url('admin/kategorimenu/edit/' . $row[0]->id_kategori) ?>" enctype="multipart/form-data">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <input name="id" id="id" type="hidden" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" value="<?php echo $row[0]->id_kategori; ?>">
                            <p>Nama Kategori</p>
                            <div class="input-group">
                                <input name="namakategori" id="namakategori" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Lengkap" aria-describedby="basic-addon2" value="<?php echo $row[0]->nama_kategori; ?>">
                            </div>
                            <?= form_error('namakategori', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Deskripsi</p>
                            <div class="input-group">
                                <input type="text" class="form-control border-dark small mb-3" name="deskripsikategori" value="<?= $row[0]->deskripsi_kategori ?>" id="deskripsikategori" placeholder="Masukkan deskripsi kategori">
                                <!-- <textarea name="deskripsikategori" id="deskripsikategori" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan deskripsi kategori" aria-describedby="basic-addon2"><?php echo $row[0]->deskripsi_kategori; ?></textarea> -->
                            </div>
                            <?= form_error('deskripsikategori', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>Upload Foto</p>
                            <div class="input-group">
                                <input name="gambarkategori" id="gambarkategori" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                <?php foreach ($row as $row) { ?>
                                    <a href="<?= base_url('uploads/foto/') . $row->gambar_kategori ?>">Lihat Foto</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <img id="preview" src="" alt="" width="320px" /> <br>
                            </div>
                        </div>
                    </div>

                    <button type="submit" href="<?php echo site_url('admin/kategorimenu') ?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </button>
                    <a href="<?php echo site_url('admin/kategorimenu') ?>" class="btn btn-danger btn-icon-split">
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