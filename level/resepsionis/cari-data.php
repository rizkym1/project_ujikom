<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Reservasi</h5>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="input-group mb-3">
                        <form action="cari-data.php" method="GET">
                            <p>
                                Filter by Check-in
                                <input type="date" class="form-control form-control-sm mb-2" name="keyword"
                                    placeholder="Cari data">
                            </p>
                            <button class="col" type="submit" name="cari">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Username</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (!empty($_POST['keyword'])) {
                            $cari = $_POST['keyword'];
                        } else {
                            echo "
                                <script>
                                    window.location.href = 'resepsionis.php?page=data-reservasi2'
                                </script>
                            ";
                            exit;
                        }
                        $dataCari = tampilData("SELECT * FROM tb_order WHERE check_in like '%" . $cari . "%' limit 10");
                        foreach ($dataCari as $data) :

                        ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['no_telephone'] ?></td>
                            <td><?= $data['check_in'] ?></td>
                            <td><?= $data['check_out'] ?></td>
                            <td class="">
                                <div class="d-flex justify-content-center">
                                    <a href="resepsionis.php?page=detail&username=<?= $data['username'] ?>"
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