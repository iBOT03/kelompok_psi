<section class="page-section portfolio mt-5">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Detail Pesanan</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-shopping-cart"></i></div>
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
                        <?php if ($history) { ?>
                            <?php $i = 1;
                            foreach ($history as $data) { ?>
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
            </form>
        </div>
    </div>
</section>