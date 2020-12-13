<section class="page-section portfolio mt-5">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pembayaran</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-file-invoice-dollar"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <?= $this->session->flashdata('pesan');?>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
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
        </div>
    </div>
</section>