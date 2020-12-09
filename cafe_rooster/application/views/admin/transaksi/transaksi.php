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
          </div>
          <div class="col-md-4">
            <form action="<?= base_url('admin/Transaksi')?>" method="post">
              <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Search" name="cari" autocomplete="off" autofocus>
                <div class="input-group-append">
                  <input class="btn btn-primary" type="submit" name="submit">
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
                      <div class="text-center">
                        <a href="#" class="btn btn-sm btn-block btn-primary">
                          Beli
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <?= $this->pagination->create_links(); ?>
          </div>
          <div class="col-md-6">

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