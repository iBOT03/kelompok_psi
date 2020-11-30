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
                        <h1>Data Kategori Menu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Kategori Menu</li>
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
                                <a href="<?= base_url("admin/kategorimenu/tambah") ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                                    <span class="icon text-white">
                                        <i class="fas fa-plus"></i>
                                        <i class="text">Tambah Kategori</i>
                                    </span>
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php echo $this->session->userdata('pesan'); ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 2px; ">No</th>
                                            <th>Nama Kategori</th>
                                            <th>Gambar Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kategori as $row) : ?>
                                            <tr style="text-align: center;">
                                                <td style="width: 2px;"><?= $no; ?></td>
                                                <td><?= $row->nama_kategori ?></td>
                                                <td><img src="<?= base_url('uploads/foto/') . $row->gambar_kategori ?>" alt="Foto Kategori" width="100"></td>
                                                <td><?= $row->deskripsi_kategori ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('admin/kategorimenu/edit/' . $row->id_kategori) ?>" class="btn btn-sm btn-info">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('admin/kategorimenu/hapus/' . $row->id_kategori) ?>" onclick="confirm_modal('<?php echo 'kategorimenu/hapus/' . $row->id_kategori; ?>')" class="btn btn-sm btn-danger btn-circle" data-toggle="modal" data-target="#hapusModal">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="text-align: center;">
                                            <th style="width: 2px; ">No</th>
                                            <th>Nama Kategori</th>
                                            <th>Gambar Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
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