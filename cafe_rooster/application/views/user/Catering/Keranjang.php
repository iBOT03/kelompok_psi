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
                    <?php if ($keranjang) { ?>
                        <?php $i = 1;
                        foreach ($keranjang as $data) { ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $data['nama_menu'] ?></td>
                                <td><?= $data['jumlah_catering'] ?></td>
                                <td>Rp. <?= number_format($data['harga_menu']) ?></td>
                                <td>Rp. <?= number_format($data['total_harga_catering']) ?></td>
                                <td><a href="<?= base_url('Catering/HapusKeranjang/') ?><?= $data['id_detail_catering'] ?>"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    <?php } else { ?>
                        <div class="alert alert-info" role="alert">
                            Anda belum memasukan menu apapun kedalam keranjang!
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
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form method="post" action="<?php echo base_url('catering/checkout') ?>">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <!-- <label for="tglAcara">Masukan Tanggal Acara</label> -->
                            <!-- <input class="form-control" id="tglAcara" type="date" required="required" data-validation-required-message="Harap isi tanggal acara anda." /> -->
                            <input type="hidden" name="id" value="<?= $checkout?>">
                            <input class="form-control textbox-n" type="text" onfocus="(this.type='date')" name="tgl" required="required" placeholder="Masukan Tanggal Diperlukan" data-validation-required-message="Harap isi tanggal acara anda.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <br />
                    <div id="success"></div>
                    <div class="form-group">
                        <!-- <button class="btn btn-primary btn-xl float-right" type="submit" name="lanjutkan">Lanjutkan</button> -->
                        <a class="btn btn-primary float-right js-scroll-trigger" href="#" data-target="#BookingModaluser" data-toggle="modal" role="button">
                            <i class="mr-2 text-gray-400"></i>
                            Konfirmasi
                        </a>


                        <!-- Booking Modal -->
                        <div class="modal fade" id="BookingModaluser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pemesanan</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-info float-left" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary form-group" type="submit" name="lanjutkan">Lanjutkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</section>