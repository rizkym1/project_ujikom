<?php session_start() ?>
<?php

if (!isset($_SESSION['login'])) {
    header('Location: ../../login.php');
    exit;
}

?>
<?php
include '../../config/koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Hotel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Rubik:ital@0;1&display=swap" rel="stylesheet">
    <script src="css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <!--Slick-->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary p-4 shadow fixed-top">
            <div class="container">
                <a class="navbar-brand text-white fw-bold" href="tamu.php">Hotel Hebat</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="tamu.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="kamar.php">Kamar</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto nav-kanan fw-bold">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['user']['nama_lengkap'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="reservasi.php">Reservasi</a></li>
                                <li><a class="dropdown-item" href="../../logout.php">Keluar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
    </nav>
    </div>

    <!-- end navbar -->
    <!--Kamar-->
    <div class="text">
        <div class="container-fluid py-5">
            <div class="container">
                <h2 class="text-center" style="margin-top: 100px;">Pilih Kamar dan Tipe Sesuai Keinginan Anda</h2>
                <div class="row">
                    <?php
                    $data = tampilData("SELECT * FROM tb_kamar");
                    $no = 1;
                    foreach ($data as $kamar) :
                    ?>
                    <div class="col-3">
                        <div class="card">
                            <img src="../../img/<?= $kamar['foto_kamar'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $kamar['tipe_kamar'] ?></h5>
                                <?php $fasilitas = explode(',', $kamar['fasilitas']) ?>
                                <ul>
                                    <li><?= $fasilitas[0] ?></li>
                                    <li><?= $fasilitas[1] ?></li>
                                    <li><?= $fasilitas[2] ?></li>
                                    <li><?= $fasilitas[3] ?></li>
                                    <li><?= $fasilitas[4] ?></li>
                                    <li><?= $fasilitas[5] ?></li>
                                </ul>
                                <a href="boking.php?kamar=<?= $kamar['kode_kamar'] ?>"
                                    class="btn btn-primary w-100">Pesan sekarang</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!--end kamar-->
    <!--Fasilitas-->
    <div class="text">
        <div class="container-fluid py-5">
            <div class="container">
                <h2 class="text-center">Fasilitas yang Kami Tawarkan</h2>
                <div class="row">
                    <?php
                    $data = tampilData("SELECT * FROM tb_fasilitas_umum");
                    $no = 1;
                    foreach ($data as $fas) :
                    ?>
                    <div class="col-3">
                        <div class="card">
                            <img src="../../img/<?= $fas['foto_fasilitas'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $fas['fasilitas'] ?></h5>
                                <?php $fasilitas = explode(',', $fas['keterangan']) ?>
                                <ul>
                                    <li><?= $fasilitas[0] ?></li>
                                    <li><?= $fasilitas[1] ?></li>
                                    <li><?= $fasilitas[2] ?></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!--end fasilitas-->
    <!-- footer -->
    <footer class="p-0 mt-5" style="margin-bottom: -20px;">
        <div class="footer-bawah bg-primary">
            <p class="link p-3 text-center">© Copyright 2022 <a class="text-white text-decoration-none" href="#">Hotel
                    Hebat</a></p>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>



    <script>
    AOS.init({
        duration: 1000, // values from 0 to 3000, with step 50ms
    });
    </script>
</body>