<?php

include '../../config/koneksi.php';

$id = $_GET['id'];
$d = tampilData("SELECT * FROM tb_users WHERE id_user = $id");
$data = $d[0];

echo 'Nama lengkap = ' . $data['nama_lengkap'];
