<?php
session_start();
include '../../config/koneksi.php';
$orderId = tampilData("SELECT * FROM tb_order WHERE username = '" . $_SESSION['user']['username'] . "'");
if (!empty($orderId)) {
    $dataOrder = $orderId[0];
}

require_once '../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$html = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Data Reservasi</title>
</head>
<body>
<style>
div.a {
    text-align: center;
}
</style>
<div class='a'>
    <h1>Data Reservasi</h1>
    <hr>
    <table align='center'>
    
        <tr>
            <td>Tipe Kamar</td><td>:</td> <td> " . $dataOrder['tipe_kamar'] . " </td>
        </tr>
        <tr>
            <td>Harga</td>  <td>:</td><td> " . $dataOrder['harga'] . " </td>
        </tr>
        <tr>
            <td>Jumlah Kamar</td><td>:</td><td> " . $dataOrder['jumlah_order'] . " </td>
        </tr>
        <tr>
            <td>Username</td><td>:</td><td> " . $dataOrder['username'] . " </td>
        </tr>
        <tr>
            <td>Email</td><td>:</td><td> " . $dataOrder['email'] . " </td>
        </tr>
        <tr>
            <td>Nama Lengkap</td><td>:</td><td> " . $dataOrder['nama'] . " </td>
        </tr>
        <tr>
            <td>Alamat</td><td>:</td><td> " . $dataOrder['alamat'] . " </td>
        </tr>
        <tr>
            <td>No Telepon</td><td>:</td><td> " . $dataOrder['no_telephone'] . " </td>
        </tr>
        <tr>
            <td>Check In</td><td>:</td><td> " . $dataOrder['check_in'] . " </td>
        </tr>
        <tr>
            <td>Check Out</td><td>:</td><td> " . $dataOrder['check_out'] . " </td>
        </tr>
        <tr>
            <td>Lama Inap</td><td>:</td><td> " . $dataOrder['lama_hari'] . " </td>
        </tr>
        <tr>
            <td>Total Biaya</td><td>:</td><td> " . $dataOrder['total_bayar'] . " </td>
        </tr>
    </table>
    <br>
        <p>TERIMA KASIH SUDAH MENGINAP DI HOTEL KAMI</p>
        <p>SEMOGA NYAMAN DAN TENANG</p>
    </br>
    </div>
</body>


</html>";

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();