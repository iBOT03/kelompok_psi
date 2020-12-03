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
              <div class="card-header">
                <a href="<?= base_url("admin/menu/tambah") ?>" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                  <span class="icon text-white">
                    <i class="fas fa-plus"></i>
                    <i class="text">Tambah Menu</i>
                    <?php echo $this->session->userdata('pesan'); ?>
                  </span>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr style="text-align: center;">
                      <th style="width: 2px; ">No</th>
                      <th>Nama Menu</th>
                      <th>Kategori Menu</th>
                      <th>Harga Menu</th>
                      <th>Gambar Menu</th>
                      <th>Deskripsi Menu</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($menu as $row) : ?>
                      <tr style="text-align: center;">
                        <td style="width: 2px;"><?= $no; ?></td>
                        <td><?= $row['nama_menu'] ?></td>
                        <td><?= $row['nama_kategori'] ?></td>
                        <td>Rp. <?= number_format($row['harga_menu']) ?></td>
                        <td>
                          <img width="100px" height="100px" src="<?= base_url('uploads/foto/') . $row['gambar_menu']; ?>">
                        </td>
                        <td><?= $row['deskripsi_menu'] ?></td>
                        <td>
                          <button type="button" data-toggle="modal" data-id="<?= $row['id_menu'] ?>" data-target="#modalhapus" class="badge id btn btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
                          <button type="button" data-toggle="modal" data-target="#modaledit<?= $row['id_menu'] ?>" class="badge id btn btn-outline-primary"><i class="fas fa-edit"></i> Edit</button>
                        </td>
                      </tr>
                    <?php $no++;
                    endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Kategori Menu</th>
                      <th>Harga Menu</th>
                      <th>Gambar Menu</th>
                      <th>Deskripsi Menu</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
                <!-- MODAL HAPUS -->
                <div class="modal fade" id="modalhapus">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Pemberitahuan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                      </div>
                      <form action="<?= base_url('admin/Menu/delete/') . $row['id_menu'] ?>" method="POST">
                        <div class="modal-footer">
                          <input type="hidden" class="hapus" name="id">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                      </form>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                </div>

                <!-- MODAL Edit -->
                <?php foreach ($menu as $mn) : ?>
                  <div class="modal fade" id="modaledit<?= $mn['id_menu'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Pemberitahuan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <?= form_open_multipart('admin/Menu/edit'); ?>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label for="namamenu" class=" col-form-label">Nama Menu</label>
                              <input type="text" class="form-control" name="namamenu" value="<?= $mn['nama_menu'] ?>" id="namamenu" placeholder="Nama Menu">
                              <?= form_error('namamenu', '<small class="text-danger">', '</small>') ?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label for="kategorimenu" class=" col-form-label">Kategori Menu</label>
                            <div class="col-sm-12">
                              <select class="form-control border-dark small mb-3" id="kategorimenu" name="kategorimenu">
                                <option value="<?php echo $mn['id_kategori']; ?>"><?php echo $mn['nama_kategori']; ?></option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label for="hargamenu" class="col-form-label">Harga Menu</label>
                              <input type="text" class="form-control" name="hargamenu" value="<?= $mn['harga_menu'] ?>" id="hargamenu" placeholder="Harga Menu">
                              <?= form_error('hargamenu', '<small class="text-danger">', '</small>') ?>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <label for="gambarmenu" class="col-form-label">Gambar Menu</label>
                              <input type="file" class="from-control" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="gambarmenu" value="<?= $mn['gambar_menu'] ?>" id="gambarmenu">
                            </div>
                          </div>
                          <!-- <div class="form-group row">
                            <div class="col-sm-10">
                              <img id="preview" src="" alt="" width="320px" /> <br>
                            </div>
                          </div> -->
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label for="deskripsimenu" class="col-form-label">Deskripsi Menu</label>
                              <input type="text" class="form-control" name="deskripsimenu" value="<?= $mn['deskripsi_menu'] ?>" id="deskripsimenu" placeholder="Deskripsi Menu">
                              <?= form_error('deskripsimenu', '<small class="text-danger">', '</small>') ?>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" href="<?php echo site_url('admin/menu/menu') ?>" class="btn btn-info btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                              </span>
                              <span class="text">Tambah Menu</span>
                            </button>
                            <a href="<?php echo site_url('admin/menu/menu') ?>" class="btn btn-danger btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-reply"></i>
                              </span>
                              <span class="text">Kembali</span>
                            </a>
                          </div>
                          <?= form_close();  ?>

                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                  </div>
                <?php endforeach; ?>
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