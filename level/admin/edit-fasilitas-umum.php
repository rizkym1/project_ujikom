<?php

$con = mysqli_connect("localhost", "root", "", "db_hotel");
if (isset($_POST["submit"])) {
    $id = $_POST["id_fasilitas_umum"];
    $fasilitas = $_POST["fasilitas"];
    $keterangan = $_POST["keterangan"];

    //upload
    $error = $_FILES['foto_fasilitas']['error'];
    if ($error == 4) {
        $xx = $_POST['fotolama'];
    } else {
        $rand = rand();
        $ekstensi = ['png', 'jpg', 'jpeg'];
        $filename = $_FILES['foto_fasilitas']['name'];
        $ukuran = $_FILES['foto_fasilitas']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $path = $_SERVER['DOCUMENT_ROOT'] . "/hotel/img/";
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto_fasilitas']['tmp_name'], $path . $xx);

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
                window.location.replace('index.php?page=edit-fasilitas&kode=$id')
            </script>
        ";
        }
    }

    $query = mysqli_query($con, "UPDATE tb_fasilitas_umum SET fasilitas = '$fasilitas', keterangan = '$keterangan', foto_fasilitas = '$xx' WHERE id_fasilitas = $id");
    if ($query) {
        echo "
        <script>
            alert('data berhasil diperbarui')
            window.location.replace('index.php?page=fasilitas')
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
    <a href="index.php?page=fasilitas" class="btn btn-primary mb-3"><i class="fas fa-arrow-alt-circle-left"></i>
        Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Fasilitas Umum</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            $fas = tampilData("SELECT * FROM tb_fasilitas_umum WHERE id_fasilitas = " . $_GET['kode'])[0];
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_fasilitas_umum" value="<?= $_GET["kode"] ?>">
                <input type="hidden" name="fotolama" value="<?= $kamar['foto_kamar'] ?>">
                <div class="row mb-3">
                    <label for="tipeKamar" class="col-sm-2 col-form-label">Fasilitas</label>
                    <div class="col-sm-10">
                        <input type="text" name="fasilitas" class="form-control" id="tipeKamar"
                            value="<?= $fas['fasilitas'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="hargaHari" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1"
                            rows="3"><?= $fas['keterangan'] ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" name="foto_fasilitas" class="" id="gambar">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right">Perbarui</button>
            </form>
        </div>
    </div>
</div>