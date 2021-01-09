<!-- Navbar -->
<?php $this->load->view("admin/templates/header.php"); ?>
<!-- End Navbar -->

<!-- Sidebar -->
<?php $this->load->view("admin/templates/sidebar.php"); ?>
<!-- End Sidebar -->

<form action="" method="post">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Detail Pengguna</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <button class="btn btn-sm btn-success btn-icon-split shadow-sm" type="submit" name="aktif" id="aktif">
                            <span class="icon text-white-50"><i class="fas fa-check"></i></span><span class="text"> Aktif</span></button>

                        <button class="btn btn-sm btn-danger btn-icon-split shadow-sm" type="submit" name="mati" id="mati">
                            <span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text"> Non-Aktif</span></button>

                    </div>
                    <?php foreach ($user as $row) : ?>
                        <!-- <div class="card shadow mb-4"> -->

                            <div class="card-body">

                                <img src="<?= base_url('uploads/foto/') . $row->foto ?>" alt="Foto Profil" class="logo-komunitas mx-auto d-block mb-5" width="300px">

                                <div class="row">
                                    <div class="my-auto col-sm-2">
                                        <p>Nama Lengkap:</p>
                                    </div>
                                    <div class="my-auto col-sm-9">
                                        <p><?= $user[0]->nama_pembeli; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="my-auto col-sm-2">
                                        <p>Email:</p>
                                    </div>
                                    <div class="my-auto col-sm-9">
                                        <p><?= $user[0]->email; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="my-auto col-sm-2">
                                        <p>Telepon/Whatsapp:</p>
                                    </div>
                                    <div class="my-auto col-sm-9">
                                        <p><?= $user[0]->no_telepon_pembeli; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="my-auto col-sm-2">
                                        <p>Alamat:</p>
                                    </div>
                                    <div class="my-auto col-sm-9">
                                        <p><?= $user[0]->alamat_pembeli; ?></p>
                                    </div>
                                </div>

                                <a href="<?php echo site_url('admin/pengguna') ?>" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-reply"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>
                        <!-- </div> -->
                        <!-- /.card -->
                    <?php endforeach; ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</form>

<!-- End of Page Wrapper -->

</body>

</html>