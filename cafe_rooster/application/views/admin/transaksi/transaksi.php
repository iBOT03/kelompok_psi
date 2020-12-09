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
            <h1>List Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
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
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $this->session->userdata('pesan'); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr style="text-align: center;">
                      <th style="width: 2px; ">No</th>
                      <th>Nama Menu</th>
                      <th>Harga Menu</th>
                      <th>Gambar Menu</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($menu as $row) : ?>
                      <tr style="text-align: center;">
                        <td style="width: 2px;"><?= $no; ?></td>
                        <td><?= $row['nama_menu'] ?></td>
                        <td>Rp. <?= number_format($row['harga_menu']) ?></td>
                        <td>
                          <img width="100px" height="100px" src="<?= base_url('uploads/foto/') . $row['gambar_menu']; ?>">
                        </td>
                        <td>
                        <a href="#" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Beli</a>
                        </td>
                      </tr>
                    <?php $no++;
                    endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Harga Menu</th>
                      <th>Gambar Menu</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
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