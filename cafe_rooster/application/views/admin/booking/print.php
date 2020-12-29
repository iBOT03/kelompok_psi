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
                        <h1>Laporan Booking</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
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
                                                        <h4>LAPORAN BOOKING</h4>
                                                        <h3><strong>CAFE ROOSTER PROBOLINGGO</strong></h3>
                                                        <p></p>
                                                    </div>
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>ID Booking</th>
                                                                <th>Tanggal Booking</th>
                                                                <th>Tanggal Acara</th>
                                                                <th>Jumlah Meja</th>
                                                                <th>Menu</th>
                                                                <th>Jumlah Beli</th>
                                                                <th>Total Tagihan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($report as $row) : ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><?= $row->id_booking; ?></td>
                                                                    <td><?= $row->tgl_booking; ?></td>
                                                                    <td><?= $row->tgl_acara; ?></td>
                                                                    <td><?= $row->jumlah_meja; ?></td>
                                                                    <td><?= $row->nama_menu; ?></td>
                                                                    <td><?= $row->jumlah_menu; ?></td>
                                                                    <td>Rp. <?= number_format($row->total_booking); ?></td>
                                                                </tr>
                                                            <?php $no++;
                                                            endforeach; ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="6">Total Pendapatan : </th>
                                                                <th colspan="2">Rp. <?= number_format($total); ?></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                        </div>
                                        <div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
                                            <span class="pull-right col-xs-12">
                                                <button onclick="printDiv('print-area')" class="btn btn-block btn-primary">Print</button> </span>
                                            <span class="col-xs-12">
                                                <a class="btn btn-block btn-warning" href="<?php echo base_url() ?>admin/Lap_Booking">Kembali</a>
                                            </span>
                                            <div style="clear:both;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.col -->
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