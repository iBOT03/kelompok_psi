<!-- Booking Section-->
<section class="page-section" id="booking">
    <div class="container">
        <!-- Booking Section Heading-->
        <br><br>
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">BOOKING MEJA SEKARANG</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-book"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= validation_errors() ?>
            </div>
        <?php endif; ?>

        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form method="post" id="bookingForm" name="bookingForm">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label for="tglAcara">Tanggal Acara</label>
                            <!-- <input class="form-control" id="tglAcara" type="date" required="required" data-validation-required-message="Harap isi tanggal acara anda." /> -->
                            <input type="hidden" name="id_booking" id="id_booking">
                            <input type="text" name="id_karyawan" id="id_karyawan">
                            <input type="text" name="id_pembeli" id="id_pembeli">
                            <input class="form-control textbox-n" type="text" onfocus="(this.type='date')" id="tglAcara" name="tglAcara" placeholder="Tanggal Acara" data-validation-required-message="Harap isi tanggal acara anda.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <!-- <div class="dropdown control-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="jmlMeja" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown button
                            </button>
                            <div class="dropdown-menu" aria-labelledby="jmlMeja">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div> -->

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <div class="form-group">
                                <label for="jmlMeja">Jumlah Meja</label>
                                <select class="form-control" id="jmlMeja" name="jmlMeja">
                                    <option>Jumlah Meja</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group controls">
                            <p class="text-right">Total Pembayaran : </p>
                        </div>
                    </div>
                    <br />
                    <div id="success"></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-xl float-right" type="submit" name="lanjutkan">Lanjutkan</button></div>
                </form>
            </div>
        </div>
    </div>
</section>