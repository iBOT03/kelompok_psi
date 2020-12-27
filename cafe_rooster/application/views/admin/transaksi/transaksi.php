<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Transaksi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-header">
        <div class="row">
          <div class="col-md-2">
            <h6 class="text-bold">List Menu</h6>
            <!-- <p> Hasil = <?= $total_rows; ?> -->
            </p>
          </div>
          <div class="col-md-4">
            <form method="POST" action="<?= base_url('admin/Transaksi'); ?>">
              <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Search" name="cari" autocomplete="off" autofocus>
                <div class="input-group-append">
                  <!-- <input class="btn btn-primary" type="submit" name="submit"> -->
                  <button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">

          <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
              <?php if (empty($menu)) : ?>
                <tr>
                  <td>
                    <div class="alert alert-danger" role="alert">
                      Hasil tidak ditemukan!
                    </div>
                  </td>
                </tr>
              <?php endif; ?>
              <?php foreach ($menu as $row) : ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                  <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                      <b><?= $row['nama_menu'] ?></b>
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-10">
                          <p><b>Rp. <?= number_format($row['harga_menu']) ?></b></p>
                          <img class="img-fluid width=" 100px" height="100px" src="<?= base_url('uploads/foto/') . $row['gambar_menu']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-md-12">
                          <!-- <button type="button" name="tambah" class="btn btn-sm btn-primary tambah" data-namamenu="<?= $row['nama_menu'] ?>" data-hargamenu="<?= $row['harga_menu'] ?>" data-idmenu="<?= $row['id_menu'] ?>">
                            Beli
                          </button> -->
                          <a href="<?php echo site_url('admin/Transaksi/beli/' . $row['id_menu']) ?>" class="btn btn-primary btn-block">
                            Beli
                            <!-- <i class="fa fa-trash"></i> -->
                          </a>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <?= $this->pagination->create_links(); ?>
          </div>
        </div>
        <div class="col-md-6">
          <!-- <div id="detail_pembelian">
            <h4 align="center">Keranjang Transaksi</h4>
          </div> -->
          <div class="card-body">
            <!-- <h4>Kode Transaksi <?= $kode_jual;  ?></h4> -->
            <?php echo $this->session->userdata('pesan'); ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 80px; ">No</th>
                  <th>Nama Produk</th>
                  <th>Harga Satuan</th>
                  <th>Jumlah Beli</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($detail_beli as $row) : ?>
                  <tr style="text-align: center;">
                    <td style="width: 2px;"><?= $no; ?></td>
                    <td><?= $row->nama_menu ?></td>
                    <td>Rp. <?= number_format($row->harga_menu); ?></td>
                    <td><?= $row->jumlah_pesan; ?></td>
                    <!-- <td><?= $row->id_detail_pesan; ?>hh</td> -->
                    <td>Rp. <?= number_format($row->total_harga_pesan); ?></td>
                    <td><a href="<?= site_url() . 'admin/Transaksi/hapus/' . $row->id_detail_pesan; ?>" class="badge id btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php $no++;
                endforeach; ?>
                <tr>
                  
                  <td colspan="4"><strong>Total</strong></td>
                  <td colspan="2"><strong>Rp. <?php foreach ($detail_beli as $row) :?><?= number_format($row->total_bayar); ?><?php endforeach; ?></strong></td>
                </tr>
                
              </tbody>
            </table>
            <div class="row justify-content-center">
              <a href="<?= base_url() . 'admin/Transaksi/CheckOut/' . $huhu ?>" class="btn btn-success btn-sm" role="button" style="float: right; text-decoration: none;">Checkout</a>

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>

    <!-- /.card-body -->
</div>
</div>
<!-- /.card-footer -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Transaksi Keranjang -->
	
