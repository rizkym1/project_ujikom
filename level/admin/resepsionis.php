<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Resepsionis</h5>
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
                        if (delete('tb_users', 'id_user', $id)) {
                            echo "
                                    <script>
                                    alert('Data berhasil dihapus')
                                    window.location.replace('?page=resepsionis')
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
                    $data = tampilData("SELECT * FROM tb_users WHERE id_level = 2");
                    $no = 1;
                    foreach ($data as $resepsionis) :

                    ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $resepsionis['nama_lengkap'] ?></td>
                        <td><?= $resepsionis['no_telp'] ?></td>
                        <td><?= $resepsionis['email'] ?></td>
                        <td class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <a href="?page=detail-resepsionis&kode=<?= $resepsionis['id_user'] ?>"
                                    class="btn btn-info mr-3"><i class="fas fa-info-circle"></i></a>

                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>