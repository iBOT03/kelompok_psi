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
                              <a href="" class="btn btn-sm btn-info btn-icon-split shadow-sm" onclick="printDiv('print-area')">
                                  <span class="icon text-white">
                                      <i class="fas fa-download"></i>
                                      <i class="text">Cetak Laporan</i>
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
                                          <th>ID Pesan</th>
                                          <th>Menu</th>
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
                                          <th colspan="4">Total Pendapatan : </th>
                                          <th colspan="2">Rp. <?= number_format($total); ?></th>
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
      <script>
          $(document).ready(function() {
              $('.input-daterange').datepicker({
                  todayBtn: 'linked',
                  format: "yyyy-mm-dd",
                  autoclose: true
              });
              $('#example1').DataTable({
                  dom: 'Blfrtip',
                  buttons: [{
                          extend: 'csvHtml5',
                          exportOptions: {
                              columns: [0, 1, 2, 3, 4, 5, ],
                          },
                      },
                      {
                          extend: 'excelHtml5',
                          title: 'LAPORAN PENJUALAN',
                          exportOptions: {
                              columns: [0, 1, 2, 3, 4, 5],
                          },
                      },
                      {
                          extend: 'copyHtml5',
                          title: 'LAPORAN PENJUALAN',
                          exportOptions: {
                              columns: [0, 1, 2, 3, 4, 5],
                          },
                      },
                      {
                          extend: 'pdfHtml5',
                          oriented: 'portrait',
                          pageSize: 'legal',
                          title: 'LAPORAN PENJUALAN',
                          download: 'open',
                          exportOptions: {
                              columns: [0, 1, 2, 3, 4, 5],
                          },
                          customize: function(doc) {
                              doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                              doc.styles.tableBodyEven.alignment = 'center';
                              doc.styles.tableBodyOdd.alignment = 'center';
                          },
                      },
                      {
                          extend: 'print',
                          oriented: 'portrait',
                          pageSize: 'A4',
                          title: 'LAPORAN PENJUALAN',
                          exportOptions: {
                              columns: [0, 1, 2, 3, 4, 5],
                          },
                      },
                  ],
              });
          });
      </script>
  </div>
  <!-- /.content-wrapper -->

  </div>
  <!-- ./wrapper -->
  </body>
  <!-- print nota -->
  <!-- <script type="text/javascript">
  function printDiv(divName) {
      let printContents = document.getElementById(divName).innerHTML;
      let originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      location.reload(true);
      setTimeout(function() {}, 1000);
  }
</script> -->