<?php

include '../config/koneksi.php';

$tipeKamar = $_POST['tipeKamar'];
$hargaHari = $_POST['hargaHari'];
$jumlahKamar = $_POST['jumlahKamar'];
$username = $_POST['username'];
$email = $_POST['email'];
$namaLengkap = $_POST['namaLengkap'];
$alamat = $_POST['alamat'];
$noTelepon = $_POST['telepon'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];
$lamaInap = $_POST['lamaInap'];
$biayaOrder = $_POST['totalBiaya'];
$kodeKamar = $_POST['kodeKamar'];

if (cekUsername('username', 'tb_order', 'username', $username)) {
    echo "
        <script>
            alert('anda sudah memboking kamar');
            window.location.replace('../level/tamu/reservasi.php');
        </script>
    ";
    exit;
}

$order = mysqli_query($con, "INSERT INTO tb_order 
                            SET check_in = '$checkIn', check_out = '$checkOut', tipe_kamar ='$tipeKamar',
                            harga = '$hargaHari', jumlah_order = '$jumlahKamar', username = '$username',
                            nama = '$namaLengkap', email = '$email', no_telephone = '$noTelepon',
                            alamat = '$alamat', lama_hari = '$lamaInap', total_bayar = '$biayaOrder'");
if ($order) {
    echo "
        <script>
            alert('order berhasil');
            window.location.replace('../level/tamu/reservasi.php');
        </script>
    ";
} else {
    echo "
        <script>
            alert('order gagal');
            window.location.replace('../level/tamu/boking.php?kamar=$kodeKamar');
        </script>
    ";
}