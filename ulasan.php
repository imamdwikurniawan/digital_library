<h1 class="mt-4 mb-3">Ulasan</h1>
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($_SESSION['user']['level'] == 'peminjam') {
                ?>
                    <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Data</a>
                <?php
                }
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="text-center table-secondary">
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user ON user.id_user = ulasan.id_user LEFT JOIN buku ON buku.id_buku = ulasan.id_buku");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                            <td>
                                <?php
                                if ($_SESSION['user']['level'] == 'peminjam') {
                                ?>
                                    <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info">Ubah</a>
                                <?php
                                }
                                ?>
                                <a onclick="return confirm('Apakah anda ingin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
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