<?php
include '../../config/koneksi.php';


session_start();

$kamarId = tampilData("SELECT * FROM tb_kamar WHERE kode_kamar =" .  $_GET['kamar']);
$dataKamar = $kamarId[0];

//kamar tidak unlimited
$ambilDataOrder = mysqli_query($con, "SELECT SUM(jumlah_order) AS jumlahOrder FROM tb_order WHERE tipe_kamar = '" . $dataKamar['tipe_kamar'] . "'");
$ambilDataOrder = mysqli_fetch_assoc($ambilDataOrder);

// fiks kamar unlimited
$stokKamar = $dataKamar['stok_kamar'] - $ambilDataOrder['jumlahOrder'];




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
    <?php if ($stokKamar == 0) : ?>
    <script>
    alert('stok kamar habis');
    window.location.replace('kamar.php')
    </script>

    <?php endif ?>
    <div class="container py-5" style="margin-top: 60px;">
        <div class="row">
            <h1 class="text-center">Booking Kamar</h1>
            <p class="text-center">Harap di isi sesuai data yang ada di Kartu Tanda Penduduk (KTP) </p>
            <div class="col-lg-20">
                <form method="post" action="../../proses/proses-order.php">
                    <input type="hidden" name="kodeKamar" value="<?= $_GET['kamar'] ?>">
                    <div class="row mb-3">
                        <label for="tipeKamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                        <div class="col-sm-10">
                            <input name="tipeKamar" type="text" class="form-control" id="tipeKamar"
                                value="<?= $dataKamar['tipe_kamar'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="hargaHari" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input name="hargaHari" type="text" class="form-control" id="hargaHari"
                                value="<?= $dataKamar['harga'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jumlahKamar" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                        <div class="col-sm-10">
                            <select name="jumlahKamar" class="form-select" id="jumlahKamar"
                                aria-label="Default select example" required>
                                <option selected></option>
                                <?php
                                $val = 1;
                                ?>
                                <?php for ($i = 1; $i <= $stokKamar; $i++) : ?>
                                <option value="<?= $val++ ?>"><?= $i ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input name="username" type="text" class="form-control" id="username"
                                value="<?= $_SESSION['user']['username'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" type="text" class="form-control" id="email"
                                value="<?= $_SESSION['user']['email'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input name="namaLengkap" type="text" class="form-control" id="namaLengkap"
                                value="<?= $_SESSION['user']['nama_lengkap'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" class="form-control" placeholder="" id="alamat"
                                style="height: 100px" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telepon" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input name="telepon" type="text" class="form-control" id="telepon"
                                value="<?= $_SESSION['user']['no_telp'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="checkIn" class="col-sm-2 col-form-label">Check In</label>
                        <div class="col-sm-10">
                            <input name="checkIn" type="date" class="form-control" id="checkIn" required
                                min="<?= date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="checkOut" class="col-sm-2 col-form-label">Check Out</label>
                        <div class="col-sm-10">
                            <input name="checkOut" type="date" class="form-control" id="checkOut" required
                                min="<?= date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lamaInap" class="col-sm-2 col-form-label">Lama Inap</label>
                        <div class="col-sm-10">
                            <input name="lamaInap" type="text" class="form-control" id="lamaInap" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="totalBiaya" class="col-sm-2 col-form-label">Total Biaya</label>
                        <div class="col-sm-10">
                            <input name="totalBiaya" type="text" class="form-control" id="totalBiaya" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Booking Sekarang</button>
                </form>
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
    <!-- end footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    // merubah tanggal checkout sesuai tanggal check in
    $('#checkIn').on('change', function() {
        const checkIn = $('#checkin').val();
        const checkOut = $('#checkin').val();
        $('#checkout').removeAttr('min');
        $('#checkout').attr('min', checkIn);

    })

    // menambah lama inap sesuai check out
    $(document).ready(function() {
        $('#checkIn, #checkOut, #jumlahKamar').on('change textInput input', function() {
            if (($("#checkIn").val() != "") && ($("#checkOut").val() != "")) {
                var oneDay = 24 * 60 * 60 * 1000;
                var firstDate = new Date($("#checkIn").val());
                var secondDate = new Date($("#checkOut").val());
                var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (
                    oneDay)));
                if (diffDays == 0) {
                    var diffDays = 1;
                }
                $("#lamaInap").val(diffDays + ' malam');

                // total biaya
                var total = $('#jumlahKamar').val() * Math.round(Number($('#hargaHari').val())) *
                    diffDays;
                console.log(total);
                $('#totalBiaya').val(function() {
                    var number_string = total.toString(),
                        sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    return 'Rp. ' + rupiah
                })
            }
        });
    });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>