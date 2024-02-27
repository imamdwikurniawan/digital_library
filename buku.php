<h1 class="mt-4 mb-3">Buku</h1>
<div class="card shadow p-3 mb-5 bg-body rounded">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($_SESSION['user']['level'] != 'peminjam') {
                ?>
                    <a href="?page=buku_tambah" class="btn btn-primary mb-2">+ Tambah Data</a>
                <?php
                }
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="text-center table-secondary">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['penulis']; ?></td>
                            <td><?php echo $data['penerbit']; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['tahun_terbit']; ?></td>
                            <td>
                                <?php
                                if ($_SESSION['user']['level'] != 'admin') {
                                ?>
                                    <a href="?page=pinjam&id=<?php echo $data['id_buku']; ?>" class="btn btn-primary">Pinjam</a>
                                <?php
                                } else {
                                ?>
                                    <a href="?page=buku_ubah&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">Ubah</a>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?');" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger">Hapus</a>
                                <?php
                                }
                                ?>
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