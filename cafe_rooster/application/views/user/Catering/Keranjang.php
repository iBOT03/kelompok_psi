<section class="page-section portfolio mt-5">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Keranjang</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-shopping-cart"></i></div>
            <div class="divider-custom-line"></div>
        </div>

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
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($keranjang as $data) { ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $data['nama_menu'] ?></td>
                            <td><?= $data['jumlah_catering'] ?></td>
                            <td>Rp. <?= $data['harga_menu'] ?></td>
                            <td>Rp. <?= $data['total_harga_catering'] ?></td>
                            <td><i class="fas fa-trash"></i></td>
                        </tr>
                    <?php $i++;
                    } ?>
                    <tr>
                        <th scope="row">Total Harga</th>
                        <td colspan="3"></td>
                        <td>Rp. </td>
                        <td colspan="1"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>