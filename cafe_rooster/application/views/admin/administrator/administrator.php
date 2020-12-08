<!-- Navbar -->
<?php $this->load->view("admin/templates/header"); ?>
<!-- End Navbar -->

<!-- Sidebar -->
<?php $this->load->view("admin/templates/sidebar"); ?>
<!-- End Sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Administrator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin/dashboard") ?>">Home</a></li>
                        <li class="breadcrumb-item active">Administrator</li>
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
                            <a href="<?= base_url("admin/administrator/tambah") ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                                <span class="icon text-white">
                                    <i class="fas fa-plus"></i>
                                    <i class="text">Tambah Admin</i>
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
                                        <th>No</th>
                                        <th>Posisi</th>
                                        <th>Nama Karyawan</th>
                                        <th>Alamat</th>
                                        <th>Alamat Email</th>
                                        <th>No. Telepon</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($karyawan as $row) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $no; ?></td>
                                            <td><?= $row->bagian; ?></td>
                                            <td><?= $row->nama_karyawan; ?></td>
                                            <td><?= $row->alamat_karyawan; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->no_telepon_karyawan; ?></td>
                                            <td>
                                                <?php if ($row->status == 1) {
                                                    echo '<div class="badge badge-success badge-pill">Aktif</div>';
                                                } elseif ($row->status == 2) {
                                                    echo '<div class="badge badge-danger badge-pill">Non-Aktif</div>';
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($_SESSION['nama_karyawan'] != $row->nama_karyawan) {
                                                ?>
                                                    <a href="" type="button" class="badge id btn btn-outline-primary" data-toggle="modal" data-target="#modal-default<?= $row->id_karyawan ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Posisi</th>
                                        <th>Nama Karyawan</th>
                                        <th>Alamat</th>
                                        <th>Alamat Email</th>
                                        <th>No. Telepon</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="<?= site_url('admin/administrator/ganti/' . $row->id_karyawan) ?>" method="post">
                                <div class="modal fade" id="modal-default<?= $row->id_karyawan ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ganti Status</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Silahkan pilih status untuk akun tersebut. . .</p>
                                                <button class="btn btn-sm btn-success btn-icon-split shadow-sm" type="submit" name="aktif" id="aktif">
                                                    <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text"> Aktif</span></button>

                                                <button class="btn btn-sm btn-danger btn-icon-split shadow-sm" type="submit" name="mati" id="mati">
                                                    <span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text"> Non-Aktif</span></button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </form>
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

        <!-- /.modal -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php $this->load->view("admin/templates/footer"); ?>
<!-- End Footer -->