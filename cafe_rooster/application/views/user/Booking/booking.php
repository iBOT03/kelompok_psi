<section class="page-section portfolio mt-5">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Booking</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-book"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tgl acara</th>
                        <th scope="col">Jumlah meja</th>
                        <th scope="col">Total Biaya</th>
                        <th scope="col">DP</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($booking) { ?>
                        <?php $i = 1;
                        foreach ($booking as $data) { ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $data['tgl_acara'] ?></td>
                                <td><?= $data['jumlah_meja'] ?></td>
                                <td>Rp. <?= $data['total_booking'] ?></td>
                                <td>Rp. <?= $data['dp_booking'] ?></td>
                                <td> <?php if ($data['status_transaksi'] = 1) {
                                            echo 'Menunggu verifikasi';
                                        } else {
                                            echo 'Lakukan Pembayaran';
                                        } ?>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    <?php } else { ?>
                        <div class="alert alert-info" role="alert">
                            Anda belum melakukan booking!
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>