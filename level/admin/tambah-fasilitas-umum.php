<?php
$con = mysqli_connect("localhost", "root", "", "db_hotel");
if (isset($_POST["submit"])) {
    $fasilitas = $_POST["fasilitas"];
    $keterangan = $_POST["keterangan"];


    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename = $_FILES['foto_fasilitas']['name'];
    $ukuran = $_FILES['foto_fasilitas']['size'];
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
            move_uploaded_file($_FILES['foto_fasilitas']['tmp_name'], $path . $xx);
            mysqli_query($con, "INSERT INTO tb_fasilitas_umum SET fasilitas = '$fasilitas', keterangan = '$keterangan', foto_fasilitas = '$xx'");
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
//query insert data

?>
<div class="col-md-12">
    <a href="index.php?page=fasilitas" class="btn btn-primary mb-3"><i class="fas fa-arrow-alt-circle-left"></i>
        Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Fasilitas Umum</h5>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                    <div class="col-sm-10">
                        <input type="text" name="fasilitas" class="form-control" id="fasilitas" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" name="foto_fasilitas" class="" id="gambar" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data</button>
            </form>
        </div>
    </div>
</div>