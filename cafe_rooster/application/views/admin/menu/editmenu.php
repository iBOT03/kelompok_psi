<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/dashboard") ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/menu") ?>">Menu</a></li>
                        <li class="breadcrumb-item active">Edit Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <form method="post" action="<?= site_url('admin/menu/edit/') . $food[0]->id_menu; ?>" enctype="multipart/form-data">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <input name="idmenu" id="idmenu" type="hidden" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" value="<?php echo $food[0]->id_menu; ?>"> 
                            <p>Nama Menu</p>
                            <div class="input-group">
                                <input name="namamenu" id="namamenu" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Menu" aria-describedby="basic-addon2" value="<?= $food[0]->nama_menu; ?>">
                            </div>
                            <?= form_error('namamenu', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Kategori</p>
                            <div class="input-group">
                                <select class="form-control border-dark small mb-3" id="kategorimenu" name="kategorimenu">
                                    <option value="<?= set_value('kategori') ?>">--- Pilih ---</option>
                                    <?php foreach ($kategori as $row) { ?>
                                        <option value="<?= $row['id_kategori']; ?>" <?php echo ($sub[0]->id_kategori == $row['id_kategori'] ? 'selected' : '') ?>>
                                            <?= $row['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>Harga Menu</p>
                            <div class="input-group">
                                <input name="hargamenu" id="hargamenu" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Harga Menu" aria-describedby="basic-addon2" value="<?= $food[0]->harga_menu; ?>">
                            </div>
                            <?= form_error('hargamenu', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Upload Gambar Menu</p>
                            <div class="input-group">
                                <input name="gambarmenu" id="gambarmenu" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                
                            </div>
                            <!-- <div>
                            <img width="100px" height="100px" src="<?//= base_url('uploads/foto/') . $food[0]->gambar_menu; ?>"> 
                            </div> -->
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
                                <img id="preview" src="" alt="" width="320px" /> <br>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="hidden" name="blank" id="blank" class="form-control border-dark small mb-3" placeholder="blank" aria-describedby="basic-addon2">
                            </div>
                        </div>
                    </div>

                    <p>Deskripsi Menu</p>
                    <div class="input-group">
                        <textarea name="deskripsimenu" id="deskripsimenu" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Deskripsi Menu" aria-describedby="basic-addon2"><?= $food[0]->deskripsi_menu; ?></textarea>
                    </div>
                    <?= form_error('deskripsimenu', '<small class="text-danger pl-2">', '</small>'); ?>                                                           

                    <button type="submit" href="<?php echo site_url('admin/menu') ?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </button>
                    <a href="<?php echo site_url('admin/menu') ?>" class="btn btn-danger btn-icon-split">
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