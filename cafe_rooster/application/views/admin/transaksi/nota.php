<!DOCTYPE html>
<html>
<style type="text/css" media="all">
    body {
        color: #000;
    }

    table,
    th,
    tr {
        text-align: center;
    }

    #wrapper {
        max-width: 650px;
        margin: 0 auto;
        padding-top: 20px;
    }

    .btn {
        margin-bottom: 5px;
    }

    .table {
        border-radius: 3px;
    }

    .table th {
        background: #f5f5f5;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
    }

    h3 {
        margin: 5px 0;
    }

    @media print {
        .no-print {
            display: none;
        }

        #wrapper {
            max-width: 480px;
            width: 100%;
            min-width: 250px;
            margin: 0 auto;
        }
    }

    tfoot tr th:first-child {
        text-align: right;
    }
</style>
<head>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nota Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Nota</li>
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
            <div id="print-area">
                    <div class="box-body">
                        <div id="wrapper">
                            <div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
                                <div id="receipt-data">
                                    <div>
                                        <div style="text-align:center;">
                                            <img src="<?php echo base_url(); ?>/assets/admin/img/rooster-logo2.png" style="max-width:150px;" alt="BILBILWEST">
                                            <p style="text-align:center;"><strong>Cafe Rooster</strong><br>Probolinggo</p>
                                            <p></p>
                                        </div>
                                        <p>
                                            Tanggal Transaksi: <?php echo $tanggal ?> <br>
                                            Nomor Transaksi : <?php echo $nota; ?><br>
                                            Nomor Meja  : <?php echo $meja; ?><br>
                                            Nama Pembeli : <?php echo $pelanggan; ?> <br>
                                            Karyawan : <?php echo $operator; ?> <br>
                                        </p>
                                        <div style="clear:both;"></div>
                                        <table class="table table-striped table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Nama Menu</th>
                                                    <th class="text-center" style="width: 12%; border-bottom: 2px solid #ddd;">QTY</th>
                                                    <th class="text-center" style="width: 24%; border-bottom: 2px solid #ddd;">Harga</th>
                                                    <th class="text-center" style="width: 26%; border-bottom: 2px solid #ddd;">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->nama_menu; ?></td>
                                                    <td style="text-align:center;"><?php echo $row->jumlah_pesan; ?></td>
                                                    <td class="text-center">Rp.<?php echo $row->harga_menu; ?></td>
                                                    <td class="text-right">Rp.<?php echo $row->total_harga_pesan; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2">Total</th>
                                                    <th colspan="2" class="text-right">Rp.<?php echo number_format($total); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <table class="table table-striped table-condensed" style="margin-top:10px;">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right">Bayar :</td>
                                                    <td>Rp.<?php echo number_format($bayar); ?></td>
                                                    <td class="text-right">Kembalian:</td>
                                                    <td>Rp.<?php echo number_format($kembalian); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="well well-sm" style="margin-top:10px;">
                                            <div style="text-align: center;">Terimakasih Sudah Belanja :)</div>
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                            <div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
                                <span class="pull-right col-xs-12">
                                    <button onclick="printDiv('print-area')" class="btn btn-block btn-primary">Print</button> </span>
                                <span class="col-xs-12">
                                    <a class="btn btn-block btn-warning" href="<?php echo base_url() ?>admin/Lap_Transaksi">Kembali</a>
                                </span>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </div>
                </div
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

  <!-- print nota -->
  <script type="text/javascript">
    function printDiv(divName) {
        let printContents = document.getElementById(divName).innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(true);
        setTimeout(function() {}, 1000);
    }
</script>
</html>