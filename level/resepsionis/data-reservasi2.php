<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Reservasi</h5>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <div class="container">
                <div class="row float-left">
                    <div class="col">
                        <div class="input-group mb-3">
                            <form action="?page=cari&keyword=" method="post">
                                <p class="text-center">
                                    Filter by Check-in
                                    <input type="date" class="form-control form-control-sm mb-2" name="keyword"
                                        placeholder="Cari data">
                                </p>
                                <button class="col" type="submit">Cari</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="table-responsive">
                <table id="data3" class="table table-bordered">
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
                        $query = mysqli_query($con, "SELECT * FROM tb_order");
                        while ($data = mysqli_fetch_array($query)) :
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
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>