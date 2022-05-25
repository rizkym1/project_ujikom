<div class="col-md-12">
    <a href="index.php?page=resepsionis" class="btn btn-primary mb-3"><i class="fas fa-arrow-alt-circle-left"></i>
        Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Resepsionis</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            $resepsionis = tampilData("SELECT * FROM tb_users WHERE id_user = " . $_GET['kode'])[0];
            ?>
            <form method="post">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" value="<?= $resepsionis['nama_lengkap'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no" value="<?= $resepsionis['no_telp'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" value="<?= $resepsionis['email'] ?>"
                            readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>