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
                                <td> <?php if ($data['status_transaksi'] == 1) {
                                            echo '<p class="badge bg-warning" style="width: 11rem;">Menunggu verifikasi</p>';
                                        }else if($data['status_transaksi'] == 3){
                                            echo '<p class="badge bg-success" style="width: 11rem;">Booking selesai</p>';
                                        } else {
                                            echo '<a class="btn btn-primary js-scroll-trigger" href="#" data-target="#bayarModal" data-toggle="modal" role="button">
                                            <i class="mr-2 text-gray-400"></i>
                                            Lakukan pembayaran
                                        </a>';
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

            <!-- Booking Modal -->
            <div class="modal fade" id="BookingModaluser1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi pemesanan meja ?</h5>
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
    </div>
</section>


<div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                <div class="alert alert-secondary text-center" role="alert">
                    Silahkan bayar (DP/Lunas) untuk booking yang anda pesan.<br>
                    Pastikan anda mentransfer pembayaran anda ke rekening BCA berikut, lalu upload bukti pembayaran dibawah ini. <br>
                    <center><b>2010847583, Atas nama Hendry Dwi Nurmansyah Idris</b></center>
                </div>
                <div class="input-group mb-3">
                    <input type="file" name="buktitf" class="form-control" id="inputBukti" required>
                    <label class="input-group-text" for="inputBukti">Upload</label>
                </div>
            </form>


            <div class="modal-footer">
                <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?php echo base_url('Auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>