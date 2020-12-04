<?php
$id = json_encode($_POST['id']);

$mysqli = mysqli_connect("localhost", "root", "", "rooster_cafe");

$data = mysqli_query($mysqli, "SELECT * FROM menu where id_menu =$id");
$hasil = mysqli_fetch_array($data);

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Portfolio Modal - Title-->
            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label">Log Cabin</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Modal - Image-->
            <img class="img-fluid rounded mb-5" src="http://localhost/kelompok_psi/cafe_rooster/assets/user/img/menu/<?= $hasil['gambar_menu'] ?>" alt="" />
            <!-- Portfolio Modal - Text-->
            <h6><?= $hasil['nama_menu']?></h6>
            <p>Rp. <?= $hasil['harga_menu']?></p>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
            <button class="btn btn-primary" data-dismiss="modal">
                <i class="fas fa-times fa-fw"></i>
                Close Window
            </button>
        </div>
    </div>
</div>