<h4>📚 Data Buku</h4>
<a href="?Halaman=input_buku" class="btn btn-secondary">
    ➕Tambah Data Buku
</a>
<table class="table table-bordered mt-3">
    <tr class="fw-bold">
        <td>No</td>
        <td>Judul Buku</td>
        <td>Pengarang</td>
        <td>Penerbit</td>
        <td>Tahun Terbit</td>
        <td>Status</td>
        <td>Kelola</td>
    </tr>
    <?php
    include'../koneksi.php';
    $no = 1;
    $query = "SELECT*FROM buku ORDER BY id_buku DESC";
    $data = mysqli_query($koneksi, $query);
    foreach($data as $buku){ ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $buku['judul_buku'] ?></td>
        <td><?= $buku['pengarang'] ?></td>
        <td><?= $buku['penerbit'] ?></td>
        <td><?= $buku['tahun_terbit'] ?></td>
        <td><?= $buku['status'] ?></td>
        <td>
            <a class="btn btn-warning" href="?Halaman=edit_buku&id=<?= $buku['id_buku'] ?>">📝Edit</a>
            <a onclick ="return confirm('Yakin Menghapus Data')"class="btn btn-warning"
             href="?Halaman=hapus_buku&id=<?= $buku['id_buku'] ?>">🗑️Hapus</a>
    </td>
</tr>
<?php } ?>
</table>