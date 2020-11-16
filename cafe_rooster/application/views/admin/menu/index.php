
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/dashboard") ?>">Home</a></li>
                        <li class="breadcrumb-item active">Menu</li>
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
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <a href="#" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                                <span class="icon text-white">
                                    <i class="fas fa-plus"></i>
                                    <i class="text">Tambah Menu</i>
                                </span>
                            </a>
                            <br>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php echo $this->session->userdata('pesan'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>ID Menu</th>
                                        <th>Nama Menu</th>
                                        <th>Harga Menu</th>
                                        <th>Gambar Menu</th>
                                        <th>Deskripsi Menu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php foreach ($menu as $row) : ?>
                                    <tbody>
                                        <tr style="text-align: center;">
                                            <td><?= $row->id_menu; ?></td>
                                            <td><?= $row->nama_menu; ?></td>
                                            <td><?= $row->harga_menu; ?></td>
                                            <td><?= $row->gambar_menu; ?></td>
                                            <td><?= $row->deskripsi_menu; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <!-- /.card -->
                        <!-- <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a id="delete_link" class="btn btn-danger" href="">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
