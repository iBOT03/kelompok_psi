<section class="page-section portfolio mt-5">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Halaman Upload Pembayaran</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-file-invoice-dollar"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row justify-content-center">
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
                        <?php if ($Pembayaran) { ?>
                            <?php $i = 1;
                            foreach ($Pembayaran as $data) { ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $data['nama_menu'] ?></td>
                                    <td><?= $data['jumlah_catering'] ?></td>
                                    <td>Rp. <?= number_format($data['harga_menu']) ?></td>
                                    <td>Rp. <?= number_format($data['total_harga_catering']) ?></td>
                                </tr>
                                <input type="hidden" name="id" value="<?= $data['id_catering'] ?>">
                            <?php $i++;
                            } ?>
                        <?php } ?>
                        <tr>
                            <th scope="row">Total Harga</th>
                            <td colspan="3"></td>
                            <td>Rp. <?= number_format($data['total_catering']) ?></td>
                        </tr>
                    </tbody>
            </table>
            <?php if (!$BuktiPembayaran || $catatan) { ?>
                <div class="alert alert-secondary text-center" role="alert">
                    <b><?= $catatan ?></b><br>
                    Silahkan bayar Down Payment (DP) anda untuk catering yang anda pesan sebesar <b>Rp. <?= $total * 0.5 ?></b> <br>
                    Pastikan anda mentransfer pembayaran anda ke rekening BCA berikut, lalu upload bukti pembayaran dibawah ini. <br>
                    <center><b>2010847583, Atas nama Hendry Dwi Nurmansyah Idris</b></center>
                </div>

                <div class="input-group mb-3">
                    <input type="file" name="bukti" class="form-control" id="inputGroupFile02" required>
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <button type="submit" class="btn btn-success">Upload</button>
            <?php } else if ($BuktiPembayaran) { ?>
                <div class="alert alert-success text-center" role="alert">
                    Anda sudah mengirim bukti pembayaran, Silahkan tunggu proses dari admin untuk mengecek bukti pembayaran anda!
                </div>
            <?php } ?>
            </form>
        </div>
    </div>
</section>