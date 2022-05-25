<?php session_start() ?>
<?php
include '../../config/koneksi.php';
if (!isset($_SESSION['login'])) {
    header('Location: ../../login.php');
    exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Hotel Hebat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Rubik:ital@0;1&display=swap" rel="stylesheet">
    <script src="css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
    /* HERO  */
    section.hero {
        margin-top: 160px;
        font-family: "Roboto", sans-serif;
    }

    .hero .text-hero h1 {
        letter-spacing: 2px;
    }

    .hero .text-hero p {
        letter-spacing: 1px;
    }

    .reservasi-rev {
        background-color: #0d6efd;
        padding-top: 100px;
        padding-bottom: 100px;
        margin-top: 100px;
        margin-bottom: 100px;

    }
    </style>

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
        </nav>
    </div>
    <!-- end navbar -->
    <!-- hero -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="text-hero" data-aos="fade-right">
                        <h1 class="fw-bold">Selamat Datang</h1>
                        <p class="mt-3">Di website resmi Official Hotel Hebat. Nikmati diskon dan promo yang berlimpah
                            dihotel kami menggunakan Voucher yang ada. Booking 1 bayar 1 Booking 2 bayar 2.
                            Hari Sabtu Gratis tapi kami libur.</p>
                        <a href="kamar.php"
                            class="btn btn-primary ps-3 pe-3 mt-2 animate__animated animate__pulse animate__infinite infinite animate__slow">Pesan
                            Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="../../img/page.svg"
                        class="img-fluid d-none d-md-block animate__animated animate__backInRight animate__slow" />
                </div>
            </div>
        </div>
    </section>
    <!-- end hero -->

    <!-- Reservasi -->
    <section id="reservasi">
        <div class="reservasi-rev">
            <div class="container">
                <div class="row justify-content-center my-5">
                    <div class="col">
                        <div class="card p-3 shadow">
                            <div class="card-body">
                                <div class="reservasi">
                                    <div class="body">
                                        <h1 class="fw-bold text-center mb-3">Reservasi</h1>
                                        <form class="d-inline" method="post" action="">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="check_in" class="form-label">Check-In</label>
                                                        <input type="date" class="form-control" id="check_in"
                                                            min="<?= date('Y-m-d') ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-2">
                                                        <label for="check_out" class="form-label">Check-Out</label>
                                                        <input type="date" class="form-control" id="check_in"
                                                            min="<?= date('Y-m-d') ?>" />
                                                    </div>
                                                </div>
                                                <?php
                                                $data = tampilData("SELECT * FROM tb_kamar");
                                                $no = 1;
                                                ?>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="type" class="form-label">Type</label>
                                                        <select class="form-select" name="kamar" id="hargaKamar"
                                                            aria-label="Default select example">
                                                            <option value=""></option>
                                                            <?php foreach ($data as $tipe) : ?>
                                                            <option
                                                                value="<?= $tipe['harga'] ?>|<?= $tipe['kode_kamar'] ?>">
                                                                <?= $tipe['tipe_kamar'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="jumlahKamar" class="form-label">Harga</label>
                                                    <div class="col-sm-10">
                                                        <input name="jumlahKamar" class="form-control" id="jumlahKamar"
                                                            aria-label="Default select example" required>
                                                        <option selected></option>

                                                        </input>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row justify-content-center">
                                                <button id="tombolPesan" class="btn btn-primary d-block w-25"
                                                    type="submit" name="submit">Pesan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Reservasi-->
    <!-- about -->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="../../img/about.svg" class="img-fluid d-none d-md-block" data-aos="fade-right" />
                </div>
                <!-- desktop -->
                <div class="col-lg-6 col-sm- d-none d-lg-block">
                    <div class="text-about" data-aos="fade-left">
                        <h1 class="fw-bold">Tentang Kami</h1>
                        <p class="mt-3">
                            Hotel Hebat adalah hotel yang berdiri sejak tidak kebagian kursi yang terletak di pusat
                            kota Banjar. Hotel ini merupakan hotel bintang tiga
                            yang berlokasi strategis di pusat kota Banjar. Lokasi yang sempurna dan akses mudah ke
                            daerah wisata membuat pengunjung dapat sambil bekerja dan liburan. Hotel ini memiliki total
                            20 kamar yang terdiri atas 7 Kamar Superior, 45 Kamar Deluxe, 4 Suite Junior, dan 2 Suite
                            Eksekutif.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about -->
    <!-- peta dan alamat -->
    <!-- end peta dan alamt -->
    <!-- footer -->
    <footer>
        <div class="footer-bawah bg-primary" style="margin-bottom: -20px; margin-top: 50px;">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $('#hargaKamar').on('change', function(e) {
        const hargaKamar = $('#hargaKamar').val()
        var array = hargaKamar.split('|')
        $('#jumlahKamar').val(array[0])
        var url = 'boking.php?kamar=' + array[1]
        $('#tombolPesan').on('click', function() {
            $('form.d-inline').attr('action', url)
        })
    })
    </script>

    <script>
    AOS.init({
        duration: 1000, // values from 0 to 3000, with step 50ms
    });
    </script>
</body>

</html>