<?php


require '../config/koneksi.php';

$nama = $_POST['nama_lengkap'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
//cek confirmasi password
if ($pass !== $pass2) {
    echo "<script>
    alert('konformasi password tidak sesuai!');
    window.location.replace('../register.php');
    </script>";
    return false;
}

$hash = password_hash($pass, PASSWORD_BCRYPT);
$cekEmail = mysqli_query($con, "SELECT email FROM tb_users WHERE email = '$email'");
if (mysqli_fetch_assoc($cekEmail) != null) {
    echo "
        <script>
            alert('email sudah terdaftar');
            window.location.replace('../register.php');
        </script>
    ";
    exit;
}
$query = mysqli_query($con, "INSERT INTO tb_users SET nama_lengkap = '$nama', no_telp = '$no_telp', email ='$email', username = '$username', password = '$hash'");
if ($query) {
    echo "
        <script>
            alert('registrasi berhasil');
            window.location.replace('../login.php');
        </script>
    ";
} else {
    echo "
        <srcipt>
            alert('registrasi gagal');
            window.location.replace('../login/register.php');
        </script>
    ";
}