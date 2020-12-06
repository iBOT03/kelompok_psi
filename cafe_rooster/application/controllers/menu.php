<?php
session_start();
// $cek = get_instance();
$id = json_encode($_POST['id']);
// $id_pembeli = $_SESSION["id_pembeli"];

$mysqli = mysqli_connect("localhost", "root", "", "rooster_cafe");

$data = mysqli_query($mysqli, "SELECT * FROM menu where id_menu =$id");
$hasil = mysqli_fetch_array($data);

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Portfolio Modal - Title-->
            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label"><?= $hasil['nama_menu'] ?></h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Modal - Image-->
            <img class="img-fluid rounded mb-5" src="http://localhost/kelompok_psi/cafe_rooster/assets/user/img/menu/<?= $hasil['gambar_menu'] ?>" alt="" />
            <!-- Portfolio Modal - Text-->
            <p>Rp. <?= $hasil['harga_menu'] ?></p>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
            <form method="POST" action="Catering/Catering">
                <div class="input-group mb-3">
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                    <input type="text" name="total" class="form-control" placeholder="Total Harga" value="100000">
                </div>
                <input type="hidden" name="id_menu" class="form-control" value="<?= $hasil['id_menu'] ?>">
                <button type="submit" class="btn btn-success">
                    Pesan
                </button>
            </form>
        </div>
    </div>
</div>