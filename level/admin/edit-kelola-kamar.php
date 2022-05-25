<?php


$con = mysqli_connect("localhost", "root", "", "db_hotel");
if (isset($_POST["submit"])) {
    $id = $_POST["id_kamar"];
    $tipeKamar = $_POST["tipe_kamar"];
    $fasilitas = $_POST["fasilitas"];
    $jumlahKamar = $_POST["stok_kamar"];
    $harga = $_POST["harga"];

    //upload
    $error = $_FILES['foto_kamar']['error'];
    if ($error == 4) {
        $xx = $_POST['fotolama'];
    } else {
        $rand = rand();
        $ekstensi = ['png', 'jpg', 'jpeg'];
        $filename = $_FILES['foto_kamar']['name'];
        $ukuran = $_FILES['foto_kamar']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $path = $_SERVER['DOCUMENT_ROOT'] . "/hotel/img/";
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto_kamar']['tmp_name'], $path . $xx);

        if (!in_array($ext, $ekstensi)) {
            echo "
                <script>
                    alert('anda tidak mengupload gambar')
                </script>
            ";
        }

        if ($ukuran > 1044070) {
            echo "
                <script>
                    alert('file gambar terlalu besar')
                    window.location.replace('index.php?page=edit-kamar&kode=$id')
                </script>
            ";
        }
    }

    $query = mysqli_query($con, "UPDATE tb_kamar SET tipe_kamar = '$tipeKamar', fasilitas = '$fasilitas', stok_kamar = '$jumlahKamar', harga = '$harga', foto_kamar = '$xx' WHERE id_kamar = $id");
    if ($query) {
        echo "
            <script>
                alert('data berhasil diperbarui')
                window.location.replace('index.php?page=kamar')
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diperbarui')
            </script>
        ";
    }
}
?>
<div class="col-md-12">
    <a href="index.php?page=kamar" class="btn btn-primary mb-3"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Kamar</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            $kamar = tampilData("SELECT * FROM tb_kamar WHERE id_kamar = " . $_GET['kode'])[0];
            ?>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id_kamar" value="<?= $_GET["kode"] ?>">
                <input type="hidden" name="fotolama" value="<?= $kamar['foto_kamar'] ?>">
                <div class="row mb-3">
                    <label for="tipeKamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" name="tipe_kamar" class="form-control" id="tipeKamar"
                            value="<?= $kamar['tipe_kamar'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                    <div class="col-sm-10">
                        <input type="text" name="fasilitas" class="form-control" id="fasilitas"
                            value="<?= $kamar['fasilitas'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlahkamar" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" name="stok_kamar" class="form-control" id="jumlahkamar"
                            value="<?= $kamar['stok_kamar'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" name="harga" class="form-control" id="harga" value="<?= $kamar['harga'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fotoKamar" class="col-sm-2 col-form-label">Gambar Kamar</label>
                    <div class="col-sm-10">
                        <input type="file" name="foto_kamar" class="" id="fotoKamar">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>