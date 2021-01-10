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
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/Booking") ?>">Booking</a></li>
                        <li class="breadcrumb-item active">Konfirmasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <form method="post" action="<?= site_url('admin/Booking/konfirmasi/' . $data[0]->id_booking) ?>" enctype="multipart/form-data">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <input name="id_cat" id="id_cat" type="hidden" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" value="<?php echo $data[0]->id_booking; ?>">
                            <input name="id_pem" id="id_pem" type="hidden" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" value="<?php echo $data[0]->id_pembeli; ?>">

                            <p>Tanggal booking</p>
                            <div class="input-group">
                                <input name="tgl_booking" id="tgl_booking" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Tanggal" aria-describedby="basic-addon2" value="<?php echo $data[0]->tgl_booking; ?>" readonly>
                            </div>
                            <?= form_error('tgl_booking', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Tanggal Acara</p>
                            <div class="input-group">
                                <input name="tgl_acara" id="tgl_acara" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Tanggal" aria-describedby="basic-addon2" maxlength="100" value="<?php echo $data[0]->tgl_acara; ?>" readonly>
                            </div>
                            <?= form_error('tgl_acara', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>Status</p>
                            <div class="input-group">
                                <select class="form-control border-dark small mb-3" id="status" name="status">
                                    <option value="<?= $data[0]->status_transaksi ?>"><?php
                                                                                            if ($data[0]->status_transaksi == 1) {
                                                                                                echo 'Belum Bayar';
                                                                                            } elseif ($data[0]->status_transaksi == 2) {
                                                                                                echo 'Belum Lunas';
                                                                                            } elseif ($data[0]->status_transaksi == 3) {
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
                                <input name="total" id="total" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Total Tagihan" aria-describedby="basic-addon2" value="<?php echo $data[0]->total_booking; ?>" readonly>
                            </div>
                            <?= form_error('total', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <p>Pelunasan Booking</p>
                            <div class="input-group">
                                <input name="pelunasan" id="pelunasan" type="number" class="form-control border-dark small mb-3" placeholder="Masukkan Nominal Tagihan Kekurangan DP" aria-describedby="basic-addon2"  value="<?php echo $data[0]->pelunasan_booking; ?>">
                            </div>
                            <?= form_error('pelunasan', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>
                    <p>Foto Bukti DP</p>
                    <div>
                        <img width="250px" height="250px" src="<?= base_url('assets/buktiPembayaranBooking/') . $data[0]->bukti_tf; ?>">
                    </div> <br><br>

                    <button type="submit" href="<?php echo site_url('admin/Booking') ?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Konfirmasi</span>
                    </button>
                    <a href="<?php echo site_url('admin/Booking') ?>" class="btn btn-danger btn-icon-split">
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