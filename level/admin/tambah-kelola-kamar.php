<?php

$con = mysqli_connect("localhost", "root", "", "db_hotel");
if (isset($_POST["submit"])) {
    $tipeKamar = htmlspecialchars($_POST["tipe_kamar"]);
    $fasilitas = htmlspecialchars($_POST["fasilitas"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $jumlahKamar = htmlspecialchars($_POST["stok_kamar"]);
    $harga = htmlspecialchars($_POST["harga"]);

    //upload gambar

    //upload
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename = $_FILES['foto_kamar']['name'];
    $ukuran = $_FILES['foto_kamar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        echo "
            <script>
                alert('anda tidak mengupload gambar')
            </script>
        ";
    } else {
        if ($ukuran < 1044070) {
            $path = $_SERVER['DOCUMENT_ROOT'] . "/hotel/img/";
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto_kamar']['tmp_name'], $path . $xx);
            mysqli_query($con, "INSERT INTO tb_kamar SET tipe_kamar = '$tipeKamar', fasilitas = '$fasilitas', keterangan = '$keterangan', stok_kamar = '$jumlahKamar', harga = '$harga', foto_kamar = '$xx'");
            echo "
                <script>
                    alert('data berhasil ditambahkan')
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan')
                </script>
            ";
        }
    }
}
?>
<div class="col-md-12">
    <a href="index.php?page=kamar" class="btn btn-primary mb-3"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Kamar</h5>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="tipeKamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" name="tipe_kamar" class="form-control" id="tipeKamar" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" name="fasilitas" class="form-control" id="fasilitas" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keteranagan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-2 col-form-label" required>Jumlah Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" name="stok_kamar" class="form-control" id="jumlah" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Harga" class="col-sm-2 col-form-label" required>Harga</label>
                    <div class="col-sm-10">
                        <input type="text" name="harga" class="form-control" id="Harga" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fotoKamar" class="col-sm-2 col-form-label">Gambar Kamar</label>
                    <div class="col-sm-10">
                        <input type="file" name="foto_kamar" class="" id="fotoKamar">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data</button>
            </form>
        </div>
    </div>
</div>