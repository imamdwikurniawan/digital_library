<h1 class="mt-4 mb-3">Kategori Buku</h1>
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=kategori_tambah" class="btn btn-primary mb-2">+ Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="text-center table-secondary">
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM kategori");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td>
                                <a href="?page=kategori_ubah&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah anda ingin menghapus data ini?');" href="?page=kategori_hapus&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>