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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>ID Karyawan</th>
                                        <th>Posisi</th>
                                        <th>Nama Karyawan</th>
                                        <th>Alamat</th>
                                        <th>Alamat Email</th>
                                        <th>No. Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php foreach ($karyawan as $row) { ?>
                                    <tbody>
                                        <tr style="text-align: center;">
                                            <td><?= $row->id_karyawan; ?></td>
                                            <td>
                                                <?php if ($row->id_bagian == 1) {
                                                    echo "Karyawan";
                                                } elseif ($row->id_bagian == 2) {
                                                    echo "Kasir";
                                                }
                                                ?>
                                            </td>
                                            <td><?= $row->nama_karyawan; ?></td>
                                            <td><?= $row->alamat_karyawan; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->no_telepon_karyawan; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php $this->load->view("admin/templates/footer.php"); ?>
<!-- End Footer -->