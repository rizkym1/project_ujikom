<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Fasilitas Umum</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Fasilitas</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        if (delete('tb_fasilitas_umum', 'id_fasilitas', $id)) {
                            echo "
                                <script>
                                alert('Data berhasil dihapus')
                                window.location.replace('?page=fasilitas')
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
                    $data = tampilData("SELECT * FROM tb_fasilitas_umum");
                    $no = 1;
                    foreach ($data as $fasilitas) :
                    ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $fasilitas['fasilitas'] ?></td>
                        <td><?= $fasilitas['keterangan'] ?></td>
                        <td class="">
                            <div class="d-flex justify-content-center">
                                <a href="?page=edit-fasilitas&kode=<?= $fasilitas['id_fasilitas'] ?>"
                                    class="btn btn-info mr-3"><i class="far fa-edit"></i></a>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $fasilitas['id_fasilitas'] ?>">
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
            <a href="?page=tambah-fasilitas&tambah=<?= $fasilitas['id_fasilitas'] ?>"
                class="btn btn-primary mt-3 float-right"><i class="fas fa-plus"> Tambahkan</i></a>
        </div>
    </div>
</div>