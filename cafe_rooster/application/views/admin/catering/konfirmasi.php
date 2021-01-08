<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Konfirmasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/dashboard") ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/catering") ?>">Catering</a></li>
                        <li class="breadcrumb-item active">Konfirmasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <form method="post" action="<?= site_url('admin/catering/konfirmasi/' . $data[0]->id_catering) ?>" enctype="multipart/form-data">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <input name="id_cat" id="id_cat" type="hidden" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" value="<?php echo $data[0]->id_catering; ?>">
                            <input name="id_pem" id="id_pem" type="hidden" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" value="<?php echo $data[0]->id_pembeli; ?>">

                            <p>Tanggal Catering</p>
                            <div class="input-group">
                                <input name="tgl_catering" id="tgl_catering" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Tanggal" aria-describedby="basic-addon2" value="<?php echo $data[0]->tgl_catering; ?>" readonly> 
                            </div>
                            <?= form_error('tgl_catering', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Tanggal Diperlukan</p>
                            <div class="input-group">
                                <input name="tgl_diperlukan" id="tgl_diperlukan" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Tanggal" aria-describedby="basic-addon2" maxlength="100" value="<?php echo $data[0]->tgl_diperlukan; ?>" readonly>
                            </div>
                            <?= form_error('tgl_diperlukan', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>Status</p>
                            <div class="input-group">
                                <select class="form-control border-dark small mb-3" id="status" name="status">
                                    <option value="<?= $data[0]->id_status_transaksi ?>"><?php
                                     if ($data[0]->id_status_transaksi == 1) {
                                        echo 'Belum Bayar';
                                    } elseif ($data[0]->id_status_transaksi == 2) {
                                        echo 'Belum Lunas';                                                    
                                    } elseif ($data[0]->id_status_transaksi == 3) {
                                        echo 'Lunas';
                                    }
                                    ?></option>
                                    <option value="0">--- Pilih ---</option>
                                    <option value="1">Belum Bayar</option>
                                    <option value="2">Belum Lunas</option>
                                    <option value="3">Lunas</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p>Total Tagihan</p>
                            <div class="input-group">
                                <input name="total" id="total" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Total Tagihan" aria-describedby="basic-addon2" value="<?php echo $data[0]->total_catering; ?>" readonly>
                            </div>
                            <?= form_error('total', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>Pelunasan Catering</p>
                            <div class="input-group">
                                <input name="pelunasan" id="pelunasan" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Tagihan Kekurangan DP" aria-describedby="basic-addon2" value="<?php echo $data[0]->pelunasan_catering; ?>">
                            </div>
                            <?= form_error('pelunasan', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Upload Foto DP</p>
                            <div class="input-group">
                                <input name="dp_catering" id="dp_catering" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                <?php foreach ($data as $row) { ?>
                                    <a href="<?= base_url('uploads/foto/') . $row->dp_catering ?>">Lihat Foto DP</a>
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
                                <img id="preview" src="" alt="" width="320px" /> <br>
                            </div>
                        </div>
                    </div>
                    
                    <p>Catatan</p>
                    <div class="input-group">
                        <textarea name="catatan" id="catatan" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan catatan" aria-describedby="basic-addon2"><?php echo $data[0]->catatan; ?></textarea>
                    </div>
                    <?= form_error('catatan', '<small class="text-danger pl-2">', '</small>'); ?>

                    <button type="submit" href="<?php echo site_url('admin/catering') ?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Konfirmasi</span>
                    </button>
                    <a href="<?php echo site_url('admin/catering') ?>" class="btn btn-danger btn-icon-split">
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