<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Kamar</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Tipe Kamar</th>
                        <th scope="col">Fasilitas Kamar</th>
                        <th scope="col">Jumlah Kamar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        if (delete('tb_kamar', 'id_kamar', $id)) {
                            echo "
                                    <script>
                                    alert('Data berhasil dihapus')
                                    window.location.replace('?page=kamar')
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
                    $data = tampilData("SELECT * FROM tb_kamar");
                    $no = 1;
                    foreach ($data as $kamar) :

                    ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $kamar['tipe_kamar'] ?></td>
                        <td><?= $kamar['fasilitas'] ?></td>
                        <td><?= $kamar['stok_kamar'] ?></td>
                        <td><?= $kamar['harga'] ?></td>
                        <td class="">
                            <div class="d-flex justify-content-center">
                                <a href="?page=edit-kamar&kode=<?= $kamar['id_kamar'] ?>" class="btn btn-info mr-3"><i
                                        class="far fa-edit"></i></a>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $kamar['id_kamar'] ?>">
                                    <button type="submit" class="btn btn-danger" name="submit"
                                        onclick="return confirm('Apakah yakin ingin dihapus?')"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="?page=tambah-kamar&tambah=<?= $kamar['id_kamar'] ?>" class="btn btn-primary mt-3 float-right"><i
                    class="fas fa-plus"> Tambahkan</i></a>
        </div>
    </div>
</div>