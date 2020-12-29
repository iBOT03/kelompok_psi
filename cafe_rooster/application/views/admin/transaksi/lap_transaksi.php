  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Data Report Transaksi</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                          <li class="breadcrumb-item active">Report Transaksi</li>
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
                          <form class="mb-5" method="POST" action="<?= site_url('Lap_Transaksi/print/') ?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <p>Tanggal Mulai</p>
                                <div class="input-group">
                                    <input class="form-control border-dark small mb-6" type="date" id="tanggalMulai" name="tanggalMulai">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p>Sampai dengan</p>
                                <div class="input-group">
                                    <input class="form-control border-dark small mb-6" type="date" id="sampaiDengan" name="sampaiDengan">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p> </p>
                                <button type="submit" class="btn btn-sm btn-info btn-icon-split shadow-sm">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-print"></i>
                                    </span>
                                    <span class="text"> Cetakwe Laporan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                              <!-- <a href="Lap_Transaksi/print" class="btn btn-sm btn-info btn-icon-split shadow-sm" ">
                                  <span class="icon text-white">
                                      <i class="fas fa-print"></i>
                                      <i class="text">Cetak Laporan</i>
                                  </span>
                              </a> -->
                              <!-- <h3 class="card-title">DataTable with default features</h3> -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                          
                              <?php echo $this->session->userdata('pesan'); ?>
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr style="text-align: center;">
                                          <th style="width: 2px;">No</th>
                                          <th>ID Pesan</th>
                                          <th>Menu</th>
                                          <th>Tanggal</th>
                                          <th>Jumlah Pesan</th>
                                          <th>Sub Total</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1;
                                        foreach ($report as $row) : ?>
                                          <tr style="text-align: center;">
                                              <td style="width: 2px;"><?= $no; ?></td>
                                              <td><?= $row->id_pesan; ?></td>
                                              <td><?= $row->nama_menu; ?></td>
                                              <td><?= $row->tgl_pesan; ?></td>
                                              <td><?= $row->jumlah_pesan; ?></td>
                                              <td>Rp. <?= number_format($row->total_harga_pesan); ?></td>
                                              <td>
                                                  <a href="<?= base_url('admin/Transaksi/Nota/' . $row->id_pesan) ?>" class="badge id btn btn-warning">
                                                      <i class="fas fa-search"></i>
                                                      Detail
                                                  </a>
                                              </td>
                                          </tr>
                                      <?php $no++;
                                        endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th colspan="5">Total Pendapatan : </th>
                                          <th colspan="2">Rp. <?= number_format($total); ?></th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                          </div>
                          <!-- /.card-body -->
                      
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
  <!-- print nota --> -->
 