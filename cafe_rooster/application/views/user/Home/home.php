    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <p class="masthead-subheading font-weight-light mb-0"><?= $this->session->flashdata('pesan'); ?></p>
            <p class="masthead-subheading font-weight-light mb-0"><?= $this->session->flashdata('pesanLogin'); ?></p>
            <!-- Masthead Avatar Image-->
            <!-- <img class="masthead-avatar mb-5" src="<?= base_url(); ?>assets/user/img/avataaars.svg" alt="" /> -->  <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Rooster Cafe</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->

        </div>
    </header>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Menu</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <?php foreach ($menu as $data) { ?>


                    <div class="col-md-6 col-lg-2 mb-5">
                        <a class="open-modal" data-id="<?= $data['id_menu'] ?>">
                            <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#">
                                <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid img-thumbnail" src="<?= base_url(); ?>assets/menu/<?= $data['gambar_menu'] ?>" alt="" />
                                <h6><?= $data['nama_menu'] ?></h6>
                                <h6>Rp. <?= number_format($data['harga_menu']) ?></h6>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- About Section-->
    <!-- <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                    <i class="fas fa-download mr-2"></i>
                    Free Download!
                </a>
            </div>
        </div>
    </section> -->

    <?php if ($this->session->userdata('id_pembeli')) { ?>

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

                <!-- Booking Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form method="post" action="<?php base_url() ?>home/booking" id="bookingForm" name="bookingForm">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label for="tglAcara">Tanggal Acara</label>
                                    <!-- <input class="form-control" id="tglAcara" type="date" required="required" data-validation-required-message="Harap isi tanggal acara anda." /> -->
                                    <input type="hidden" name="id_booking" id="id_booking">
                                    <input class="form-control textbox-n" type="text" onfocus="(this.type='date')" id="tglAcara" name="tglAcara" required="required" placeholder="Tanggal Acara" data-validation-required-message="Harap isi tanggal acara anda.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <div class="form-group">
                                        <label for="jmlMeja">Jumlah Meja</label>
                                        <select required="required" class="form-control" id="jmlMeja" name="jmlMeja">
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
                                    <br>
                                    <p class="text-center">Jumlah tagihan adalah Rp. 50.000/Meja <br>
                                        Anda bisa melakukan pembayaran langsung lunas maaupun uang muka terlebih dahulu.
                                    </p>
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
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>

    <?php } ?>