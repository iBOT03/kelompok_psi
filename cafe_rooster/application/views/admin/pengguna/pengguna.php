<!DOCTYPE html>
<html>
<!-- Navbar -->
<?php $this->load->view("admin/templates/header"); ?>
<!-- End Navbar -->

<!-- Sidebar -->
<?php $this->load->view("admin/templates/sidebar"); ?>
<!-- End Sidebar -->
<head>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
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
                <a href="<?= base_url("admin/pengguna/tambah") ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                    <span class="icon text-white">
                        <i class="fas fa-plus"></i>
                        <i class="text">Tambah Pengguna</i>
                    </span>
                </a>
                <!-- <h3 class="card-title">DataTable with default features</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $this->session->userdata('pesan'); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center;">
                    <th style="width: 2px;">No</th>
                    <th>Alamat Email</th>
                    <th>Nama Pengguna</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($pengguna as $row) : ?>
                  <tr style="text-align: center;">
                    <td style="width: 2px;"><?= $no; ?></td>
                    <td><?= $row->email; ?></td>
                    <td><?= $row->nama_pembeli; ?></td>
                    <td><?= $row->alamat_pembeli; ?></td>
                    <td><?= $row->no_telepon_pembeli; ?></td>
                    <td><?php if ($row->status == 1) {
                            echo '<div class="badge badge-success badge-pill">Aktif</div>';
                         } elseif ($row->status == 2) {
                            echo '<div class="badge badge-danger badge-pill">Non-Aktif</div>';
                         } ?>
                    </td>
                    <td>
                        <button type="button" class="badge id btn btn-outline-primary" data-toggle="modal" data-target="#modal-default<?= $row->id_pembeli ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                  </tr>
                  <?php $no++; endforeach; ?>  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Alamat Email</th>
                    <th>Nama Pengguna</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                  <form action="<?= site_url('admin/pengguna/ganti/' . $row->id_pembeli) ?>" method="post">
                        <div class="modal fade" id="modal-default<?= $row->id_pembeli ?>">
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
                </table>
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

<!-- Footer -->
<?php $this->load->view("admin/templates/footer"); ?>
<!-- End Footer -->
</html>
