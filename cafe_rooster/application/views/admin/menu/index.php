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
            <h1>Data Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Data Menu</li>
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
                <h3 class="card-title">Data Menu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id Menu</th>
                    <th>Nama Menu</th>
                    <th>Kategori Menu</th>
                    <th>Harga Menu</th>
                    <th>Gambar Menu</th>
                    <th>Deskripsi Menu</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($menu as $row) : ?>  
                  <tr>
                    <td><?= $row['id_menu'] ?></td>
                    <td><?= $row['nama_menu'] ?></td>
                    <td><?= $row['nama_kategori'] ?></td>
                    <td> <?= $row['harga_menu'] ?></td>
                    <td><?= $row['gambar_menu']  ?></td>
                    <td><?= $row['deskripsi_menu'] ?></td>
                  </tr>
                  <?php endforeach; ?>  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id Menu</th>
                    <th>Nama Menu</th>
                    <th>Kategori Menu</th>
                    <th>Harga Menu</th>
                    <th>Gambar Menu</th>
                    <th>Deskripsi Menu</th>
                  </tr>
                  </tfoot>
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
</html>
