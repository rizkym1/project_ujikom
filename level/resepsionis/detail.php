<div class="col-md-12">
    <a href="resepsionis.php?page=data-reservasi2" class="btn btn-primary mb-3"><i
            class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Reservasi</h5>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            $detail = tampilData("SELECT * FROM tb_order WHERE username = '" . $_GET['username'] . "'")[0];
            ?>
            <form method="post">
                <div class="row mb-3">
                    <label for="tipeKamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipeKamar" value="<?= $detail['tipe_kamar'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" value="<?= $detail['harga'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah" value="<?= $detail['jumlah_order'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="user" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user" value="<?= $detail['username'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" value="<?= $detail['email'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" value="<?= $detail['nama'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" rows="3" readonly><?= $detail['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no" value="<?= $detail['no_telephone'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="checkin" class="col-sm-2 col-form-label">Check In</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="checkin" value="<?= $detail['check_in'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="checkout" class="col-sm-2 col-form-label">Check Out</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="checkout" value="<?= $detail['check_out'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lama" class="col-sm-2 col-form-label">Lama Inap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lama" value="<?= $detail['lama_hari'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="total" class="col-sm-2 col-form-label">Total Biaya</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="total" value="<?= $detail['total_bayar'] ?>"
                            readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>