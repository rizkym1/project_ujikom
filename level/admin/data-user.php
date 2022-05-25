<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Tamu</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        $deleteData = delete('tb_users', 'id_user', $id);
                        if ($deleteData) {
                            echo "
                                <script>
                                alert('Data berhasil dihapus')
                                window.location.replace('index.php  ')
                                </script>
                            ";
                        } else {
                            echo "
                                <script>
                                alert('Data gagal dihapus')
                                </script>
                            ";
                        }
                    }
                    $data = tampilData("SELECT * FROM tb_users WHERE id_level = 3");
                    $no = 1;
                    foreach ($data as $tamu) :

                    ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $tamu['nama_lengkap'] ?></td>
                        <td><?= $tamu['no_telp'] ?></td>
                        <td><?= $tamu['email'] ?></td>
                        <td class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <a href="?page=detail-data-user&kode=<?= $tamu['id_user'] ?>"
                                    class="btn btn-info mr-3"><i class="fas fa-info-circle"></i></a>
                        </td>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>