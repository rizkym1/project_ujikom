<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Check In Hari Ini</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = tampilData("SELECT * FROM tb_order WHERE check_in = '" . date('Y-m-d') . "'");
                        $no = 1;
                        foreach ($data as $reservasi) :
                        ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $reservasi['nama'] ?></td>

                            <td class="">
                                <div class="d-flex justify-content-center">
                                    <a href="resepsionis.php?page=detail&username=<?= $reservasi['username'] ?>"
                                        class="btn btn-info mr-3"><i class="fas fa-info-circle"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Check Out Hari Ini</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="data2" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = tampilData("SELECT * FROM tb_order WHERE check_in = '" . date('Y-m-d') . "'");
                        $no = 1;
                        foreach ($data as $reservasi) :
                        ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $reservasi['nama'] ?></td>
                            <td class="">
                                <div class="d-flex justify-content-center">
                                    <a href="resepsionis.php?page=detail&username=<?= $reservasi['username'] ?>"
                                        class="btn btn-info mr-3"><i class="fas fa-info-circle"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>