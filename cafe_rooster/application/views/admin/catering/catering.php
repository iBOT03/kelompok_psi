<!DOCTYPE html>
<html>

<head>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Catering</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Catering</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php echo $this->session->userdata('pesan'); ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 2px; ">No</th>
                                            <th>Tanggal Catering</th>
                                            <th>Tanggal acara</th>
                                            <th>Total Tagihan</th>
                                            <th>Bukti DP</th>
                                            <th>Pelunasan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($catering as $row) : ?>
                                            <tr style="text-align: center;">
                                                <td style="width: 2px;"><?= $no; ?></td>
                                                <td><?= $row->tgl_catering ?></td>
                                                <td><?= $row->tgl_diperlukan ?></td>
                                                <td>Rp. <?= number_format($row->total_catering) ?></td>
                                                <td><img src="<?= base_url('uploads/foto/') . $row->dp_catering ?>" alt="Belum upload" width="100"></td>
                                                <td>Rp. <?= $row->pelunasan_catering ?></td>
                                                <td>
                                                    <?php if ($row->id_status_transaksi == 1) {
                                                        echo '<div class="badge badge-danger badge-pill">Belum Bayar</div>';
                                                    } elseif ($row->id_status_transaksi == 2) {
                                                        echo '<div class="badge badge-warning badge-pill">Belum Lunas</div>';
                                                    } elseif ($row->id_status_transaksi == 3) {
                                                        echo '<div class="badge badge-success badge-pill">Lunas</div>';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/Catering/konfirmasi/' . $row->id_catering) ?>" class="badge id btn btn-primary">
                                                        konfirmasi
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin
                                                    untuk menghapus?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Pilih "Hapus" untuk menghapus, pilih "Batal"
                                                untuk kembali ke Panel Admin.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                                                <a id="delete_link" class="btn btn-danger" href="<?php echo site_url('admin/kategorimenu/hapus/' . $row->id_kategori) ?>">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    </body>

</html>