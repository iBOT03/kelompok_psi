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
              <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard')?>">Home</a></li>
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
                    <th>ID Menu</th>
                    <th>Nama Menu</th>
                    <th>Kategori Menu</th>
                    <th>Harga Menu</th>
                    <th>Gambar Menu</th>
                    <th>Deskripsi Menu</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <?php foreach ($menu as $mn) : ?>
                  <tbody>
                  <tr>
                    <td><?= $mn['id_menu'] ?></td>
                    <td><?= $mn['nama_menu'] ?></td>
                    <td><?= $mn['nama_kategori'] ?></td>
                    <td><?= $mn['harga_menu'] ?></td>
                    <td><?= $mn['gambar_menu'] ?></td>
                    <td><?= $mn['deskripsi_menu'] ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                  </tr>
                  </tbody>
                  <?php endforeach; ?>
                  <tfoot>
                  <tr>
                    <th>ID Menu</th>
                    <th>Nama Menu</th>
                    <th>Kategori Menu</th>
                    <th>Harga Menu</th>
                    <th>Gambar Menu</th>
                    <th>Deskripsi Menu</th>
                    <th>Aksi</th>
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



