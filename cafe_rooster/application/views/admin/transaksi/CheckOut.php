<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Check Out Menu</h1>
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
        <form method="post">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Nama Pemesan</p>
                            <div class="input-group">
                                <input name="namaPemesan" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Pemesan" aria-describedby="basic-addon2">
                            </div>
                            <?= form_error('namaPemesan', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Nomor Meja</p>
                            <div class="input-group">
                                <input name="nomorMeja" type="number" class="form-control border-dark small mb-3" placeholder="Masukkan Nama Pemesan" aria-describedby="basic-addon2">
                            </div>
                            <?= form_error('nomorMeja', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <p>Uang Pelanggan</p>
                            <div class="input-group">
                                <input name="uangPelanggan" id="uangPelanggan" onkeyup="sum();" type="number" class="form-control border-dark small mb-3" placeholder="Masukkan Uang Pelanggan" aria-describedby="basic-addon2">
                                <!-- <input name="tagihan" id="tagihanPelanggan" onkeyup="sum();" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan Uang Pelanggan" aria-describedby="basic-addon2" value="100000"> -->
                            </div>
                            <?= form_error('uangPelanggan', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <p>Uang Kembalian</p>
                            <div class="input-group">
                                <input name="uangKembalian" id="uangKembalian" onkeyup="sum();" type="hidden" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" >
                                <input name="uangKembalian" id="uangKembalian1" onkeyup="sum();" type="number" class="form-control border-dark small mb-3" aria-describedby="basic-addon2" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="alert alert-light text-center" role="alert">
                                <p><b>Tagihan Pelanggan</b></p>
                                <input name="tagihan" id="tagihanPelanggan" onkeyup="sum();" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan Uang Pelanggan" aria-describedby="basic-addon2" value="<?= $detail_harga->total_pesanan; ?>">
                                <p>Rp. <?= number_format($detail_harga->total_pesanan); ?></p>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Check Out</span>
                    </button>
                    <a href="<?php echo site_url('admin/Transaksi/') ?>" class="btn btn-danger btn-icon-split">
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
    function sum() {
        var uangPelanggan = document.getElementById('uangPelanggan').value;
        var tagihan = document.getElementById('tagihanPelanggan').value;
        var result = parseInt(uangPelanggan) - parseInt(tagihan);
        if (!isNaN(tagihan)) {
            document.getElementById('uangKembalian').value = result;
            document.getElementById('uangKembalian1').value = result;
        }
    }
</script>