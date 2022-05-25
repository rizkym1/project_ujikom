<?php
session_start();
include '../../config/koneksi.php';
$orderId = tampilData("SELECT * FROM tb_order WHERE username = '" . $_SESSION['user']['username'] . "'");
if (!empty($orderId)) {
    $dataOrder = $orderId[0];
} else {
    header('location');
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Pemesanan</title>
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary p-4 shadow fixed-top">
            <div class="container">
                <a class="navbar-brand text-white fw-bold" href="#">Hotel Hebat</a>
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
    <div class="container py-5" style="margin-top: 60px;">
        <div class="row">
            <h1 class="text-center">Booking Kamar</h1>
            <p class="text-center">Harap di isi sesuai data yang ada di Kartu Tanda Penduduk (KTP) </p>
            <div class="col-lg-20">
                <?php if (!empty($dataOrder)) : ?>
                <form method="post">
                    <div class="row mb-3">
                        <label for="tipeKamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tipeKamar"
                                value="<?= $dataOrder['tipe_kamar'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="hargaHari" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="hargaHari" value="<?= $dataOrder['harga'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jumlahKamar" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlahKamar"
                                value="<?= $dataOrder['jumlah_order'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" value="<?= $dataOrder['username'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" value="<?= $dataOrder['email'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaLengkap" value="<?= $dataOrder['nama'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="" id="alamat" style="height: 100px"
                                readonly><?= $dataOrder['alamat'] ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telepon" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telepon"
                                value="<?= $dataOrder['no_telephone'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="checkIn" class="col-sm-2 col-form-label">Check In</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="checkIn" value="<?= $dataOrder['check_in'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="checkOut" class="col-sm-2 col-form-label">Check Out</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="checkOut" value="<?= $dataOrder['check_out'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lamaInap" class="col-sm-2 col-form-label">Lama Inap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lamaInap" value="<?= $dataOrder['lama_hari'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="totalBiaya" class="col-sm-2 col-form-label">Total Biaya</label>
                        <d class="col-sm-10">
                            <input type="text" class="form-control" id="totalBiaya"
                                value="<?= $dataOrder['total_bayar'] ?>" readonly>
                        </d iv>
                    </div>
                    <a type="submit" target="_blank" class="btn btn-primary float-end" href="cetak.php">Cetak
                        Transaksi</a>
                </form>
                <?php else : ?>
                <h1 class="text-center pb-5" href="cetak.php"
                    style="margin-top: 100px; margin-bottom: 100px; letter-spacing: 2px;">Anda tidak
                    punya orderan kamar:(
                    </sh1>
                    <?php endif ?>
            </div>

        </div>
    </div>
    <!-- footer -->
    <footer class="p-0 mt-5" style="margin-bottom: -20px;">
        <div class="footer-bawah bg-primary">
            <p class="link p-3 text-center">© Copyright 2022 <a class="text-white text-decoration-none" href="#">Hotel
                    Hebat</a></p>
        </div>
    </footer>
    </div>
    </div>


    <!-- end footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>