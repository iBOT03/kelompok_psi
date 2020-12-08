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
            <p class="mb-5"> <?= $hasil['deskripsi_menu'] ?></p>
            <form method="POST" action="Catering/Catering">
                <div class="input-group mb-3">
                    <input type="hidden" onkeyup="sum();" name="harga" id="harga" class="form-control" value="<?= $hasil['harga_menu'] ?>">
                    <input type="number" onkeyup="sum();" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" required min="1">
                    <input type="text" onkeyup="sum();" id="total1" class="form-control" placeholder="Total Harga" disabled>
                    <input type="hidden" onkeyup="sum();" name="total" id="total2" class="form-control" placeholder="Total Harga">
                </div>
                <input type="hidden" name="id_menu" class="form-control" value="<?= $hasil['id_menu'] ?>">
                <button type="submit" class="btn btn-success">
                    Pesan
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('harga').value;
        var txtSecondNumberValue = document.getElementById('jumlah').value;
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(txtSecondNumberValue)) {
            document.getElementById('total1').value = result;
            document.getElementById('total2').value = result;
        }


    }
</script>