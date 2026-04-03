<h4>👥Data Anggota</h4>
<a href="?Halaman=input_anggota" class="btn btn-secondary">
    ➕Tambah Data Anggota
</a>
<table class="table table-bordered mt-3">
    <tr class="fw-bold">
        <td>No</td>
        <td>NIS</td>
        <td>Nama Anggota</td>
        <td>Username</td>
        <td>Password</td>
        <td>Kelas</td>
        <td>Kelola</td>
    </tr>
    <?php
    include'../koneksi.php';
    $no = 1;
    $query = "SELECT*FROM Anggota ORDER BY id_anggota DESC";
    $data = mysqli_query($koneksi, $query);
    foreach($data as $anggota){ ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $anggota['nis'] ?></td>
        <td><?= $anggota['nama_anggota'] ?></td>
        <td><?= $anggota['username'] ?></td>
        <td><?= $anggota['password'] ?></td>
        <td><?= $anggota['kelas'] ?></td>
        <td>
            <a class="btn btn-warning" href="?Halaman=edit_Anggota&id=<?= $anggota['id_anggota'] ?>">📝Edit</a>
            <a onclick ="return confirm('Yakin Menghapus Data')"class="btn btn-warning"
             href="?Halaman=hapus_anggota&id=<?= $anggota['id_anggota'] ?>">🗑️Hapus</a>
    </td>
</tr>
<?php } ?>
</table>