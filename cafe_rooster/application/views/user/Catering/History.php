<section class="page-section portfolio mt-5">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">History Pesanan</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-file-invoice-dollar"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <!-- Portfolio Grid Items-->

        <?php if ($history) { ?>

            <?php $i = 1;
            foreach ($history as $data) { ?>
                <div class="card text-center mb-5">
                    <div class="card-header">
                        History Pesanan Anda
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Rp. <?= number_format($data['total_catering']) ?></h5>
                        <p class="card-text">
                        <b><?= $data['catatan']?></b>    
                        <br>Terima kasih telah memesan makanan atau minuman di Kafe Rooster, <br> Semoga anda puas dengan pelayanan kami.</p>
                        <a href="<?= base_url('catering/DetailHistoryPesanan/') . $data['id_catering']?>" class="btn btn-primary">Lihat Detail Pesanan</a>
                    </div>
                    <div class="card-footer text-muted">
                        Hari ini
                    </div>
                </div>
            <?php $i++;
            } ?>
        <?php } else { ?>
            <div class="alert alert-info text-center" role="alert">
                Anda belum memiliki history catering yang selesai dibuat!
            </div>
        <?php } ?>

        <!-- <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <form action="<?= base_url('Catering/UploadPembayaran') ?>" method="post" enctype="multipart/form-data">
                    <tbody>
                        <?php if ($pembayaran) { ?>
                            <?php $i = 1;
                            foreach ($pembayaran as $data) { ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $data['nama_menu'] ?></td>
                                    <td><?= $data['jumlah_catering'] ?></td>
                                    <td>Rp. <?= $data['harga_menu'] ?></td>
                                    <td>Rp. <?= $data['total_harga_catering'] ?></td>
                                </tr>
                                <input type="hidden" name="id" value="<?= $data['id_catering'] ?>">
                            <?php $i++;
                            } ?>
                        <?php } else { ?>
                            <div class="alert alert-info" role="alert">
                                Anda belum memiliki tagihan pembayaran!
                            </div>
                        <?php } ?>
                        <tr>
                            <th scope="row">Total Harga</th>
                            <td colspan="3"></td>
                            <td>Rp. </td>
                            <td colspan="1"></td>
                        </tr>
                    </tbody>
            </table>
            <div class="alert alert-secondary text-center" role="alert">
                Silahkan bayar Down Payment (DP) anda untuk catering yang anda pesan sebesar Rp. <br>
                Pastikan anda mentransfer pembayaran anda ke rekening BCA berikut, lalu upload bukti pembayaran dibawah ini. <br>
                <center><b>2010847583, Atas nama Hendry Dwi Nurmansyah Idris</b></center>



            </div>


            <div class="input-group mb-3">
                <input type="file" name="bukti" class="form-control" id="inputGroupFile02" required>
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <button type="submit" class="btn btn-success">Success</button>
            </form>
        </div> -->
    </div>
</section>