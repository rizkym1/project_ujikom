<div class="col-md-12">
    <a href="index.php?page=admin" class="btn btn-primary mb-3"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Admin</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            $admin = tampilData("SELECT * FROM tb_users WHERE id_user = " . $_GET['kode'])[0];
            ?>
            <form method="post">
                <div class="row mb-3">
                    <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaLengkap" value="<?= $admin['nama_lengkap'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="noTelepon" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="noTelepon" value="<?= $admin['no_telp'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" value="<?= $admin['email'] ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>